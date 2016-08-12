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

    public function findOfertaDelDia($ciudad)
    {
        //Usar lenguaje DQL de Doctrine
        $fechaPublicacion = new \DateTime('today');
        $fechaPublicacion->setTime(23, 59, 59);

        $em = $this->getEntityManager();

        $dql = 'SELECT o, c, t
                    FROM OfertaBundle:Oferta o
                    JOIN o.ciudad c JOIN o.tienda t
                  WHERE o.revisada = true
                    AND o.fechaPublicacion < :fecha
                    AND c.slug = :ciudad
              ORDER BY o.fechaPublicacion DESC';
        $consulta = $em->createQuery($dql);
        $consulta->setParameter('fecha', $fechaPublicacion);
        $consulta->setParameter('ciudad', $ciudad);
        $consulta->setMaxResults(1);

        if (!$consulta)

        {
            throw new HttpException(400,'No se ha encontrado la oferta del día en la ciudad seleccionada');
        }else{
            return $consulta->getSingleResult();
        }


    }

}