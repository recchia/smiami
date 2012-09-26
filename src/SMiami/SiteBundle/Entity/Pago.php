<?php

namespace SMiami\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SMiami\UserBundle\Entity\Pago
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Pago
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string $descripcion
     *
     * @ORM\Column(name="descripcion", type="string", length=60)
     */
    private $descripcion;

    /**
     * @var decimal $precio
     *
     * @ORM\Column(name="precio", type="decimal", precision=20, scale=2)
     */
    private $precio;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return Pago
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    
        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string 
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set precio
     *
     * @param float $precio
     * @return Pago
     */
    public function setPrecio($precio)
    {
        $this->precio = $precio;
    
        return $this;
    }

    /**
     * Get precio
     *
     * @return float 
     */
    public function getPrecio()
    {
        return $this->precio;
    }
    
    /**
     * toString
     * 
     * @return string
     */
    public function __toString() {
        return $this->getDescripcion().' - '.$this->getPrecio();
    }
}