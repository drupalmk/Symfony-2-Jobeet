<?php

namespace Acme\JobsBundle\Entity;

use Doctrine\ORM\EntityRepository;

class CategoriesRepository extends EntityRepository
{
	
	public function getWithActiveJobs($maxJobsByCategory)
	{
		$categories = $this->getContainingJobs();
		$jobsRepo = $this->_em->getRepository('JobsBundle:Jobs');
		foreach($categories as $c) {
			$c->setActiveJobs($jobsRepo->findActiveByCategory($c->getId(), $maxJobsByCategory));
		}
		return $categories;
	}
	
    public function getContainingJobs()
    {
    	return $this->_em->createQuery('SELECT c FROM JobsBundle:Categories c
    			INNER JOIN c.jobs j WITH j.category = c GROUP BY c.id ORDER BY c.name ASC')
    			->getResult();
    /*
    $qb = $this->_em->createQueryBuilder();
    return $qb->add('select', 'c')
            ->add('from', $this->_entityName . ' c')
            ->innerJoin('c.jobs', 'j', 'WITH', 'j.category = c')
            ->getQuery()
            ->getResult();  */     
    }

}