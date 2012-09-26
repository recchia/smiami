<?php

namespace SMiami\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SMiami\SiteBundle\Entity\Ciudad
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Ciudad
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
     * @var string $nombre
     *
     * @ORM\Column(name="nombre", type="string", length=255)
     */
    private $nombre;

    /**
     * @var \SMiami\SiteBundle\Entity\Condado $condado
     *
     * @ORM\ManyToOne(targetEntity="Condado", inversedBy="ciudades")
     * @ORM\JoinColumn(name="condado_id", referencedColumnName="id")
     */
    private $condado;


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
     * Set nombre
     *
     * @param string $nombre
     * @return Ciudad
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    
        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set condado
     *
     * @param \SMiami\SiteBundle\Entity\Condado $condado
     * @return Ciudad
     */
    public function setCondado(\SMiami\SiteBundle\Entity\Condado $condado = null)
    {
        $this->condado = $condado;
    
        return $this;
    }

    /**
     * Get condado
     *
     * @return \SMiami\SiteBundle\Entity\Condado 
     */
    public function getCondado()
    {
        return $this->condado;
    }
    
    /**
     * toString
     * 
     * @return string
     */
    public function __toString() {
        return $this->getNombre();
    }
}
