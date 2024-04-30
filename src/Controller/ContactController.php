<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\ContactType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'app_contact')]
public function contact(Request $request, MailerInterface $mailer): Response
{
    $form = $this->createForm(ContactType::class);

    if ($request->isMethod('POST')) {
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $email = (new TemplatedEmail())
                ->from($form->get('email')->getData())
                ->to('lucas.moniez@ecoles-epsi.net')
                ->subject($form->get('sujet')->getData())
                ->htmlTemplate('contact/template.html.twig')
                ->context([
                    'nom' => $form->get('nom')->getData(),
                    'sujet' => $form->get('sujet')->getData(),
                    'message' => $form->get('message')->getData()
                ]);

            $mailer->send($email);
            $this->addFlash('notice', 'Message envoyé');

            return $this->redirectToRoute('app_contact');
        }
    }

    return $this->render('contact/index.html.twig', ['form' => $form->createView()]);
}

}