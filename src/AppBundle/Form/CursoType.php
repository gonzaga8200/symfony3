<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
class CursoType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titulo', TextType::class, array("required"=>"required", "attr"=>array(
                "class"=>"form_titulo tituloaksdja"
            )))
            ->add('descripcion', TextareaType::class)
            ->add('precio', TextType::class)
            ->add('precio',ChoiceType::class, array(
                "choices"=>array(
                    "hombre"=>"hombre",
                    "mujer"=>"mujer",
                    "cosa"=>"cosa"
                )
            ))
            ->add('Guardar',SubmitType::class )

        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Curso'
        ));
    }
}
