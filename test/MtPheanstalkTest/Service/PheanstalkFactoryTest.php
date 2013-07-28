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
use Pheanstalk_Exception_ConnectionException;
use PHPUnit_Framework_TestCase;
use MtPheanstalkTest\Bootstrap;

class PheanstalkFactoryTest extends PHPUnit_Framework_TestCase
{

    public function testCreateServiceReturnsPheanstalkInstance()
    {
        $service = new PheanstalkFactory();
        try {
            $instance = $service->createService(Bootstrap::getServiceManager());
        } catch (Pheanstalk_Exception_ConnectionException $e) {
            // ignore connection error for the test
        }
        $this->assertInstanceOf('Pheanstalk_Pheanstalk', $instance);
    }

    public function testServiceManagerIsInjectedWithFactory()
    {
        $this->assertInstanceOf('Pheanstalk_Pheanstalk', Bootstrap::getServiceManager()->get('MtPheanstalk\Pheanstalk'));
    }

}