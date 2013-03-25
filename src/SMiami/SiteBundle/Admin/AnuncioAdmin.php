<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UnidadAdministrativaAdmin
 *
 * @author recchia
 */
namespace SMiami\SiteBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class AnuncioAdmin extends Admin {
    
    protected function configureListFields(ListMapper $list) {
        $list
            ->addIdentifier('nombre')
            ->add('edad')
            ->add('seccion', null, array('label' => 'Sección'))
            ->add('condado')
            ->add('ciudad')
            ->add('telefono', null, array('label' => 'Teléfono'))
            ->add('email')
        ;
    }
    
    protected function configureDatagridFilters(DatagridMapper $filter) {
        $filter
            ->add('nombre')
        ;
    }
    
    protected function configureShowField(ShowMapper $show) {
        $show
            ->add('nombre')
            ->add('edad')
            ->add('descripcion', null, array('label' => 'Descripción'))
            ->add('seccion', null, array('label' => 'Sección'))
            ->add('condado')
            ->add('ciudad')
            ->add('telefono', null, array('label' => 'Teléfono'))
            ->add('email')
            ->add('publicar_email')
            ->add('pago')
        ;
    }
    
    protected function configureFormFields(FormMapper $form) {
        $form
            ->add('nombre')
            ->add('edad')
            ->add('descripcion', null, array('label' => 'Descripción'))
            ->add('seccion', null, array('label' => 'Sección'))
            ->add('condado')
            ->add('ciudad')
            ->add('telefono', null, array('label' => 'Teléfono'))
            ->add('email')
            ->add('publicar_email')
            ->add('pago')
        ;
    }
}

?>
