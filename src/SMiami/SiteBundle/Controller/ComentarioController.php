<?php

namespace SMiami\SiteBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use SMiami\SiteBundle\Entity\Comentario;
use SMiami\SiteBundle\Form\ComentarioType;

/**
 * Comentario controller.
 *
 * @Route("/comentario")
 */
class ComentarioController extends Controller
{
    /**
     * Lists all Comentario entities.
     *
     * @Route("/", name="comentario")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('SiteBundle:Comentario')->findAll();

        return array(
            'entities' => $entities,
        );
    }

    /**
     * Finds and displays a Comentario entity.
     *
     * @Route("/{id}/show", name="comentario_show")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SiteBundle:Comentario')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Comentario entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to create a new Comentario entity.
     *
     * @Route("/new/{perfil}", name="comentario_new")
     * @Template()
     */
    public function newAction($perfil)
    {
        $entity = new Comentario();
        $entity->setIp($this->container->get('request')->getClientIp());
        $em = $this->getDoctrine()->getEntityManager();
        $perfil = $em->getRepository("SiteBundle:Anuncio")->find($perfil);
        $entity->setAnuncio($perfil);
        $form   = $this->createForm(new ComentarioType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
            'nombre' => $perfil->getNombre()
        );
    }

    /**
     * Creates a new Comentario entity.
     *
     * @Route("/create", name="comentario_create")
     * @Method("POST")
     * @Template("SiteBundle:Comentario:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $autor = $this->get("security.context")->getToken()->getUser();
        $entity  = new Comentario();
        $entity->setAutor($autor);
        $form = $this->createForm(new ComentarioType(), $entity);
        $form->bind($request);
        if ($form->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('comentario_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Comentario entity.
     *
     * @Route("/{id}/edit", name="comentario_edit")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SiteBundle:Comentario')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Comentario entity.');
        }

        $editForm = $this->createForm(new ComentarioType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Comentario entity.
     *
     * @Route("/{id}/update", name="comentario_update")
     * @Method("POST")
     * @Template("SiteBundle:Comentario:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SiteBundle:Comentario')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Comentario entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new ComentarioType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('comentario_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Comentario entity.
     *
     * @Route("/{id}/delete", name="comentario_delete")
     * @Method("POST")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SiteBundle:Comentario')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Comentario entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('miperfil'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
