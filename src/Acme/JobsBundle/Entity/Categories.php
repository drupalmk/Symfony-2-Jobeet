<?php

namespace Acme\JobsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

class Categories
{
    /**
     * @var integer $id
     *
     */
    private $id;

    /**
     * @var string $name
     *
     */
    private $name;

    /**
     * @var string $slug
     *
     */
    private $slug;

    private $activeJobs;
    
    public function setActiveJobs(array $jobs)
    {
	$this->activeJobs = $jobs;
    }
    
    public function getActiveJobs()
    {
	return $this->activeJobs;
    }
    
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set slug
     *
     * @param string $slug
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
    }

    /**
     * Get slug
     *
     * @return string 
     */
    public function getSlug()
    {
        return $this->slug;
    }

    public function __toString()
    {
    	return $this->name;
    }
    /**
     * @var Acme\JobsBundle\Entity\Jobs
     */
    private $jobs;

    public function __construct()
    {
        $this->jobs = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add jobs
     *
     * @param Acme\JobsBundle\Entity\Jobs $jobs
     */
    public function addJobs(\Acme\JobsBundle\Entity\Jobs $jobs)
    {
        $this->jobs[] = $jobs;
    }

    /**
     * Get jobs
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getJobs()
    {
        return $this->jobs;
    }
}