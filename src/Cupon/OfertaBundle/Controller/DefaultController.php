<?php

namespace Cupon\OfertaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    //Busca la oferta del día en la ciudad por defecto y después pasa los datos a la plantilla de la portada
    /**
     *
     */
    public function portadaAction()
    {
        $em = $this->getDoctrine()->getManager();

        $oferta = $em->getRepository('OfertaBundle:Oferta')->findOneBy(array(
            'ciudad'            => 8,
            //'fechaPublicacion' => new \DateTime('today')
        ));

        return $this->render(
            'OfertaBundle:Default:portada.html.twig',
            array('oferta' => $oferta)
        );
    }

    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $ciudad=$em->getRepository('CiudadBundle:Ciudad')->find(2);
        return new Response('Portada de '.$ciudad->getNombre());

    }
}
