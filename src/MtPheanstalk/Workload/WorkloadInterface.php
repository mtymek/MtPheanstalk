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

interface WorkloadInterface
{

    /**
     * @return string
     */
    public function getTaskName();

    /**
     * @param int $priority
     */
    public function setPriority($priority);

    /**
     * @return int
     */
    public function getPriority();

    /**
     * @param string $tubeName
     */
    public function setTubeName($tubeName);

    /**
     * @return string
     */
    public function getTubeName();
}