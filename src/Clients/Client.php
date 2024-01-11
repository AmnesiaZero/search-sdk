<?php

namespace Search\Sdk\Clients;
use Exception;
use Firebase\JWT\JWT;
use Search\Sdk\core\Curl;

class Client extends BasicClient
{
    CONST EXP = 500000000000000;
    /*
     * id организации
     */
    private int $organisationId;

    /*
     * Секретный ключ
     */
    private string $secretKey;


    /**
     * Конструктор Client
     * @param $organisationId
     * @param $secretKey
     * @throws Exception
     */
    public function __construct($organisationId, $secretKey)
    {
        if (!is_numeric($organisationId)) {
            throw new Exception('id must be numeric');
        }
        $this->organisationId = $organisationId;
        $this->secretKey = $secretKey;
    }

    /**
     * Сделать запрос к API через интерфейс клиента
     * @param $apiMethod
     * @param array|null $params
     * @return array|mixed
     */
    public function makeRequest($apiMethod, array $params=null): mixed
    {
        $payload = [
            "organization_id" => $this->organisationId,
            'exp' => time() + self::EXP,
        ];
        $token = JWT::encode($payload, $this->secretKey, 'HS256');
        $params = array_merge(["organisation_id" => $this->organisationId], $params);
        $result = Curl::exec($apiMethod, $token, $params);
        return $result;
    }
}
