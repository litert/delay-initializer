<?php
declare (strict_types = 1);

namespace L\Kits\DelayInit;

use \L\Core\Exception;

/**
 * This trait provides the extended methods for managing the delay
 * initliazed properties.
 *
 * @package L\Kits\DelayInit
 */
trait TPropertyContainerEx
{
    use TPropertyContainer;

    /**
     * Remove an item of $name totally, and it can not be initialized
     * automatically again.
     * @param string $name
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
      * @return mixed
      * @throws Exception
      */
     public function getItem(string $name)
     {
         return $this->$name;
     }
 
     /**
      * Release an item of $name.
      * @param string $name
      * @return void
      */
     public function releaseItem(string $name)
     {
         unset($this->$name);
     }
 
     /**
      * Check if an item exists, whether initialized or not.
      * @param string $name
      * @return boolean
      */
     public function existsItem(string $name): bool
     {
         return isset($this->__delayCtors[$name]);
     } 
}
