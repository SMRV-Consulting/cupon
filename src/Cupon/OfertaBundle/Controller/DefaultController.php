<?php

namespace Cupon\OfertaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
//use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class DefaultController extends Controller
{
    //Busca la oferta del día en la ciudad por defecto y después pasa los datos a la plantilla de la portada
    /**
     *
     */
    public function portadaAction($ciudad)
    {
        /*if (null == $ciudad)
        {
            $ciudad = $this->container
                            ->getParameter('cupon.ciudad_por_defecto');
            return new RedirectResponse(
                $this->generateUrl('portada', array('ciudad' => $ciudad))
            );
        }*/

        $em = $this->getDoctrine()->getManager();

        $oferta = $em->getRepository('OfertaBundle:Oferta')->findOneBy(array(
            'ciudad'            => $ciudad)
            //'fechaPublicacion' => new \DateTime('today')
        );

        if (!$oferta)
        {
            throw $this->createNotFoundException(
                'No se ha encontrado la oferta del día en la ciudad seleccionada'
            );
        }

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
