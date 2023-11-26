<?php

namespace App\Controller;

use App\Entity\Post;
use App\Repository\PostRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PostController extends AbstractController
{
    #[Route('/post', name: 'app_post')]
    public function index(ManagerRegistry $doctrine, PostRepository $PostRepository): Response
    {
        $PostRepository = $doctrine->getRepository(Post::class);
        $Post = $PostRepository->findAll();

        return $this->render('post.html.twig', [
            'controller_name' => 'PostController',
            'Post' => $Post,
        ]);
    }
}
