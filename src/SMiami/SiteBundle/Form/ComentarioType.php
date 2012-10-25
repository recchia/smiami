<?php

namespace SMiami\SiteBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ComentarioType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('comentario', null, array('attr' => array('cols' => 70, 'rows' => 10)))
            ->add('ip', 'hidden')
            ->add('anuncio','anuncio_selector') 
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'SMiami\SiteBundle\Entity\Comentario'
        ));
    }

    public function getName()
    {
        return 'smiami_sitebundle_comentariotype';
    }
}
