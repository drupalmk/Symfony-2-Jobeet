<?php

namespace Acme\JobsBundle\Tests;

use Acme\JobsBundle\Entity\Jobs,
    Acme\JobsBundle\Entity\Categories,
    Acme\JobsBundle\Tests\BaseTestCase as BaseTestCase;

class JobsTestCase extends BaseTestCase
{
    
     
    private $job;
    
    private $em;
    
    public function setUp()
    {
      $this->job = new Jobs;
      $this->em = $this->get('doctrine')->getEntityManager();
      $results = $this->em->getRepository('JobsBundle:Categories')
                              ->findBy(array('name' => 'Programming'));
      
      $this->job->setCategory($results[0]);
      $this->job->setJobType('full-time');
      $this->job->setCompany('Sensio Labs');
      $this->job->setLogo('sensio-labs.gif');
      $this->job->setUrl('http://www.sensiolabs.com/');
      $this->job->setPosition('Web Developer');
      $this->job->setLocation('Paris, France');
      $this->job->setDescription("You've already developed websites with symfony and you want to work with Open-Source technologies. You have a minimum of 3 years experience in web development with PHP or Java and you wish to participate to development of Web 2.0 sites using the best frameworks available.");
      $this->job->setHowToApply('Send your resume to fabien.potencier [at] sensio.com');
      $this->job->setIsPublic(true);
      $this->job->setIsActivated(true);
      $this->job->setEmail('job@example.com');
    }
    
    public function testSetDateTimesOnPersist()
    {
      $this->em->persist($this->job);
      $this->em->flush();
      $this->assertEquals($this->job->getExpiresAt()->modify('-'.Jobs::ACTIVE_DAYS.' days')->format('Y-m-d H:i:s'), $this->job->getCreatedAt()->format('Y-m-d H:i:s'));
    }
    
    public function testSetUpdateDateTime()
    {
      $this->em->persist($this->job);
      $this->em->flush();
      $this->job->setIsActivated(false);
      $currDate = new \DateTime;
      $this->em->persist($this->job);
      $this->em->flush();
      $this->assertEquals($currDate, $this->job->getUpdatedAt());
    }
    
    public function tearDown()
    {
        $this->em->remove($this->job);
        $this->em->flush();
    }
}
