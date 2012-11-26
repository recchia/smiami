<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PerfilController
 *
 * @author piero
 */
namespace SMiami\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * Anuncio controller.
 *
 * @Route("/perfil")
 */
class PerfilController extends Controller {
    
    /**
     * @Route("/", name="miperfil")
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
}

?>
