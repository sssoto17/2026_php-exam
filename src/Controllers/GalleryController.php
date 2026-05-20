<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\User;

use Doctrine\ORM\EntityManagerInterface;

use Framework\Controller\AbstractController;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class GalleryController extends AbstractController {
    public function __construct(private EntityManagerInterface $em) {}
    
    public function index(): ResponseInterface {
        $repo = $this->em->getRepository(User::class);

        $users = $repo->findAll();

        return $this->render("gallery/index", ["users" => $users]);
        }
        
    public function single(ServerRequestInterface $request, array $args): ResponseInterface {
        $repo = $this->em->getRepository(User::class);
        $user = $repo->findOneBy(["first_name" => $args["slug"]]);
        return $this->render("gallery/single", ["user" => $user]);
    }
}