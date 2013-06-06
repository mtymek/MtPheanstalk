<?php
/**
 * MtPheanstalk
 *
 * @link      http://mateusztymek.pl
 * @link      https://github.com/mtymek
 * @author    Mateusz Tymek <mtymek@gmail.com>
 * @copyright Copyright (c) 2013 Mateusz Tymek
 */

namespace MtPheanstalk\Task;

use MtPheanstalk\Exception\RuntimeException;
use Zend\ServiceManager\AbstractPluginManager;
use Zend\ServiceManager\Exception;
use Zend\ServiceManager\ServiceManager;

class TaskManager extends AbstractPluginManager
{

    /**
     * Validate the task - it must implement TaskInterface
     *
     * @param  mixed $plugin
     * @return void
     * @throws RuntimeException if invalid
     */
    public function validatePlugin($plugin)
    {
        if ($plugin instanceof TaskInterface) {
            // we're okay
            return;
        }

        throw new RuntimeException(sprintf(
            'Plugin of type %s is invalid; must implement %s\TaskInterface',
            (is_object($plugin) ? get_class($plugin) : gettype($plugin)),
            __NAMESPACE__
        ));
    }
}