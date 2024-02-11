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
    public function index(PostRepository $PostRepository): Response
    {
        return $this->render('blog.html.twig', [
            'Post' => $Post = $PostRepository->findBy([], ['jour_redaction' => 'DESC'])
        ]);
    }
}

