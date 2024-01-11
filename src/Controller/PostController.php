<?php

namespace App\Controller;

use App\Entity\Commentaire;
use App\Entity\Post;
use App\Form\CommentType;
use App\Repository\PostRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class PostController extends AbstractController
{
    #[Route('/post/{id}', name: 'app_post')]
    public function index(Request $request, $id, ManagerRegistry $doctrine, PostRepository $PostRepository, Post $Post, EntityManagerInterface $entityManager): Response
    {
        //affichage des articles du blog        
        $PostRepository = $doctrine ->getRepository(Post::class);
        $Post = $PostRepository ->find($id);

        //affichage du formulaire de commentaire
        $commentaire = new Commentaire();
        $form = $this->createForm(CommentType::class, $commentaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Associer le commentaire à l'utilisateur et au post
            $commentaire->setUser($this->getUser());
            $commentaire->setPost($Post);

            $entityManager->persist($commentaire);
            $entityManager->flush();
        }

        //Récupération des commentaires 
        $commentaire = $Post->getCommentaire();

        return $this->render('post.html.twig', [
            'controller_name' => 'BlogController',
            'Post' => $Post,
            'form' => $form->createView(),
        ]);  
    } 
}