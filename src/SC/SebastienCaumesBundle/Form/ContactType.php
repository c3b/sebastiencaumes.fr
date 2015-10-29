<?php

namespace SC\SebastienCaumesBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;


class ContactType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('prenom')
            ->add('email', 'email')
            ->add('sujet')
            ->add('message')
            ->add('envoyer', 'submit')
        ;
    }


    /**
     * @return string
     */
    public function getName()
    {
        return 'sc_sebastiencaumesbundle_contact';
    }
}

