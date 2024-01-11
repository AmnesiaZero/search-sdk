<?php

namespace Search\Sdk\Clients;

use Exception;
use Firebase\JWT\JWT;
use Search\Sdk\Core\Curl;

class MasterClient extends BasicClient
{
    CONST EXP = 500;


    private string $masterKey;


    /**
     * Конструктор Master Client
     * @param string $masterKey
     */
    public function __construct(string $masterKey)
    {
        $this->masterKey = $masterKey;
    }

    /**
     * Сделать запрос к API через интерфейс клиента
     * @param $apiMethod
     * @param array|null $params
     * @return array|mixed
     */
    public function makeRequest($apiMethod, array $params=null):mixed
    {
        $payload = [
            "master_key" => $this->masterKey,
            'exp' => time() + self::EXP,
        ];
        $token = JWT::encode($payload, $this->masterKey, 'HS256');
        $params = array_merge($params);
        $result = Curl::exec($apiMethod, $token, $params);
        return $result;
    }
}