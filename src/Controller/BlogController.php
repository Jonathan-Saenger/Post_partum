<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Commentaire;
use App\Entity\Post;
use App\Form\CommentType;
use App\Repository\PostRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class BlogController extends AbstractController
{
    #[Route('/blog', name: 'app_blog')]
    public function index(PostRepository $PostRepository): Response
    {
        return $this->render('blog.html.twig', [
            'Post' => $PostRepository->findBy([], ['jour_redaction' => 'DESC'])
        ]);
    }

    #[Route('/post/{id}', name: 'app_post')]
    public function article(Request $request, $id, PostRepository $PostRepository, Post $Post, EntityManagerInterface $entityManager): Response
    {
        //affichage du formulaire de commentaire
        $commentaire = new Commentaire();
        $form = $this->createForm(CommentType::class, $commentaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Associer le commentaire à l'utilisateur et au post
            $commentaire->setUser($this->getUser());
            $commentaire->setPost($Post);
            $commentaire->setJourPublication(new \DateTime());

            $entityManager->persist($commentaire);
            $entityManager->flush();

            return $this->redirect($request->getUri());
        }

        //Récupération des commentaires 
        $commentaire = $Post->getCommentaire();

        return $this->render('post.html.twig', [
            'Post' => $PostRepository ->find($id),
            'form' => $form->createView(),
        ]);  
    } 
}

