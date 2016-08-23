<?php
/**
 * Created by PhpStorm.
 * User: SaMa
 * Date: 23/8/16
 * Time: 11:25
 */

namespace Cupon\UsuarioBundle\Entity;

use Doctrine\ORM\EntityRepository;

class UsuarioRepository extends EntityRepository {

    public function findTodasLasCompras($usuario)
    {
        $em = $this->getEntityManager();

        $consulta= $em->createQuery('SELECT v, o, t
                                    FROM OfertaBundle:Venta v
                                    JOIN v.oferta o
                                    JOIN o.tienda t
                                    WHERE v.usuario = :id
                                    ORDER BY v.fecha DESC');
        //$consulta->setMaxResults(5); Queremos toads las compras
        $consulta->setParameter('id', $usuario);

        return $consulta->getResult();
    }
}