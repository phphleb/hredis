<?php

// Wrapper for predis/predis library with HLEB framework configuration included.

// Обёртка для библиотеки predis/predis с подключением конфигурации фреймворка HLEB.

namespace Phphleb\Hredis;

use Hleb\Main\Insert\BaseSingleton;

use Predis\Client;

class HRedis
{
    private ?Client $client = null;

    public function __construct(array $parameters = [], array $options = [])
    {
        if (!$parameters && !$options) {
            if (!defined('HLEB_PARAMETERS_FOR_DB')) {
                $configDir = defined('HLEB_SEARCH_DBASE_CONFIG_FILE') ?
                    HLEB_SEARCH_DBASE_CONFIG_FILE :
                    HLEB_GLOBAL_DIRECTORY . '/database';

                $path = $configDir . '/dbase.config.php';
                if (!file_exists($path)) {
                    $path = $configDir . '/default.dbase.config.php';
                }
                require $path;
            }
            $config = HLEB_PARAMETERS_FOR_DB[defined('HLEB_TYPE_REDIS') ? HLEB_TYPE_REDIS : HLEB_TYPE_DB];

            $parameters = $config;

            $options = $config['options'] ?? [];

            unset($config['options']);
        }

        $this->client =  new Client($parameters, $options);
    }

    public function client(): ?Client
    {
        return $this->client;
    }
}

