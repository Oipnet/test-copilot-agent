<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'contact', methods: ['GET', 'POST'])]
    public function contact(Request $request, MailerInterface $mailer): Response
    {
        $form = $this->createFormBuilder()
            ->add('name', TextType::class, [
                'label' => 'Nom',
                'constraints' => [
                    new Assert\NotBlank(message: 'Le nom est requis'),
                    new Assert\Length(max: 100)
                ]
            ])
            ->add('email', EmailType::class, [
                'label' => 'Email',
                'constraints' => [
                    new Assert\NotBlank(message: 'L\'email est requis'),
                    new Assert\Email(message: 'Veuillez entrer un email valide')
                ]
            ])
            ->add('subject', TextType::class, [
                'label' => 'Sujet',
                'constraints' => [
                    new Assert\NotBlank(message: 'Le sujet est requis'),
                    new Assert\Length(max: 200)
                ]
            ])
            ->add('message', TextareaType::class, [
                'label' => 'Message',
                'constraints' => [
                    new Assert\NotBlank(message: 'Le message est requis'),
                    new Assert\Length(max: 1000)
                ]
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Envoyer'
            ])
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            
            try {
                $email = (new Email())
                    ->from($data['email'])
                    ->to('contact@local.dev')
                    ->subject($data['subject'])
                    ->text(sprintf(
                        "Nom: %s\nEmail: %s\n\nMessage:\n%s",
                        $data['name'],
                        $data['email'],
                        $data['message']
                    ));

                $mailer->send($email);
                
                $this->addFlash('success', 'Votre message a été envoyé avec succès !');
                
                return $this->redirectToRoute('contact');
            } catch (\Exception $e) {
                $this->addFlash('error', 'Une erreur est survenue lors de l\'envoi du message. Veuillez réessayer.');
            }
        }

        return $this->render('contact/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}