MtPheanstalk module
===================

Object-oriented wrapper around Beanstalkd PHP SDK.

Installation
------------

`MtPheanstalk` supports installation via [Composer](http://getcomposer.org)

1. Add `mtymek/mt-pheanstalk` to your `composer.json` file:

    ```json
    {
        "require": {
            "mtymek/mt-pheanstalk": "dev-master"
        }
    }
    ```

2. Run `composer.phar update` to download this module and Cleeng PHP SDK.

3. Enable MtPheanstalk in your `application.config.php` file:

    ```php
    return array(
        'modules' => array(
            'Application',
            'MtPheanstalk',
            // other modules...
        ),
        'module_listener_options' => array(
            'config_glob_paths'    => array(
                'config/autoload/{,*.}{global,local}.php',
            ),
            'module_paths' => array(
                './module',
                './vendor',
            ),
        ),
    );
    ```

Theory of operation
-------------------

`MtPheanstalk` defines two concepts:

* **Worker** script running in background (possibly on different machine), executing tasks from queue
* **Workload** is a value object used to transfer data between application and worker
* **Task** represents action that needs to be executed by worker