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

use MtPheanstalk\Worker;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;


class WorkerFactory implements FactoryInterface
{

    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return Pheanstalk
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $worker = new Worker(
            $serviceLocator->get('MtPheanstalk\Task\TaskManager'),
            $serviceLocator->get('MtPheanstalk\Pheanstalk')
        );
        return $worker;
    }
}