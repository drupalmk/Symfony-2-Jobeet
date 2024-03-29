<?php

namespace Acme\JobsBundle\Tests;

require_once(__DIR__ . "/../../../../app/AppKernel.php");

class BaseTestCase extends \PHPUnit_Framework_TestCase
{
  protected $_container;

  public function __construct()
  {
    $kernel = new \AppKernel("test", true);
    $kernel->boot();
    $this->_container = $kernel->getContainer();
    parent::__construct();
  }

  protected function get($service)
  {
    return $this->_container->get($service);
  }
}

