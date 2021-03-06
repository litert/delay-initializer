#!env php
<?php
/*
   +----------------------------------------------------------------------+
   | LiteRT Delay Initializer Library                                     |
   +----------------------------------------------------------------------+
   | Copyright (c) 2007-2017 Fenying Studio                               |
   +----------------------------------------------------------------------+
   | This source file is subject to version 2.0 of the Apache license,    |
   | that is bundled with this package in the file LICENSE, and is        |
   | available through the world-wide-web at the following url:           |
   | https://github.com/litert/delay-initializer/blob/master/LICENSE      |
   +----------------------------------------------------------------------+
   | Authors: Angus Fenying <i.am.x.fenying@gmail.com>                    |
   +----------------------------------------------------------------------+
 */

declare (strict_types = 1);

namespace Test\DelayInitializer;

require __DIR__ . '/../vendor/autoload.php';

/**
 * Class DI
 *
 * @property int test
 */
class DI implements \L\Kits\DelayInit\PropertyContainer
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

echo $di->test, PHP_EOL;

try {

    echo $di->gggg;
}
catch (\L\Core\Exception $e) {

    echo <<<ERROR
Error({$e->getCode()}): {$e->getMessage()}
ERROR;

}