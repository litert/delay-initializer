<?php
declare (strict_types = 1);

namespace L\Kits\DelayInit;

use \L\Core\Exception;

/**
 * This trait provides the basic methods for managing the delay
 * initliazed items.
 *
 * @package L\Kits\DelayInit
 */
trait TItemContainer
{
    /**
     * @var callable[]
     */
    protected $__delayCtors;

    protected $__delayItems;

    /**
     * Initialize the delay initializer.
     */
    protected function _initializeDelayInit()
    {
        $this->__delayCtors = [];
        $this->__delayItems = [];
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
                "Item {$name} not found."
            );
        }

        return $this->__delayItems[$name] = $this->__delayCtors[$name]($this);
    }

    /**
     * Register the initializer for the item of name.
     *
     * @param string $name           Name of item.
     * @param callable $initializer  Initializer of item.
     */
    public function setInitializer(string $name, callable $initializer)
    {
        $this->__delayCtors[$name] = $initializer;
    }
}
