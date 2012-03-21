<?php

namespace Acme\JobsBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface,
    Doctrine\Common\Persistence\ObjectManager,
    Acme\JobsBundle\Entity\Jobs,
    Acme\JobsBundle\Entity\Categories;

class JobFixtures implements FixtureInterface
{
    public function load(ObjectManager $em)
    {
        $design = new Categories();
        $design->setName('Design');
	$design->setSlug('design');

        $programming = new Categories();
        $programming->setName('Programming');
	$programming->setSlug('programming');
	

        $manager = new Categories();
        $manager->setName('Manager');
	$manager->setSlug('manager');

        $administrator = new Categories();
        $administrator->setName('Administrator');
        $administrator->setSlug('administrator');

        $em->persist($design);
        $em->persist($programming);
        $em->persist($manager);
        $em->persist($administrator);

        $sensio = new Jobs();
        $sensio->setCategory($programming);
        $sensio->setJobType('full-time');
        $sensio->setCompany('Sensio Labs');
        $sensio->setLogo('sensio-labs.gif');
        $sensio->setUrl('http://www.sensiolabs.com/');
        $sensio->setPosition('Web Developer');
        $sensio->setLocation('Paris, France');
        $sensio->setDescription("You've already developed websites with symfony and you want to work with Open-Source technologies. You have a minimum of 3 years experience in web development with PHP or Java and you wish to participate to development of Web 2.0 sites using the best frameworks available.");
        $sensio->setHowToApply('Send your resume to fabien.potencier [at] sensio.com');
        $sensio->setIsPublic(true);
        $sensio->setIsActivated(true);
        $sensio->setEmail('job@example.com');
        $sensio->setCreatedAt(new \DateTime('2012-09-10'));
        $sensio->setExpiresAt(new \DateTime('2012-10-10'));

        $extreme = new Jobs();
        $extreme->setCategory($design);
        $extreme->setJobType('part-time');
        $extreme->setCompany('Extreme Sensio');
        $extreme->setLogo('extreme-sensio.gif');
        $extreme->setUrl('http://www.extreme-sensio.com/');
        $extreme->setPosition('Web Designer');
        $extreme->setLocation('Paris, France');
        $extreme->setDescription("Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in.

        Voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.");
        $extreme->setHowToApply('Send your resume to fabien.potencier [at] sensio.com');
        $extreme->setIsPublic(true);
        $extreme->setIsActivated(true);
        $extreme->setEmail('job@example.com');
        $extreme->setCreatedAt(new \DateTime('2011-09-10'));
        $extreme->setExpiresAt(new \DateTime('2011-10-10'));

        $em->persist($sensio);
        $em->persist($extreme);

        $em->flush();
    }
}

