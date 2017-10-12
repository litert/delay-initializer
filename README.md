# LiteRT/DelayInitializer

[![Latest Stable Version](https://poser.pugx.org/litert/delay-initializer/v/stable?format=flat-square)](https://packagist.org/packages/litert/delay-initializer) [![License](https://poser.pugx.org/litert/delay-initializer/license?format=flat-square)](https://packagist.org/packages/litert/delay-initializer)

A simple delay-initializer and dependency injection library for PHP.

## Installation

It's recommended to install by composer:

```sh
composer require litert/delay-initializer
```

Or just git clone this repository, and put the **lib** directory into you 
project.

## Samples

### Using the delay initializer.

```php
<?php
declare (strict_types = 1);

require 'vendor/autoload.php';

/**
 * @property string $hello
 */
class Tester implements \L\Kits\DelayInit\PropertyContainerEx
{
    use \L\Kits\DelayInit\TPropertyContainerEx;

    public function __construct()
    {
        $this->_initializeDelayInit();

        $this->setInitializer(
            'hello',
            function() {
                echo 'Initialized "hello" here.', PHP_EOL;
                return 'world';
            }
        );
    }
}

$tester = new Tester();

echo 'Now try reading the property "hello" of $tester.', PHP_EOL;

echo $tester->hello, PHP_EOL;

```

### Using the dependency injection container

```php
<?php
declare (strict_types = 1);

require 'vendor/autoload.php';

/**
 * @property string $name
 * @property int $age
 */
class MyDI extends \L\Kits\DelayInit\PropertyDIContainer
{
}

$di = new MyDI();

$di->setInitializer(
    'name',
    function () {
        return 'Mike';
    }
);

$di->setInitializer(
    'age',
    function() {
        return 17;
    }
);

echo "Hi, I'm {$di->name}. I'm {$di->age}.", PHP_EOL;

```

[Would you like to know more?](./docs/zh-CN/index.md)

## Document

 - English (Preparing yet)
 - [简体中文版](./docs/zh-CN/index.md)

## License

This library is published under [Apache-2.0](./LICENSE) license.
