<?php

namespace SMiami\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="home")
     * @Template()
     */
    public function indexAction()
    {
        $session = $this->getRequest()->getSession();
        if($session->get('intro') == false) {
            return $this->forward('SiteBundle:Default:intro');
        }
        $em = $this->getDoctrine()->getEntityManager();
        $anuncios = $em->getRepository("SiteBundle:Anuncio")->getDamas();
        return array('anuncios' => $anuncios);
    }
    
    /**
     * @Route("/caballeros", name="caballeros")
     * @Template()
     */
    public function caballerosAction()
    {
        $em = $this->getDoctrine()->getEntityManager();
        $anuncios = $em->getRepository("SiteBundle:Anuncio")->getCaballeros();
        return array('anuncios' => $anuncios);
    }
    
    /**
     * @Route("/spa", name="spa")
     * @Template()
     */
    public function spaAction()
    {
        $em = $this->getDoctrine()->getEntityManager();
        $anuncios = $em->getRepository("SiteBundle:Anuncio")->getSpa();
        return array('anuncios' => $anuncios);
    }
    
    /**
     * @Route("/transexuales", name="transexuales")
     * @Template()
     */
    public function transexualesAction()
    {
        $em = $this->getDoctrine()->getEntityManager();
        $anuncios = $em->getRepository("SiteBundle:Anuncio")->getTrans();
        return array('anuncios' => $anuncios);
    }
    
    /**
     * @Route("/dominacion", name="dominacion")
     * @Template()
     */
    public function dominacionAction()
    {
        $em = $this->getDoctrine()->getEntityManager();
        $anuncios = $em->getRepository("SiteBundle:Anuncio")->getDominacion();
        return array('anuncios' => $anuncios);
    }
    
    /**
     * @Route("/intro")
     * @Template()
     */
    public function introAction()
    {
        return $this->render('SiteBundle:Default:intro.html.twig');
    }
    
    /**
     * @Route("/reglas", name="reglas")
     * @Template()
     */
    public function reglasAction()
    {
        $session = $this->getRequest()->getSession();
        $session->set('intro', true);
        return $this->render('SiteBundle:Default:reglas.html.twig');
    }

    /**
     * @Route("/reglasreg", name="reglasreg")
     * @Template()
     */
    public function reglasregAction()
    {
        $session = $this->getRequest()->getSession();
        $session->set('intro', true);
        return $this->render('SiteBundle:Default:reglasreg.html.twig');
    }
    
    /**
     * @Route("/terminos", name="terminos")
     * @Template()
     */
    public function terminosAction()
    {
        return $this->render('SiteBundle:Default:terminos.html.twig');
    }

    /**
     * @Route("/politicas", name="politicas")
     * @Template()
     */
    public function politicasAction()
    {
        return $this->render('SiteBundle:Default:politicas.html.twig');
    }
    
    /**
     * @Route("/reglascomen", name="reglascomen")
     * @Template()
     */
    public function reglascomenAction()
    {
        return $this->render('SiteBundle:Default:reglascomen.html.twig');
    }

    /**
     * @Route("/contactenos", name="contactenos")
     * @Template()
     */
    public function contactenosAction()
    {
        return $this->render('SiteBundle:Default:contactenos.html.twig');
    }

}
