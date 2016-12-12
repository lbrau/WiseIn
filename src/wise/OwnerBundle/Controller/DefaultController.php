<?php

namespace wise\OwnerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction() {
        $em = $this->getDoctrine()->getManager();
        $appartementRepo = $em->getRepository("wiseOwnerBundle:Appartement");
        $appartements = $appartementRepo->findAll();

        return $this->render('wiseOwnerBundle:Default:index.html.twig', array('appartements' => $appartements));
    }
}
