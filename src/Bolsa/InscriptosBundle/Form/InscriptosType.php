<?php

namespace Bolsa\InscriptosBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class InscriptosType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('apellido')
            ->add('nombre')
            ->add('dni')
            ->add('username')
            ->add('password')
            //->add('salt')
            ->add('email')
            ->add('avisos')
            //->add('modificado')
            ->add('nacimiento')
            ->add('sexo')
            ->add('calle')
            ->add('cp')
            ->add('user_roles')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Bolsa\InscriptosBundle\Entity\Inscriptos'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'bolsa_inscriptosbundle_inscriptos';
    }
}
