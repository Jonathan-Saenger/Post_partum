<?php

namespace App\Controller;

use App\Repository\PostRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BlogController extends AbstractController
{
    #[Route('/blog', name: 'app_blog')]
    public function index(PostRepository $PostRepository): Response
    {
        return $this->render('blog.html.twig', [
            'Post' => $PostRepository->findBy([], ['jour_redaction' => 'DESC'])
        ]);
    }
}

