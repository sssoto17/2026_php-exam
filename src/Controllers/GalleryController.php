<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\Gallery;
use App\Models\User;

use Doctrine\ORM\EntityManagerInterface;
use Exception;
use Framework\Controller\AbstractController;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class GalleryController extends AbstractController {
    public function __construct(private EntityManagerInterface $em) {}
    
    public function index(ServerRequestInterface $request, array $args): ResponseInterface {
        $isAuth = $this->verifySession();

        if (!$isAuth) {
            $this->redirect("/login");
        }

        $repo = $this->em->getRepository(User::class);
        $user = $repo->findOneBy(["username" => $args["username"]]);

        $repo = $this->em->getRepository(Gallery::class);
        $gallery = $repo->findBy(["user_id" => $user->getId()]);

        return $this->render("gallery/index", ["gallery" => $gallery, "user" => $user]);
        }
        
    public function single(ServerRequestInterface $request, array $args): ResponseInterface {
        $isAuth = $this->verifySession();

        if (!$isAuth) {
            $this->redirect("/login");
        }
        
        $repo = $this->em->getRepository(User::class);
        $user = $repo->findOneBy(["username" => $args["username"]]);

        $repo = $this->em->getRepository(Gallery::class);
        $artwork = $repo->findOneBy(["slug" => $args["slug"]]);

        return $this->render("gallery/single", ["artwork" => $artwork, "user" => $user]);
    }

    public function create(ServerRequestInterface $request): ResponseInterface {
        $isAuth = $this->verifySession();

        if (!$isAuth) {
            $this->redirect("/login");
        }

        if ($request->getMethod() === "POST") {
            $parameters = $request->getParsedBody();

            try {
                $artwork = new Gallery;
    
                $artwork->setTitle($parameters["title"]);
                $artwork->setCategory($parameters["category"]);
                $artwork->setDescription($parameters["description"]);
                $artwork->setUserId($_SESSION["user"]->getId());
                $artwork->setPath();
                $artwork->setSlug();

                if (isset($parameters["is_private"])) {
                    $artwork->setPrivate(1);
                }

                $this->em->persist($artwork);
                $this->em->flush();

                return $this->redirect("/gallery/{$artwork->getSlug()}");
            } catch (Exception $e) {
                $error = "An error occurred.";

                if (str_contains($e->getMessage(), "Duplicate entry")) {
                    $error = "Email/username already exists. Please choose another.";
                }

                if ( str_contains(strtolower($e->getMessage()), "password")) {
                    $error = $e->getMessage();
                }
                
                return $this->render("gallery/create", ["error" => $error, "data" => $parameters]);
            }
        }

        return $this->render("gallery/create");
    }
}