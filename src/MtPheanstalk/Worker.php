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

use MtPheanstalk\Exception\RuntimeException;
use MtPheanstalk\Task\TaskManager;
use MtPheanstalk\Workload\WorkloadInterface;
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

    /**
     * Constructor
     *
     * @param TaskManager $taskManager
     * @param Pheanstalk_Pheanstalk $pheanstalk
     */
    public function __construct(TaskManager $taskManager, Pheanstalk_Pheanstalk $pheanstalk)
    {
        $this->pheanstalk = $pheanstalk;
        $this->taskManager = $taskManager;
    }

    /**
     * Watch specyfic tube and execute job when it becomes available.
     *
     * @param string $tubeName
     * @throws Exception\RuntimeException
     */
    public function work($tubeName = 'default')
    {
        $job = $this->pheanstalk
            ->watch($tubeName)
            ->ignore('default')
            ->reserve();

        $workload = unserialize($job->getData());

        if (!$workload instanceof WorkloadInterface) {
            if (is_object($workload)) {
                $type = get_class($workload);
            } else {
                $type = gettype($workload);
            }
            throw new RuntimeException("Unable to process workload - received '$type', expected class implementing WorkloadInterface.");
        }

        $task = $this->taskManager->get($workload->getTaskName());
        $task->setWorkload($workload);
        $task->run($job);
        $this->pheanstalk->delete($job);
    }
}