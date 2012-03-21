<?php

namespace Acme\JobsBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class JobsType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('userId')
            ->add('jobType')
            ->add('company')
            ->add('logo')
            ->add('url')
            ->add('position')
            ->add('location')
            ->add('description')
            ->add('howToApply')
            ->add('isPublic')
            ->add('isActivated')
            ->add('email')
            ->add('createdAt')
            ->add('updatedAt')
            ->add('expiresAt')
            ->add('category')
        ;
    }

    public function getName()
    {
        return 'acme_jobsbundle_jobstype';
    }
}
