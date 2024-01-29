 ## HRedis

[![HLEB2](https://img.shields.io/badge/HLEB-2-darkcyan)](https://github.com/phphleb/hleb) ![PHP](https://img.shields.io/badge/PHP-^8.2-blue) [![License: MIT](https://img.shields.io/badge/License-MIT%20(Free)-brightgreen.svg)](https://github.com/phphleb/hleb/blob/master/LICENSE)


```php
// Wrapper for predis/predis library with HLEB2 framework configuration included.

// Обёртка для библиотеки predis/predis с подключением конфигурации фреймворка HLEB2.

use \Phphleb\Hredis\HRedis;
$client = (new HRedis())->client();
$client->append($key, $value);

```

You can add the HRedis object as a service to the framework container.