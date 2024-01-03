<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\FormulaireContactType;
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
        $contact = new Contact();
        $form = $this->createForm(FormulaireContactType::class, $contact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();

            $nom = $data->getNom();
            $prenom = $data->getPrenom();
            $email = $data->getEmail();
            $telephone = $data->getTelephone();
            $message = $data->getMessage();

            $email = (new Email())
                ->from($email)
                ->to('to@example.com')
                ->subject('Formulaire de contact')
                ->text($message)
                ->html("<p>Bonjour Léa ! Tu as reçu une demande de contact de " . $prenom . "  " . $nom . " ! Son numéro de téléphone est 
                le " . $telephone . " . Voici son message : " . $message . " </p>");
                
            $mailer->send($email);

            //return $this->redirectToRoute('app_submit');
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
