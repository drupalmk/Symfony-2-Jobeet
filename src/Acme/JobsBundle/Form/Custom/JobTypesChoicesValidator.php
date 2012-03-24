<?php

namespace Acme\JobsBundle\Form\Custom;

use Symfony\Component\Form\FormValidatorInterface,
    Symfony\Component\Form\FormInterface,
    Symfony\Component\Form\FormError,
    Acme\JobsBundle\Form\Custom\JobTypeChoices;

class TypeChoicesValidator implements FormValidatorInterface
{
   public function validate(FormInterface $form)
   {
      $job = $form->getData();
      if (! in_array($job->getType(), JobTypeChoices::getChoicesKeys())) {
         $form->addError(new FormError('Choose a valid type'));
      }
   }
}