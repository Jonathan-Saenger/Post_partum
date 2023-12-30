<?php

namespace App\Controller;

use App\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Mime\Email;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'app_contact')]
    public function index(Request $request, MailerInterface $mailer): Response
    {
        $form = $this->createForm(ContactType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();

            $email = (new Email())
                ->from($data['email'])
                ->to('jonathan.saenger.pro@gmail.com')
                ->subject('Formulaire de contact')
                ->html("<p>Bonjour Léa ! Tu as reçu une demande de contact de {$data['prenom']} {$data['nom']} ! Son numéro de téléphone est 
                le {$data['telephone']}. Voici son message : {$data['message']}</p>");
                
            $mailer->send($email);

            return $this->redirectToRoute('/submit');
        }

        return $this->render('contact.html.twig', [
            'controller_name' => 'ContactController',
            'form' => $form->createView(),
        ]);
    }

    #[Route('/submit', name: 'app_submit')]
    public function submit() : Response
    {
        return $this->render('submit.html.twig');
    }
}
