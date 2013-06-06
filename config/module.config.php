<?php
/**
 * MtPheanstalk
 *
 * @link      http://mateusztymek.pl
 * @link      https://github.com/mtymek
 * @author    Mateusz Tymek <mtymek@gmail.com>
 * @copyright Copyright (c) 2013 Mateusz Tymek
 */

return array(
    'service_manager' => array(
        'factories' => array(
            'MtPheanstalk\Worker' => 'MtPheanstalk\Service\WorkerFactory',
            'MtPheanstalk\Pheanstalk' => 'MtPheanstalk\Service\PheanstalkFactory',
            'MtPheanstalk\Task\TaskManager' => 'MtPheanstalk\Service\TaskManagerFactory',
        )
    )
);