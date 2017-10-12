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
 * initialized properties.
 *
 * @package litert/delay-initializer
 */
trait TPropertyContainer
{
    /**
     * @var callable[]
     */
    protected $__delayCtors;

    protected $__delayCtorArgs;

    /**
     * Initialize the delay initializer.
     */
    protected function _initializeDelayInit()
    {
        $this->__delayCtors = [];
        $this->__delayCtorArgs = [$this];
    }

    protected function _setInitializerArgs(array $args)
    {
        $this->__delayCtorArgs = $args;
    }

    /**
     * Get a delay-initialized property by name.
     *
     * @param string $name  name of property
     *
     * @return mixed
     *
     * @throws Exception
     */
    public function __get(string $name)
    {
        if (!is_callable($this->__delayCtors[$name] ?? false)) {

            throw new Exception(
                "Property {$name} not found.",
                \L\Error\DelayInit\ITEM_NOT_FOUND
            );
        }

        return $this->$name = $this->__delayCtors[$name](
            ...$this->__delayCtorArgs
        );
    }

    /**
     * Register the initializer for the property of name.
     *
     * @param string $name           Name of property.
     * @param callable $initializer  Initializer of property.
     *
     * @return void
     */
    public function setInitializer(
        string $name,
        callable $initializer
    )
    {
        $this->__delayCtors[$name] = $initializer;
    }
}
