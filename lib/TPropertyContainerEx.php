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
 * This trait provides the extended methods for managing the delay
 * initialized properties.
 *
 * @package litert/delay-initializer
 */
trait TPropertyContainerEx
{
    use TPropertyContainer;

    /**
     * Remove an item of $name totally, and it can not be initialized
     * automatically again.
     *
     * @param string $name
     *
     * @return void
     */
     public function removeItem(string $name)
     {
         unset(
             $this->$name,
             $this->__delayCtors[$name]
         );
     }
 
     /**
      * Get a dependency item by name.
      *
      * @param string $name  name of dependency
      *
      * @return mixed
      *
      * @throws Exception
      */
     public function getItem(string $name)
     {
         return $this->$name;
     }
 
     /**
      * Release an item of $name.
      *
      * @param string $name
      *
      * @return void
      */
     public function releaseItem(string $name)
     {
         unset($this->$name);
     }
 
     /**
      * Check if an item exists, whatever initialized or not.
      *
      * @param string $name
      *
      * @return boolean
      */
     public function existsItem(string $name): bool
     {
         return isset($this->__delayCtors[$name]);
     } 
}
