<?php
/**
 * Created by PhpStorm.
 * User: SaMa
 * Date: 10/8/16
 * Time: 17:44
 */

// src/Cupon/OfertaBundle/DataFixtures/ORM/Orfertas.php
namespace Cupon\OfertaBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Cupon\OfertaBundle\Entity\Oferta;


class Ofertas implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i < 400; $i++){
            $entidad = new Oferta();

            $entidad->setNombre('Oferta '.$i);
            $entidad->setPrecio(rand(1,100));
            $entidad->setFechaPublicacion(new \DateTime());
            // ...

            $manager->persist($entidad);
        }
        $manager->flush();
    }

}