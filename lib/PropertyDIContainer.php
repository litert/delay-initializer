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

declare (strict_types=1);

namespace L\Kits\DelayInit;

/**
 * A dependency injection container base on property delay initializer.
 *
 * @package litert/delay-initialzer
 */
abstract class PropertyDIContainer implements PropertyContainerEx
{
    use TPropertyContainerEx;

    public function __construct()
    {
        $this->_initializeDelayInit();
    }
}
