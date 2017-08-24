<?php

declare (strict_types = 1);

namespace Test\DelayInitializer;

require __DIR__ . '/../vendor/autoload.php';

/**
 * Class DI
 * @package Test\DelayInitializer
 *
 * @property int test
 */
class DI
{
    use \L\Kits\DelayInit\TPropertyContainer;

    public function __construct()
    {
        $this->_initializeDelayInit();

        $this->setInitializer('test', function(int $v) {

            return $v * 123;
        });

        $this->_setInitializerArgs([133]);
    }
}

$di = new DI();

echo $di->test;
