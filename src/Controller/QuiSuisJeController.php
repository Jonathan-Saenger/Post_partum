<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class QuiSuisJeController extends AbstractController
{
    #[Route('presentation', name: 'presentation')]
    public function index(): Response
    {
        return $this->render('presentation.html.twig', [
            'controller_name' => 'QuiSuisJeController',
        ]);
    }
}
