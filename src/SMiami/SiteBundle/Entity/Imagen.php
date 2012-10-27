<?php

namespace SMiami\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * SMiami\UserBundle\Entity\Imagen
 *
 * @ORM\Table()
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class Imagen
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
     * @var string $path
     *
     * @ORM\Column(name="path", type="string", length=255)
     */
    private $path;
    
    /**
     * @Assert\Image(
     *     maxSize = "2048k",
     *     mimeTypesMessage = "Seleccione una imagen por favor"
     * )
     */
    public $imagen;
    
    /**
     * @var boolean $portada
     *
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $portada;

    /**
     * @var \SMiami\UserBundle\Entity\Anuncio $anuncio
     *
     * @ORM\ManyToOne(targetEntity="Anuncio", inversedBy="imagenes")
     * @ORM\JoinColumn(name="anuncio_id", referencedColumnName="id")
     */
    private $anuncio;
    
    /**
     * @var date $updated
     * 
     * @ORM\Column(type="datetime")
     */
    private $updated;
    
    
    public function __construct() {
        $this->updated = new \DateTime();
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
     * Set path
     *
     * @param string $path
     * @return Imagen
     */
    public function setPath($path)
    {
        $this->path = $path;
    
        return $this;
    }

    /**
     * Get path
     *
     * @return string 
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Set anuncio
     *
     * @param SMiami\SiteBundle\Entity\Anuncio $anuncio
     * @return Imagen
     */
    public function setAnuncio(\SMiami\SiteBundle\Entity\Anuncio $anuncio = null)
    {
        $this->anuncio = $anuncio;
    
        return $this;
    }

    /**
     * Get anuncio
     *
     * @return SMiami\SiteBundle\Entity\Anuncio 
     */
    public function getAnuncio()
    {
        return $this->anuncio;
    }
    
    public function getAbsolutePath()
    {
        return null === $this->path ? null : $this->getUploadRootDir().'/'.$this->path;
    }

    public function getWebPath()
    {
        return null === $this->path ? null : $this->getUploadDir().'/'.$this->path;
    }

    protected function getUploadRootDir()
    {
        return __DIR__.'/../../../../web/'.$this->getUploadDir();
    }

    protected function getUploadDir()
    {
        return 'uploads/fotos';
    }
    
    /**
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function preUpload()
    {
        if (null !== $this->imagen) {
            $this->path = uniqid().'.'.$this->imagen->guessExtension();
        }
    }

    /**
     * @ORM\PostPersist()
     * @ORM\PostUpdate()
     */
    public function upload()
    {
        if (null === $this->imagen) {
            return;
        }

        $this->imagen->move($this->getUploadRootDir(), $this->path);

        //unset($this->file);
    }

    /**
     * @ORM\PostRemove()
     */
    public function removeUpload()
    {
        if ($file = $this->getAbsolutePath()) {
            unlink($file);
        }
    }
    
    /**
     * toString
     */
    public function __toString() {
        return $this->path;
    }

    /**
     * Set portada
     *
     * @param boolean $portada
     * @return Imagen
     */
    public function setPortada($portada)
    {
        $this->portada = $portada;
    
        return $this;
    }

    /**
     * Get portada
     *
     * @return boolean 
     */
    public function getPortada()
    {
        return $this->portada;
    }

    /**
     * Set updated
     *
     * @param \DateTime $updated
     * @return Imagen
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;
    
        return $this;
    }

    /**
     * Get updated
     *
     * @return \DateTime 
     */
    public function getUpdated()
    {
        return $this->updated;
    }
}