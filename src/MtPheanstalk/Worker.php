<?php
/**
 * MtPheanstalk
 *
 * @link      http://mateusztymek.pl
 * @link      https://github.com/mtymek
 * @author    Mateusz Tymek <mtymek@gmail.com>
 * @copyright Copyright (c) 2013 Mateusz Tymek
 */

namespace MtPheanstalk;

use MtPheanstalk\Task\TaskManager;
use Pheanstalk_Pheanstalk;

class Worker
{
    /**
     * @var Pheanstalk_Pheanstalk
     */
    protected $pheanstalk;

    /**
     * @var TaskManager
     */
    protected $taskManager;

    public function __construct(TaskManager $taskManager, Pheanstalk_Pheanstalk $pheanstalk)
    {
        $this->pheanstalk = $pheanstalk;
        $this->taskManager = $taskManager;
    }

    public function work($tubeName)
    {
        $job = $this->pheanstalk
            ->watch($tubeName)
            ->ignore('default')
            ->reserve();

        $workload = unserialize($job->getData());

        $task = $this->taskManager->get($workload->getTaskName());
        $task->setWorkload($workload);
        $task->run($job);
        $this->pheanstalk->delete($job);
    }
}