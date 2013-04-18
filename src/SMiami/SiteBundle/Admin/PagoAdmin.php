<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PagoAdmin
 *
 * @author piero
 */
namespace SMiami\SiteBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class PagoAdmin extends Admin {
    
    protected function configureListFields(ListMapper $list) {
        $list
            ->addIdentifier('descripcion', null, array('label' => 'Descripción'))
            ->add('dias', null, array('label' => 'Días'))
            ->add('precio')
        ;
    }
    
    protected function configureDatagridFilters(DatagridMapper $filter) {
        $filter
            ->add('descripcion', null, array('label' => 'Descripción'))
            ->add('dias', null, array('label' => 'Días'))
            ->add('precio')
        ;
    }
    
    protected function configureShowField(ShowMapper $show) {
        $show
            ->add('descripcion', null, array('label' => 'Descripción'))
            ->add('dias', null, array('label' => 'Días'))
            ->add('precio')
        ;
    }
    
    protected function configureFormFields(FormMapper $form) {
        $form
            ->add('descripcion', null, array('label' => 'Descripción'))
            ->add('dias', null, array('label' => 'Días'))
            ->add('precio')
        ;
    }
}

?>
