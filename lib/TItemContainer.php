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

use \L\Core\Exception;

/**
 * This trait provides the basic methods for managing the delay
 * initialized items.
 *
 * @package litert/delay-initializer
 */
trait TItemContainer
{
    /**
     * @var callable[]
     */
    protected $__delayCtors;

    protected $__delayItems;

    protected $__delayCtorArgs;

    /**
     * Initialize the delay initializer.
     */
    protected function _initializeDelayInit()
    {
        $this->__delayCtors = [];
        $this->__delayItems = [];
        $this->__delayCtorArgs = [$this];
    }

    protected function _setInitializerArgs(array $args)
    {
        $this->__delayCtorArgs = $args;
    }

    /**
     * Get a delay-initialized item by name.
     *
     * @param string $name  name of item
     * @return mixed
     * @throws Exception
     */
    public function getItem(string $name)
    {
        if (isset($this->__delayItems[$name])) {

            return $this->__delayItems[$name];
        }

        if (!is_callable($this->__delayCtors[$name] ?? false)) {

            throw new Exception(
                "Item {$name} not found.",
                \L\Error\DelayInit\ITEM_NOT_FOUND
            );
        }

        return $this->__delayItems[$name] = $this->__delayCtors[$name](
            ...$this->__delayCtorArgs
        );
    }

    /**
     * Register the initializer for the item of name.
     *
     * @param string $name           Name of item.
     * @param callable $initializer  Initializer of item.
     */
    public function setInitializer(
        string $name,
        callable $initializer
    )
    {
        $this->__delayCtors[$name] = $initializer;
    }
}
