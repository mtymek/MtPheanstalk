<?php
/**
 * MtPheanstalk
 *
 * @link      http://mateusztymek.pl
 * @link      https://github.com/mtymek
 * @author    Mateusz Tymek <mtymek@gmail.com>
 * @copyright Copyright (c) 2013 Mateusz Tymek
 */

namespace MtPheanstalk\Service;

use Pheanstalk_Pheanstalk as Pheanstalk;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;


class PheanstalkFactory implements FactoryInterface
{
    protected $defaultConfig = array(
        'host' => '127.0.0.1',
        'port' => Pheanstalk::DEFAULT_PORT,
        'connect_timeout' => null,

    );

    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return Pheanstalk
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $appConfig = $serviceLocator->get('Configuration');
        $options = isset($appConfig['mt_pheanstalk']) ? array_merge(
            $this->defaultConfig,
            $appConfig['mt_pheanstalk']
        ) : $this->defaultConfig;
        return new Pheanstalk($options['host'], $options['port'], $options['connect_timeout']);
    }
}