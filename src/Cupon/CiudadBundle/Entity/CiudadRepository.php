<?php
/**
 * Created by PhpStorm.
 * User: SaMa
 * Date: 15/8/16
 * Time: 16:36
 */

// src/Cupon/CiudadBundle/Entity/CiudadRepository.php

namespace Cupon\CiudadBundle\Entity;
use Doctrine\ORM\EntityRepository;

class CiudadRepository extends EntityRepository
{

    //Busca las 5 ciudades más cercanas a la ciudad activa
    public function findCercanas($ciudad_id)
    {
        // La entidad no tiene información suficiente para poder hacer geobúsquedas...

        $em = $this->getEntityManager();

        $consulta = $em->createQuery('
            SELECT c
                FROM CiudadBundle:Ciudad c
               WHERE c.id != :id
            ORDER BY c.nombre ASC');
        $consulta->setMaxResults(5);
        $consulta->setParameter('id', $ciudad_id);

        return $consulta->getResult();
    }

}