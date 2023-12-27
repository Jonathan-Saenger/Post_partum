<?php

namespace App\Controller;

use App\Entity\Evenement;
use App\Repository\EvenementRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EvenementController extends AbstractController
{
    #[Route('/evenement', name: 'app_evenement')]
    public function index(ManagerRegistry $doctrine, EvenementRepository $EvenementRepository): Response
    {
        $EvenementRepository = $doctrine->getRepository(Evenement::class);
        $Evenement = $EvenementRepository->findAll();

        return $this->render('evenement.html.twig', [
            'controller_name' => 'EvenementController',
            'Evenement' => $Evenement
        ]);
    }
}
