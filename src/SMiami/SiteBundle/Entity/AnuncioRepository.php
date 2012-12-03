<?php

namespace SMiami\SiteBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * AnuncioRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class AnuncioRepository extends EntityRepository
{
    public function getDamas()
    {
        $em = $this->getEntityManager();
        
        $strSQL = "SELECT a.id, a.nombre, co.nombre AS condado, ci.nombre AS ciudad, i.path AS imagen FROM SiteBundle:Anuncio a JOIN a.condado co JOIN a.ciudad ci JOIN a.imagenes i JOIN a.seccion s WHERE i.portada = true AND s.nombre = 'Damas'";
        $consulta = $em->createQuery($strSQL);
        
        return $consulta->getResult();
    }
    
    public function getCaballeros()
    {
        $em = $this->getEntityManager();
        
        $strSQL = "SELECT a.id, a.nombre, co.nombre AS condado, ci.nombre AS ciudad, i.path AS imagen FROM SiteBundle:Anuncio a JOIN a.condado co JOIN a.ciudad ci JOIN a.imagenes i JOIN a.seccion s WHERE i.portada = true AND s.nombre = 'Caballeros'";
        $consulta = $em->createQuery($strSQL);
        
        return $consulta->getResult();
    }
    
    public function getSpa()
    {
        $em = $this->getEntityManager();
        
        $strSQL = "SELECT a.id, a.nombre, co.nombre AS condado, ci.nombre AS ciudad, i.path AS imagen FROM SiteBundle:Anuncio a JOIN a.condado co JOIN a.ciudad ci JOIN a.imagenes i JOIN a.seccion s WHERE i.portada = true AND s.nombre = 'Spa/Body Rubs'";
        $consulta = $em->createQuery($strSQL);
        
        return $consulta->getResult();
    }
    
    public function getTrans()
    {
        $em = $this->getEntityManager();
        
        $strSQL = "SELECT a.id, a.nombre, co.nombre AS condado, ci.nombre AS ciudad, i.path AS imagen FROM SiteBundle:Anuncio a JOIN a.condado co JOIN a.ciudad ci JOIN a.imagenes i JOIN a.seccion s WHERE i.portada = true AND s.nombre = 'Transexuales'";
        $consulta = $em->createQuery($strSQL);
        
        return $consulta->getResult();
    }
    
    public function getDominacion()
    {
        $em = $this->getEntityManager();
        
        $strSQL = "SELECT a.id, a.nombre, co.nombre AS condado, ci.nombre AS ciudad, i.path AS imagen FROM SiteBundle:Anuncio a JOIN a.condado co JOIN a.ciudad ci JOIN a.imagenes i JOIN a.seccion s WHERE i.portada = true AND s.nombre = 'Dominación y Fetichismo'";
        $consulta = $em->createQuery($strSQL);
        
        return $consulta->getResult();
    }
    
    public function getAnunciosByUser($id)
    {
        $em = $this->getEntityManager();
        
        $strSQL = "SELECT a.id, a.nombre, co.nombre AS condado, ci.nombre AS ciudad, s.nombre AS seccion FROM SiteBundle:Anuncio a JOIN a.condado co JOIN a.ciudad ci JOIN a.seccion s WHERE a.usuario = $id";
        $consulta = $em->createQuery($strSQL);
        
        return $consulta->getResult();
    }
}
