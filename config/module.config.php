<?php
/**
 * MtBeanstalkdModule
 *
 * @link      http://mateusztymek.pl
 * @link      https://github.com/mtymek
 * @author    Mateusz Tymek <mtymek@gmail.com>
 * @copyright Copyright (c) 2013 Mateusz Tymek
 */

return array(
    'service_manager' => array(
        'factories' => array(
            'MtPheanstalk\Pheanstalk' => 'MtPheanstalk\Service\MtPheanstalkFactory'
        )
    )
);