<?php

// Wrapper for predis/predis library with HLEB framework configuration included.

// Обёртка для библиотеки predis/predis с подключением конфигурации фреймворка HLEB.

namespace Phphleb\Hredis;

use Hleb\Static\Settings;
use Predis\Client;

class HRedis
{
    private ?Client $client = null;

    public function __construct(array $parameters = [], array $options = [])
    {
        if (!$parameters && !$options) {
            $type = Settings::getParam('database', 'redis.db.type');
            $list = Settings::getParam('database', 'db.settings.list');
            $parameters = $list[$type];
            $options = $parameters['options'] ?? [];

            unset($parameters['options']);
        }
        
        if (!class_exists('Predis\Client')){
            throw new \ErrorException('The predis/predis library required for operation was not found.');
        }

        $this->client =  new Client($parameters, $options);
    }

    public function client(): ?Client
    {
        return $this->client;
    }
}

