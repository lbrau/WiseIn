<?php

namespace wise\OwnerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction() {
        $em = $this->getDoctrine()->getManager();
        $bienRepo = $em->getRepository("wiseOwnerBundle:Bien");
        $biens = $bienRepo->findAll();

        return $this->render('wiseOwnerBundle:Default:dashboard.html.twig', array('biens' => $biens));
    }
}
