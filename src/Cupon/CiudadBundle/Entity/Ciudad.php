<?php
/**
 * Created by PhpStorm.
 * User: SaMa
 * Date: 9/8/16
 * Time: 18:29
 */

// src/Cupon/CiudadBundle/Entity/Ciudad.php

namespace Cupon\CiudadBundle\Entity;

use Cupon\OfertaBundle\Util\Util;
use Doctrine\ORM\Mapping as ORM;


/**
 *
 * @ORM\Entity
 */

class Ciudad{
    // Las propiedades sólo pueden ser protected o private, no públicas (lazy loading)
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    protected $id;

    /** @ORM\Column(type="string", length=100)   */
    protected $nombre;

    /** @ORM\Column(type="string", length=100)   */
    protected $slug;

    public function getId()
    {
        return $this->id;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
        $this->slug = Util::getSlug($nombre);
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getSlug()
    {
        return $this->slug;
    }

    public function setSlug($slug)
    {
        $this->slug = $slug;
    }

    public function __toString()
    {
        // TODO: Implement __toString() method.
        return $this->getNombre();
    }
}