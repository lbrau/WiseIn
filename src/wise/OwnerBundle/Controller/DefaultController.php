<?php

namespace wise\OwnerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $bienRepo = $em->getRepository("wiseOwnerBundle:Bien");
        $biens = $bienRepo->findAll();

        return $this->render('wiseOwnerBundle:Default:dashboard.html.twig', array('biens' => $biens));
    }

    public function welcomeAction()
    {
        $em = $this->getDoctrine()->getManager();

        $response = new Response();
        $filename = "toto.mp4";
        $response->headers->set("Content-type", "application/octet-stream");
        $response->headers->set("Content-disposition", "attachment;filename=$filename");
//        return $response;
        return $this->render(':layout:welcome_index_layout.html.twig');
    }
}
