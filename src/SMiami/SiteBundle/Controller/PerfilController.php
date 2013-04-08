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
        
        $em = $this->getDoctrine()->getEntityManager();
        $anuncios = $em->getRepository("SiteBundle:Anuncio")->getAnunciosByUser($this->get("security.context")->getToken()->getUser()->getId());
        $comentarios = $em->getRepository("SiteBundle:Comentario")->getComentariosByUser($this->get("security.context")->getToken()->getUser()->getId());
        return array('anuncios' => $anuncios, 'comentarios' => $comentarios);
    }
}

?>
