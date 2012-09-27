<?php

namespace SMiami\SiteBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AnuncioType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre')
            ->add('edad')
            ->add('descripcion')
            ->add('email')
            ->add('condado')
            ->add('ciudad')
            ->add('pago')
            //->add('usuario', 'hidden', array('data_class' => '\SMiami\SiteBundle\Entity\Usuario', 'property_path' => 'usuario.id'))
            //->add('usuario', 'hidden', array('property_path' => 'usuario.id'))
            ->add('usuario')
            ->add('imagenes', 'collection', array('type' => new ImagenType()))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'SMiami\SiteBundle\Entity\Anuncio'
        ));
    }

    public function getName()
    {
        return 'smiami_sitebundle_anunciotype';
    }
}
