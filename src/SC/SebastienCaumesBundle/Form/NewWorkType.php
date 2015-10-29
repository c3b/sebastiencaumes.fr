<?php

namespace SC\SebastienCaumesBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;


class NewWorkType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('description', null, array('attr' => array('class' => 'ckeditor')))
            ->add('image', 'url')
            ->add('date')
            ->add('author');


    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'sc_sebastiencaumesbundle_newwork';
    }
}

