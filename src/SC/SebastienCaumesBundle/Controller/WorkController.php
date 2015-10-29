<?php

namespace SC\SebastienCaumesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use SC\SebastienCaumesBundle\Entity\NewWork;
use SC\SebastienCaumesBundle\Form\NewWorkType;
use Symfony\Component\HttpFoundation\Session\Session;

class WorkController extends Controller
{


    public function indexAction()
    {

        $repo= $this->getDoctrine()->getRepository('SCSebastienCaumesBundle:NewWork');
        $query = $repo->createQueryBuilder('n')
            ->orderBy('n.date', 'DESC')
            ->getQuery();

        $entities = $query->getResult();

        return $this->render('SCSebastienCaumesBundle:main:index.html.twig', array('entities' => $entities));
    }

    public function detailAction($id){
        $repo= $this->getDoctrine()->getRepository('SCSebastienCaumesBundle:NewWork');

        $work = $repo->find($id);

        $title = $work->getTitle();
        $image = $work->getImage();
        $description = $work->getDescription();
        $author = $work->getAuthor();
        $date = $work->getDate();

        return $this->render('SCSebastienCaumesBundle:work:detail.html.twig', array('id' => $id,
            'title' => $title, 'image' => $image, 'description' => $description, 'author' => $author, 'date' => $date));
    }

    public function showAllAction(){
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('SCSebastienCaumesBundle:NewWork')->findBy(array(),array('date' => 'DESC'));

        return $this->render('SCSebastienCaumesBundle:work:applications.html.twig', array(
            'entities' => $entities,
        ));
    }
}

