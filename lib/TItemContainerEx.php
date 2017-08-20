<?php
declare (strict_types = 1);

namespace L\Kits\DelayInit;

/**
 * This trait provides the extended methods for managing the delay
 * initliazed items.
 *
 * @package L\Kits\DelayInit
 */
trait TItemContainerEx
{
    use TItemContainer;

    /**
     * Release an item of $name.
     * @param string $name
     * @return void
     */
    public function releaseItem(string $name)
    {
        unset($this->__delayItems[$name]);
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

    /**
     * Remove an item of $name totally, and it can not be initialized
     * automatically again.
     * @param string $name
     * @return void
     */
    public function removeItem(string $name)
    {
        unset(
            $this->__delayItems[$name],
            $this->__delayCtors[$name]
        );
    }
}
