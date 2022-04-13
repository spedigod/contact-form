<?php

namespace App\Controller;

use App\Entity\ContactForm;
use App\Form\ContactFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

/* Form validator */
class ContactFormController extends AbstractController {

    #[Route('/contact')]
    public function contactForm(Environment $twig, Request $request, EntityManagerInterface $entityManager) {

        $contactForm = new ContactForm();

        $form = $this->createForm(ContactFormType::class, $contactForm);
        $form->handleRequest($request);

        /* Validator */
        if ($form->isSubmitted() && $form->isValid()) {
            
            $entityManager->persist($contactForm);
            $entityManager->flush();

            /* Render this on success */
            return new Response($twig->render('contactForm/success.html.twig'));
        }

        return new Response($twig->render('contactForm/form.html.twig', [
            'contact_form' => $form->createView()
        ]));
    }
}