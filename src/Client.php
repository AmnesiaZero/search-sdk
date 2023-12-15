<?php

namespace Search\Sdk;
use Exception;
use Firebase\JWT\JWT;
use http\Env\Url;
use Search\Sdk\core\Curl;
use Search\Sdk\Logs\Log;

class Client
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


    public function makeRequest($apiMethod, array $params=null)
    {
        $payload = [
            "organization_id" => $this->organisationId,
            'exp' => time() + self::EXP,
        ];
        $token = JWT::encode($payload, $this->secretKey, 'HS256');
        $params = array_merge(["organisation_id" => $this->organisationId], $params);
        $result = Curl::exec($apiMethod, $token, $params);
        if (array_key_exists('message',$result)){
            Log::debug($result['message']);
        }
        return $result;
    }
}
