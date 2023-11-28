<?php

namespace App\Controller;

use App\Entity\Post;
use App\Repository\PostRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BlogController extends AbstractController
{
    #[Route('/blog', name: 'app_blog')]
    public function index(ManagerRegistry $doctrine, PostRepository $PostRepository): Response
    {
        $PostRepository = $doctrine->getRepository(Post::class);
        $Post = $PostRepository->findAll();

        return $this->render('blog.html.twig', [
            'controller_name' => 'BlogController',
            'Post' => $Post
        ]);
    }
}