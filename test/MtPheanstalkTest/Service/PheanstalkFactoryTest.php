<?php
/**
 * MtPheanstalk
 *
 * @link      http://mateusztymek.pl
 * @link      https://github.com/mtymek
 * @author    Mateusz Tymek <mtymek@gmail.com>
 * @copyright Copyright (c) 2013 Mateusz Tymek
 */

namespace MtPheanstalkTest\Service;

use MtPheanstalk\Service\PheanstalkFactory;
use PHPUnit_Framework_TestCase;
use MtPheanstalkTest\Bootstrap;

class PheanstalkFactoryTest extends PHPUnit_Framework_TestCase
{

    public function testCreateServiceReturnsPheanstalkInstance()
    {
        $service = new PheanstalkFactory();
        $instance = $service->createService(Bootstrap::getServiceManager());
        $this->assertInstanceOf('Pheanstalk_Pheanstalk', $instance);
    }

    public function testServiceManagerIsInjectedWithFactory()
    {
        $this->assertInstanceOf('Pheanstalk_Pheanstalk', Bootstrap::getServiceManager()->get('MtPheanstalk\Pheanstalk'));
    }

}