<?php

namespace Cupon\UsuarioBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('UsuarioBundle:Default:index.html.twig', array('name' => $name));
    }

    public function comprasAction()
    {
        $usuario_id = 90;

        $em = $this->getDoctrine()->getManager();

        $compras = $em->getRepository('UsuarioBundle:Usuario')->findTodasLasCompras($usuario_id);

        /** if (!$compras){
            throw $this->createNotFoundException('No existen compras');
        } **/

        return $this->render('UsuarioBundle:Default:compras.html.twig', array('compras' => $compras));
    }
}
