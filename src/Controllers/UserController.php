<?php

declare(strict_types=1);

namespace App\Controllers;

use Exception;
use App\Models\User;
use Doctrine\ORM\EntityManagerInterface;
use Framework\Controller\AbstractController;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class UserController extends AbstractController {
    public function __construct(private EntityManagerInterface $em) {}

    public function index(): ResponseInterface {
        $isAuth = $this->verifySession();

        if($isAuth){
        return $this->render("user/index");
        }

        return $this->redirect("/login");
    }

    public function profile(ServerRequestInterface $request, array $args): ResponseInterface {
        $isAuth = $this->verifySession();
        
        if ($isAuth) {
            $repo = $this->em->getRepository(User::class);
            $user = $repo->findOneBy(["username" => $args["username"]]);

            return $this->render("user/profile", ["user" => $user]);
        } else {
            return $this->redirect("/login");
        }
    }
        
        public function login(ServerRequestInterface $request): ResponseInterface {
        $isAuth = $this->verifySession();

        if ($isAuth) {
            $user = $_SESSION["user"];
            
            return $this->redirect("/{$user->getUsername()}");
        }

        if ($request->getMethod() === "POST") {
            $parameters = $request->getParsedBody();
            $repo = $this->em->getRepository(User::class);
            
            $user = $repo->findOneBy(["email" => $parameters["email"], "password" => trim($parameters["password"])]);
            
            if ($user) {
                $_SESSION["user"] = $user;

                return $this->redirect("/{$user->getUsername()}");
            } else {
                return $this->render("user/login", ["error" => "Wrong email or password.", "data" => $parameters]);
            }
        };

        return $this->render("user/login");
    }

    public function logout(): ResponseInterface {
        $isAuth = $this->verifySession();
        
        if ($isAuth) {
            session_unset();
            session_destroy();
            _no_cache();

            return $this->redirect("/login");
            } else {
                return $this->redirect("/");
            }
    }

    public function create(ServerRequestInterface $request): ResponseInterface {
        $isAuth = $this->verifySession();

        if ($isAuth) {
            $user = $_SESSION["user"];

            return $this->redirect("/{$user->getUsername()}");
        }

        if ($request->getMethod() === "POST") {
            $parameters = $request->getParsedBody();

            try {
                $user = new User;
    
                $user->setEmail($parameters["email"]);
                $user->setUsername($parameters["username"]);
                $user->setFirstName($parameters["first_name"]);
                $user->setLastName($parameters["last_name"]);
                $user->setPassword($parameters);

                $this->em->persist($user);
                $this->em->flush();

                $_SESSION["user"] = $user;
    
                return $this->redirect("/{$user->getUsername()}");
            } catch (Exception $e) {
                $error = "An error occurred.";

                if (str_contains($e->getMessage(), "Duplicate entry")) {
                    $error = "Email/username already exists. Please choose another.";
                }

                if ( str_contains(strtolower($e->getMessage()), "password")) {
                    $error = $e->getMessage();
                }
                
                return $this->render("user/create", ["error" => $error, "data" => $parameters]);
            }
        };

        return $this->render("user/create");
    }
}