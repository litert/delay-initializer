<?php
declare (strict_types = 1);

namespace L\Kits\DelayInit;

/**
 * @package L\Kits\DelayInit
 */
interface ItemContainer
{
    public function getItem(string $name);

    public function setInitializer(
        string $name,
        callable $intializer
    );
}
