<?php
/**
 * Created by PhpStorm.
 * User: SaMa
 * Date: 10/8/16
 * Time: 16:56
 */

// src/Cupon/CiudadBundle/DataFixtures/ORM/Ciudades.php

namespace Cupon\CiudadBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Cupon\CiudadBundle\Entity\Ciudad;

class Ciudades extends AbstractFixture implements OrderedFixtureInterface
{

    public function getOrder()
    {
        return 1;
    }

    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $ciudades = array(
            array('nombre' => 'Madrid', 'slug' => "madrid"),
            array('nombre' => 'Barcelona', 'slug' => 'barcelona'),
            // ...
        );

        foreach ($ciudades as $ciudad){
            $entidad = new Ciudad();

            $entidad->setNombre($ciudad['nombre']);
            $manager->persist($entidad);
        }

        $manager->flush();
    }
}