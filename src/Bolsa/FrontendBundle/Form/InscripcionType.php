<?php
namespace Bolsa\FrontendBundle\Form;
//namespace Bolsa\InscriptosBundle\Form;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\AbstractType;
//use Symfony\Component\Form\FormBuilder;
class InscripcionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nombre')
                ->add('apellido')
                ->add('dni')
                ->add('email');
    }
    public function getName()
    {
        return 'inscriptos_form';
    }
}
