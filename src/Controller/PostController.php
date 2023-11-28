<?php

namespace App\Controller;

use App\Entity\Post;
use App\Repository\PostRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PostController extends AbstractController
{
    #[Route('/post/{id}', name: 'app_post')]
    public function index($id, ManagerRegistry $doctrine, PostRepository $PostRepository, 
    Post $Post): Response
    {
            $PostRepository = $doctrine ->getRepository(Post::class);
            $Post = $PostRepository ->find($id);

        return $this->render('post.html.twig', [
            'controller_name' => 'BlogController',
            'Post' => $Post,
        ]);
    }
}
