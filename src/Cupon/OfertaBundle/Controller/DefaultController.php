<?php

namespace Cupon\OfertaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
//use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\HttpException;

class DefaultController extends Controller
{
    //Busca la oferta del día en la ciudad por defecto y después pasa los datos a la plantilla de la portada
    /**
     * @param $ciudad
     * @return Response
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

        /*$oferta = $em->getRepository('OfertaBundle:Oferta')->findOneBy(array(
            'ciudad'            => $ciudad)
            //'fechaPublicacion' => new \DateTime('today')
        );*/

        $oferta = $em->getRepository('OfertaBundle:Oferta')->findOfertaDelDia($ciudad);


        if (!$oferta)
        {
            throw new HttpException(400,'No se ha encontrado la oferta del día en la ciudad seleccionada');
        }

        return $this->render(
            'OfertaBundle:Default:portada.html.twig',
            array('oferta' => $oferta)
        );
    }

    /**
     * @return Response
     */
    public function indexAction()
    {
        /*$em = $this->getDoctrine()->getManager();
        $ciudad=$em->getRepository('CiudadBundle:Ciudad')->find(9);
        $nombre=$ciudad->getNombre();
        return new Response('Portada de ' + $nombre);
    */
    }
}
