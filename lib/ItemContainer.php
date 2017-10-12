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

namespace L\Kits\DelayInit;

/**
 * This interface defines the interfaces for a items based delay initializer.
 *
 * @package litert/delay-initializer
 */
interface ItemContainer
{
    /**
     * Get a delay-initialized item by name.
     *
     * @param string $name  name of item
     *
     * @return mixed
     *
     * @throws Exception
     */
    public function getItem(string $name);

    /**
     * Register the initializer for the item of name.
     *
     * @param string $name           Name of item.
     * @param callable $initializer  Initializer of item.
     */
    public function setInitializer(
        string $name,
        callable $initializer
    );
}
