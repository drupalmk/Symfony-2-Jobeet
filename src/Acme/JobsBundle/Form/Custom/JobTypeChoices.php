<?php

namespace Acme\JobsBundle\Form\Custom;

use Symfony\Component\Form\Extension\Core\ChoiceList\ChoiceListInterface,
    Acme\JobsBundle\Entity\Jobs;

class JobTypeChoices implements ChoiceListInterface
{     
   public function getChoices()
   {
      return Jobs::getTypes();
   }
   
}