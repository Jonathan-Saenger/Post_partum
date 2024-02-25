<?php

namespace App\Controller;

use App\Repository\EvenementRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EvenementController extends AbstractController
{
    #[Route('/evenement', name: 'app_evenement')]
    public function index(EvenementRepository $EvenementRepository): Response
    {
        return $this->render('evenement.html.twig', [
            'controller_name' => 'EvenementController',
            'Evenement' => $EvenementRepository->findBy([], ['date_creation' => 'DESC']) 
        ]);
    }
}
