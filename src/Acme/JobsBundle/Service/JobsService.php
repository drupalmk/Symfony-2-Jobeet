<?php
namespace Acme\JobsBundle\Service;

class JobsService {
	
	CONST CATEGORIES_ENTITY = 'JobsBundle:Categories';
	
	CONST JOBS_ENTITY = 'JobsBundle:Jobs';
	
	private $_em;
	
	public function __construct(\Doctrine\ORM\EntityManager $em) 
	{
		$this->_em = $em;
	}
	
	public function getCategoriesWithJobs($limitByCategorory)
	{
		$categories = $this->_em->getRepository(self::CATEGORIES_ENTITY)
			->getContainingJobs();
		$jobsRepo = $this->_em->getRepository(self::JOBS_ENTITY);
		
		foreach($categories as $c) {
			$jobs = $jobsRepo->getJobsByCategory($c, $limitByCategorory);
			$c->setActiveJobs($jobs);
		}
		
		return $categories;
	}

}
