# 快速入门

Delay Initializer 提供容器的延迟初始化机制，它会在用到的时候才对变量进行初始化。例如数
据库链接的延时创建。

## 1. 使用基于属性的延迟装载器

```php
<?php
declare (strict_types = 1);

require 'vendor/autoload.php';

/**
 * @property mysqli $db
 */
class App implements \L\Kits\DelayInit\PropertyContainer
{
    use \L\Kits\DelayInit\TPropertyContainer;

    public function __construct()
    {
        $this->_initializeDelayInit();

        $this->setInitializer(
            'db',
            function() {
                return new mysqli(
                    '127.0.0.1',
                    'root',
                    'password'
                );
            }
        );
    }
}

$app = new App();

echo 'hello';

$result = $app->db->query('SELECT * FROM tests');

foreach ($result as $row) {

    echo $row['name'], PHP_EOL;
}

```

## 2. 使用基于子项的延迟装载器

```php
<?php
declare (strict_types = 1);

require 'vendor/autoload.php';

class App implements \L\Kits\DelayInit\ItemContainer
{
    use \L\Kits\DelayInit\ItemContainer;

    public function __construct()
    {
        $this->_initializeDelayInit();

        $this->setInitializer(
            'db',
            function() {
                return new mysqli(
                    '127.0.0.1',
                    'root',
                    'password'
                );
            }
        );
    }
}

$app = new App();

echo 'hello';

$result = $app->getItem('db')->query('SELECT * FROM tests');

foreach ($result as $row) {

    echo $row['name'], PHP_EOL;
}

```

## 3. 使用基于属性的依赖注入容器

```php
<?php
declare (strict_types = 1);

require 'vendor/autoload.php';

/**
 * @property mysqli $db
 */
class DI extends \L\Kits\DelayInit\PropertyDIContainer
{
    public function __construct()
    {
        parent::__construct();

        $this->setInitializer(
            'db',
            function() {
                return new mysqli(
                    '127.0.0.1',
                    'root',
                    'password'
                );
            }
        );
    }
}

$di = new DI();

$result = $di->db->query('SELECT * FROM tests');

foreach ($result as $row) {

    echo $row['name'], PHP_EOL;
}

```
