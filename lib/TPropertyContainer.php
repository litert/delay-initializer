<?php
declare (strict_types = 1);

namespace L\Kits\DelayInit;

use \L\Core\Exception;

/**
 * This trait provides the basic methods for managing the delay
 * initliazed properties.
 *
 * @package L\Kits\DelayInit
 */
trait TPropertyContainer
{
    /**
     * @var callable[]
     */
    protected $__delayCtors;

    /**
     * Initialize the delay initializer.
     */
    protected function _initializeDelayInit()
    {
        $this->__delayCtors = [];
    }

    /**
     * Get a delay-initialized property by name.
     *
     * @param string $name  name of property
     * @return mixed
     * @throws Exception
     */
    public function __get(string $name)
    {
        if (!is_callable($this->__delayCtors[$name] ?? false)) {

            throw new Exception(
                "Property {$name} not found."
            );
        }

        return $this->$name = $this->__delayCtors[$name]($this);
    }

    /**
     * Register the initializer for the property of name.
     *
     * @param string $name           Name of property.
     * @param callable $initializer  Initializer of property.
     */
    public function setInitializer(
        string $name,
        callable $initializer
    )
    {
        $this->__delayCtors[$name] = $initializer;
    }
}
