<?php
/**
 * Created by PhpStorm.
 * User: SaMa
 * Date: 9/8/16
 * Time: 9:15
 */
//src/Cupon/OfertaBundle/Controller/SitioController.php

namespace Cupon\OfertaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SitioController extends Controller
{
    public function estaticaAction($pagina){
        return $this->render('OfertaBundle:Sitio:'.$pagina.'.html.twig');
    }
}