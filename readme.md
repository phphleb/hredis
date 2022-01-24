 ## HRedis
```php
// Wrapper for predis/predis library
//  with HLEB framework configuration included.

// Обёртка для библиотеки predis/predis
//  с подключением конфигурации фреймворка HLEB.

use \Phphleb\Hredis\HRedis;
$client = (new HRedis())->client();
$client->append($key, $value);

```