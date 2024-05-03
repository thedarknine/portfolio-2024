<?php

/**
 * This file is part of Portfolio project.
 * (c) Caroline Noyer <hello@carolinenoyer.info>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'contact')]
    public function index(Request $request, MailerInterface $mailer): Response
    {
        $data = new Contact();

        $form = $this->createForm(ContactType::class, $data);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            if ($form->isValid()) {
                $email = (new TemplatedEmail())
                    ->from($data->email)
                    ->to('hello@carolinenoyer.fr')
                    ->subject('Demande de contact sur mon portfolio')
                    ->htmlTemplate('mails/contact.html.twig')
                    ->context(['data' => $data]);

                try {
                    $mailer->send($email);
                    $this->addFlash('success', 'Votre message a été envoyé');

                    return $this->redirectToRoute('contact');
                } catch (\Exception $e) {
                    $this->addFlash('danger', 'Une erreur a stoppé l\'envoi du message');
                }
            } else {
                $this->addFlash('danger', 'Une ou plusieurs erreurs ont été détectées');
            }
        }

        return $this->render(
            'contact.html.twig', [
                'page' => 'contact',
                'form' => $form,
                'controller_name' => 'ContactController',
                'canonical_url' => $this->getParameter('app.canonical_url'),
                'meta_title' => 'Caroline Noyer — Contact',
                'meta_description' => "N'hésitez pas à me contacter pour plus de renseignements.",
                'meta_keywords' => 'Product Owner,Background technique,Attrait UX,Contact,Message',
            ]);
    }
}
