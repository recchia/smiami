<?php

namespace SMiami\SiteBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use SMiami\SiteBundle\Entity\Anuncio;
use SMiami\SiteBundle\Form\AnuncioType;

/**
 * Anuncio controller.
 *
 * @Route("/anuncio")
 */
class AnuncioController extends Controller
{
    /**
     * Lists all Anuncio entities.
     *
     * @Route("/", name="anuncio")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('SiteBundle:Anuncio')->findAll();

        return array(
            'entities' => $entities,
        );
    }

    /**
     * Finds and displays a Anuncio entity.
     *
     * @Route("/{id}/show", name="anuncio_show")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SiteBundle:Anuncio')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Anuncio entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to create a new Anuncio entity.
     *
     * @Route("/new", name="anuncio_new")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Anuncio();
        for ($index = 0; $index < 4; $index++) {
            $entity->getImagenes()->add(new \SMiami\SiteBundle\Entity\Imagen());
        }
        $form   = $this->createForm(new AnuncioType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a new Anuncio entity.
     *
     * @Route("/create", name="anuncio_create")
     * @Method("POST")
     * @Template("SiteBundle:Anuncio:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new Anuncio();
        for ($index = 0; $index < 4; $index++) {
            $entity->getImagenes()->add(new \SMiami\SiteBundle\Entity\Imagen());
        }
        $form = $this->createForm(new AnuncioType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $usuario = $this->get("security.context")->getToken()->getUser();
            $entity->setUsuario($usuario);
            foreach ($entity->getImagenes() as $img) {
                $img->setAnuncio($entity);
            }
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('detalle_show', array('perfil' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Anuncio entity.
     *
     * @Route("/{id}/edit", name="anuncio_edit")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SiteBundle:Anuncio')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('No se encuentra el Anuncio seleccionado.');
        }

        $editForm = $this->createForm(new AnuncioType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Anuncio entity.
     *
     * @Route("/{id}/update", name="anuncio_update")
     * @Method("POST")
     * @Template("SiteBundle:Anuncio:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SiteBundle:Anuncio')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Anuncio entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new AnuncioType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('anuncio_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Anuncio entity.
     *
     * @Route("/{id}/delete", name="anuncio_delete")
     * @Method("POST")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SiteBundle:Anuncio')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Anuncio entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('anuncio'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
    
    /**
     * @Route("/reglas", name="anuncio_reglas")
     * @Template()
     */
    public function reglasAction()
    {
        return $this->render('SiteBundle:Anuncio:reglas.html.twig');
    }
    

    /**
     * Finds and displays a Anuncio entity.
     *
     * @Route("/detalle/{perfil}", name="detalle_show")
     * @Template()
     */
    public function detalleAction($perfil)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $anuncio = $em->getRepository('SiteBundle:Anuncio')->find($perfil);
        return array('anuncio' => $anuncio);
        
    }
}

