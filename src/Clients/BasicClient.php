<?php

namespace Search\Sdk\Clients;

use Firebase\JWT\JWT;
use Search\Sdk\Core\Curl;

abstract class BasicClient
{
    CONST EXP = 500;


    private string $masterKey;


    /**
     * Сделать запрос к API через интерфейс клиента
     * @param $apiMethod
     * @param array|null $params
     * @return array|mixed
     */
    abstract public function makeRequest($apiMethod, array $params=null): mixed;
}