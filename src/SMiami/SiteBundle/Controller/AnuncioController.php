<?php

namespace SMiami\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class AnuncioController extends Controller {
    
    /**
     * @Route("/anuncio/reglas", name="reglas_anuncio")
     * @Template()
     */
    public function reglasadAction()
    {
        return $this->render('SiteBundle:Anuncio:reglasad.html.twig');
    }
}

?>
