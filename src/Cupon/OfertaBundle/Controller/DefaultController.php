<?php

namespace Cupon\OfertaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $ciudad=$em->getRepository('CiudadBundle:Ciudad')->find(2);
        return new Response('Portada de '.$ciudad->getNombre());

    }
}
