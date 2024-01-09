<?php

namespace App\Controller;

use App\Entity\Commentaire;
use App\Entity\Post;
use App\Form\CommentType;
use App\Repository\PostRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

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

    #[Route("/comment/{id}", name: "comment")]
    public function comment(Request $request, Post $post, EntityManagerInterface $em): Response
    {
        $comment = new Commentaire();
        $form = $this->createForm(CommentType::class, $comment);
        $form->handleRequest($request);
 
        if ($form->isSubmitted() && $form->isValid()) {
            // Set the user and the post for the comment
            $comment->setUser($this->getUser());
            $comment->setPost($post);
 
            // Save the comment in the database
            $em->persist($comment);
            $em->flush();
 
            return $this->redirectToRoute('app_post', ['id' => $post->getId()]);
        }
 
        return $this->render('post.html.twig', [
            'post' => $post,
            'form' => $form->createView(),
        ]);
    }
}

