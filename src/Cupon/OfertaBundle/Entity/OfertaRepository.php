<?php
/**
 * Created by PhpStorm.
 * User: SaMa
 * Date: 11/8/16
 * Time: 23:46
 */

namespace Cupon\OfertaBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Symfony\Component\HttpKernel\Exception\HttpException;

class OfertaRepository extends EntityRepository
{

    public function findOferta($ciudad, $slug)
    {
        $em = $this->getEntityManager();

        $consulta = $em->createQuery('SELECT o, c, t
                    FROM OfertaBundle:Oferta o
                    JOIN o.ciudad c JOIN o.tienda t
                  WHERE o.revisada = true 
                    AND c.slug = :ciudad
                    AND o.slug = :slug
        ');
        $consulta->setParameter('slug', $slug);
        $consulta->setParameter('ciudad', $ciudad);
        $consulta->setMaxResults(1);


        return $consulta->getSingleResult();
    }

    public function findRelacionadas($ciudad)
    {
        $em = $this->getEntityManager();

        $consulta = $em->createQuery('SELECT o, c
                    FROM OfertaBundle:Oferta o
                    JOIN o.ciudad c
                  WHERE c.slug != :ciudad
                    AND o.fechaPublicacion <= :fecha
                    AND o.revisada = TRUE  
              ORDER BY o.fechaPublicacion DESC');

        $consulta->setParameter('ciudad', $ciudad);
        $consulta->setParameter('fecha', new \DateTime('today'));
        $consulta->setMaxResults(5);

        return $consulta->getResult();
    }

    public function findOfertaDelDia($ciudad)
    {
        //Usar lenguaje DQL de Doctrine

        $em = $this->getEntityManager();

        $consulta = $em->createQuery('SELECT o, c, t
                    FROM OfertaBundle:Oferta o
                    JOIN o.ciudad c JOIN o.tienda t
                  WHERE o.revisada = true
                    AND o.fechaPublicacion < :fecha
                    AND c.slug = :ciudad
              ORDER BY o.fechaPublicacion DESC');
        $consulta->setParameter('fecha', new \DateTime('now'));
        $consulta->setParameter('ciudad', $ciudad);
        $consulta->setMaxResults(1);


        return $consulta->getOneOrNullResult();



    }

}