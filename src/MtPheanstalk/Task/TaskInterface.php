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

use MtPheanstalk\Workload\WorkloadInterface;

interface TaskInterface
{
    /**
     * @param WorkloadInterface $workload
     */
    public function setWorkload(WorkloadInterface $workload);

    /**
     * Execute task
     */
    public function run(\Pheanstalk_Job $job);
}