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
        return $this->render('SiteBundle:Default:index.html.twig', array('anuncios' => $anuncios));
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
    
    
}
