<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\User;
use Doctrine\ORM\EntityManagerInterface;
use Framework\Controller\AbstractController;
use Framework\Template\RendererInterface;
use Psr\Http\Message\ResponseFactoryInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\StreamFactoryInterface;

class UserController extends AbstractController {
    public function __construct(private EntityManagerInterface $em) {}

    public function index(): ResponseInterface {
        return $this->render("user/index");
    }

    public function profile(ServerRequestInterface $request, array $args): ResponseInterface {
        $repo = $this->em->getRepository(User::class);
        // $repo->find(User::class, $args["username"]);
        $user = $repo->findOneBy(["username" => $args["username"]]);
        return $this->render("user/dashboard", ["user" => $user]);
    }

    public function login(): ResponseInterface {
        return $this->render("login/index");

    }

    public function create(ServerRequestInterface $request): ResponseInterface {
        if ($request->getMethod() === "POST") {
            $parameters = $request->getParsedBody();

            $user = new User;

            $user->setEmail($parameters["email"]);
            $user->setUsername($parameters["username"]);
            $user->setFirstName($parameters["first_name"]);
            $user->setLastName($parameters["last_name"]);
            $user->setPassword($parameters["password"]);

            $this->em->persist($user);
            $this->em->flush();

            return $this->redirect("/profile/{$user->getUsername()}");
        };

        return $this->render("user/create");
    }
}