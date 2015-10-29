<?php

namespace SC\SebastienCaumesBundle\Controller;

use SC\SebastienCaumesBundle\Entity\NewWork;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use SC\SebastienCaumesBundle\Form\NewWorkType;

class AdminController extends Controller
{

    public function newWorkAction(Request $request){

        $newWork = new NewWork();
        $form = $this->createForm(new NewWorkType(), $newWork);

        if ($form->handleRequest($request)->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($newWork);
            $em->flush();

            $request->getSession()->getFlashBag()->add('notice', 'travail bien enregistré');

            return $this->redirect($this->generateUrl('sc_sebastien_caumes_work_detail', array('id' => $newWork->getId())));
        }


        return $this->render('SCSebastienCaumesBundle:admin:newwork.html.twig', array(
                'form' =>$form->createView()));
    }

}

