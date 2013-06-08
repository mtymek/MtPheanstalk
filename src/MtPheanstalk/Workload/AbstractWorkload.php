<?php
/**
 * MtPheanstalk
 *
 * @link      http://mateusztymek.pl
 * @link      https://github.com/mtymek
 * @author    Mateusz Tymek <mtymek@gmail.com>
 * @copyright Copyright (c) 2013 Mateusz Tymek
 */

namespace MtPheanstalk\Workload;

abstract class AbstractWorkload implements WorkloadInterface
{

    protected $priority;

    protected $tubeName;

    /**
     * @param int $priority
     * @return int|void
     */
    public function setPriority($priority)
    {
        $this->priority = $priority;
    }

    /**
     * @param string $tubeName
     */
    public function setTubeName($tubeName)
    {
        $this->tubeName = $tubeName;
    }

    /**
     * @return int
     */
    public function getPriority()
    {
        return $this->priority;
    }

    /**
     * @return string
     */
    public function getTubeName()
    {
        return $this->tubeName;
    }
}