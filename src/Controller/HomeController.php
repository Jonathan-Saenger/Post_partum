<?php

namespace App\Controller;

use App\Entity\Evenement;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Post;
use App\Repository\PostRepository;
use Doctrine\Persistence\ManagerRegistry;


class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(ManagerRegistry $doctrine, PostRepository $PostRepository): Response
    {
        $PostRepository = $doctrine ->getRepository(Post::class);
        $Post = $PostRepository ->findBy([], ['jour_redaction' => 'DESC'], 1);

        $EvenementRepository = $doctrine->getRepository(Evenement::class);
        $Evenement = $EvenementRepository->findBy([], ['date_creation' => 'DESC'], 1);

        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'Post'=> $Post,
            'Evenement' => $Evenement, 
        ]);
    }
}
