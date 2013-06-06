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

use MtPheanstalk\Task\TaskManager;
use Pheanstalk_Pheanstalk as Pheanstalk;
use Zend\ServiceManager\Config;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;


class TaskManagerFactory implements FactoryInterface
{

    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return Pheanstalk
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $appConfig = $serviceLocator->get('Configuration');
        $options = isset($appConfig['mt_pheanstalk']['task_manager']) ?
            $appConfig['mt_pheanstalk']['task_manager']
         : array();
        return new TaskManager(new Config($options));
    }
}