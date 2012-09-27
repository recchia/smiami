<?php

namespace SMiami\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * SMiami\SiteBundle\Entity\Anuncio
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="SMiami\SiteBundle\Entity\AnuncioRepository")
 */
class Anuncio
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
     * @ORM\Column(name="nombre", type="string", length=25)
     */
    private $nombre;

    /**
     * @var integer $edad
     *
     * @ORM\Column(name="edad", type="smallint")
     */
    private $edad;

    /**
     * @var string $descripcion
     *
     * @ORM\Column(name="descripcion", type="text", length=500)
     */
    private $descripcion;

    /**
     * @ORM\ManyToOne(targetEntity="Condado", inversedBy="anuncios")
     * @ORM\JoinColumn(name="condado_id", referencedColumnName="id")
     */
    private $condado;
    
    /**
     * @ORM\ManyToOne(targetEntity="Ciudad", inversedBy="anuncios")
     * @ORM\JoinColumn(name="ciudad_id", referencedColumnName="id")
     */
    private $ciudad;

    /**
     * @var string $email
     *
     * @ORM\Column(name="email", type="string", length=60)
     */
    private $email;

    /**
     * @ORM\ManyToOne(targetEntity="Pago", inversedBy="anuncios")
     * @ORM\JoinColumn(name="pago_id", referencedColumnName="id")
     */
    private $pago;
    
    /**
     * @ORM\OneToOne(targetEntity="Usuario", inversedBy="anuncio")
     * @ORM\JoinColumn(name="usuario_id", referencedColumnName="id")
     */
    private $usuario;
    
    /**
     * @ORM\OneToMany(targetEntity="Imagen", mappedBy="anuncio", cascade={"persist","remove"})
     */
    private $imagenes;

        /**
     * Constructor
     */
    public function __construct()
    {
        $this->imagenes = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
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
     * @return Anuncio
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
     * Set edad
     *
     * @param integer $edad
     * @return Anuncio
     */
    public function setEdad($edad)
    {
        $this->edad = $edad;
    
        return $this;
    }

    /**
     * Get edad
     *
     * @return integer 
     */
    public function getEdad()
    {
        return $this->edad;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return Anuncio
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
     * Set email
     *
     * @param string $email
     * @return Anuncio
     */
    public function setEmail($email)
    {
        $this->email = $email;
    
        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set condado
     *
     * @param SMiami\SiteBundle\Entity\Condado $condado
     * @return Anuncio
     */
    public function setCondado(\SMiami\SiteBundle\Entity\Condado $condado = null)
    {
        $this->condado = $condado;
    
        return $this;
    }

    /**
     * Get condado
     *
     * @return SMiami\SiteBundle\Entity\Condado 
     */
    public function getCondado()
    {
        return $this->condado;
    }

    /**
     * Set ciudad
     *
     * @param SMiami\SiteBundle\Entity\Ciudad $ciudad
     * @return Anuncio
     */
    public function setCiudad(\SMiami\SiteBundle\Entity\Ciudad $ciudad = null)
    {
        $this->ciudad = $ciudad;
    
        return $this;
    }

    /**
     * Get ciudad
     *
     * @return SMiami\SiteBundle\Entity\Ciudad 
     */
    public function getCiudad()
    {
        return $this->ciudad;
    }

    /**
     * Set pago
     *
     * @param SMiami\SiteBundle\Entity\Pago $pago
     * @return Anuncio
     */
    public function setPago(\SMiami\SiteBundle\Entity\Pago $pago = null)
    {
        $this->pago = $pago;
    
        return $this;
    }

    /**
     * Get pago
     *
     * @return SMiami\SiteBundle\Entity\Pago 
     */
    public function getPago()
    {
        return $this->pago;
    }

    /**
     * Set usuario
     *
     * @param SMiami\SiteBundle\Entity\Usuario $usuario
     * @return Anuncio
     */
    public function setUsuario(\SMiami\SiteBundle\Entity\Usuario $usuario = null)
    {
        $this->usuario = $usuario;
    
        return $this;
    }

    /**
     * Get usuario
     *
     * @return SMiami\SiteBundle\Entity\Usuario 
     */
    public function getUsuario()
    {
        return $this->usuario;
    }
    
    /**
     * Add imagenes
     *
     * @param SMiami\SiteBundle\Entity\Imagen $imagenes
     * @return Anuncio
     */
    public function addImagene(\SMiami\SiteBundle\Entity\Imagen $imagenes)
    {
        $this->imagenes[] = $imagenes;
    
        return $this;
    }

    /**
     * Remove imagenes
     *
     * @param SMiami\SiteBundle\Entity\Imagen $imagenes
     */
    public function removeImagene(\SMiami\SiteBundle\Entity\Imagen $imagenes)
    {
        $this->imagenes->removeElement($imagenes);
    }

    /**
     * Get imagenes
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getImagenes()
    {
        return $this->imagenes;
    }
}