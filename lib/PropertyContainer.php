<?php
declare (strict_types = 1);

namespace L\Kits\DelayInit;

/**
 * @package L\Kits\DelayInit
 */
 interface PropertyContainer
 {
     public function __get(string $name);
 
     public function setInitializer(
         string $name,
         callable $intializer
     );
 }
 