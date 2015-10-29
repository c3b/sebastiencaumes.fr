<?php

namespace SC\SebastienCaumesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use SC\SebastienCaumesBundle\Entity\Contact;
use SC\SebastienCaumesBundle\Form\ContactType;
use Symfony\Component\HttpFoundation\Request;

class ContactController extends Controller
{

    public function indexAction(Request $request)
    {

        $contact = new Contact();

        $form = $this->createForm(new ContactType(), $contact);
        $form->handleRequest($request);


        if ($form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($contact);
            $em->flush();
            $this->sendEmail($contact);
            $this->addFlash('sendmail', 'Votre demande de contact a bien été envoyée');

            return $this->redirectToRoute('sc_sebastien_caumes_contact');
        }


        return $this->render('SCSebastienCaumesBundle:Contact:new.html.twig', array('form' => $form->createView()));

    }

    public function sendEmail($contact){
        $message = \Swift_Message::newInstance()
            ->setSubject($contact->getSujet())
            ->setFrom($contact->getEmail())
            ->setTo('seb.caumes@gmail.com')
            ->setBody($contact->getMessage());

        $this->get('mailer')->send($message);

    }

}

