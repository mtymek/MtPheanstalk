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

abstract class AbstractTask implements TaskInterface
{

    /**
     * @var WorkloadInterface
     */
    protected $workload;

    /**
     * @param WorkloadInterface $workload
     * @return self
     */
    public function setWorkload(WorkloadInterface $workload)
    {
        $this->workload = $workload;
        return $this;
    }
}