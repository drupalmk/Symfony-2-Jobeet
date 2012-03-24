<?php

namespace Acme\JobsBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

use Acme\JobsBundle\Form\Custom\JobTypeChoices,
    Acme\JobsBundle\Form\Custom\JobTypeChoicesValidator;

class JobsType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('category')
            ->add('jobType', 'choice', array('choice_list' => new JobTypeChoices, 'expanded' => true, 'multiple' => false))
            ->add('company')
            ->add('file', 'file', array('label' => 'Company logo'))
            ->add('url')
            ->add('position')
            ->add('location')
            ->add('description', 'textarea')
            ->add('howToApply', 'textarea', array('label' => 'How to apply?'))
            ->add('isPublic', 'checkbox', array('label' => 'Public?'))
            ->add('email') 
        ;
    }

    public function getName()
    {
        return 'job';
    }
}
