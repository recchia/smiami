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
        return $this->render('SiteBundle:Default:index.html.twig');
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
}
