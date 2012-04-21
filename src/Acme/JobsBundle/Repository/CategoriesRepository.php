<?php

namespace Acme\JobsBundle\Repository;

use Doctrine\ORM\EntityRepository;

class CategoriesRepository extends EntityRepository
{
    public function getContainingJobs()
    {
    $qb = $this->_em->createQueryBuilder();
    return $qb->add('select', 'c')
            ->add('from', $this->_entityName . ' c')
            ->innerJoin('c.jobs', 'j', 'WITH', 'j.category = c')
            ->getQuery()
            ->getResult();       
    }

}