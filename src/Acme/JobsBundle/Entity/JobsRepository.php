<?php

namespace Acme\JobsBundle\Entity;
use Doctrine\ORM\EntityRepository;

class JobsRepository extends EntityRepository {
	
	public function findActiveByCategory($id, $limit)
	{
		$query = $this->_em->createQuery('SELECT j FROM JobsBundle:Jobs j WHERE j.category = ?1
				AND j.expiresAt > ?2 ORDER BY j.expiresAt DESC');
		$query->setMaxResults($limit);
		$query->setParameter(1, $id);
		$query->setParameter(2, new \DateTime());
		return $query->getResult();		
		/*$qb = $this->_em->createQueryBuilder();
		$jobs = $qb->add('select', 'j')
			->add('from', $this->_entityName . ' j')
			->add('where', $qb->expr()->andx(
					$qb->expr()->eq('j.category', '?1'),
					$qb->expr()->gt('j.expiresAt', '?2')
			))
			->add('orderBy', 'j.expiresAt DESC')
			->setMaxResults($limit)
			->setParameter(1, $id)
			->setParameter(2, new \DateTime())
			->getQuery()
			->getResult();
		return $jobs;*/
	}
}