<?php

namespace Search\Sdk\Models;

use Exception;
use Search\Sdk\Client;

class Model
{
    CONST PREFIX = '';

    /*
     * Инстанс клиента
     */
    private Client $client;

    /*
     * Ответ
     */
    protected array $response;

    protected array $data;

    protected array $params;





    /**
     * Конструктор Model
     * @param Client $client
     * @param $response
     * @throws Exception
     */
    public function __construct(Client $client, $response = null)
    {
        $this->client = $client;
        $this->response = $response;
    }


    public function getClient(): Client
    {
        return $this->client;
    }

    /**
     * Отправка запроса
     * @param string $search
     */
    public function search(string $search): void
    {
        $apiMethod = "/search/".self::PREFIX;
        $this->params = array_merge($this->params,['search' => $search]);
        $this->response = $this->getClient()->makeRequest($apiMethod, $this->params);
        if (array_key_exists('data', $this->response)) {
            $this->data = $this->response['data'];
        }
        else {
            $this->data = array();
        }
    }
    /**
     * Получить значение по ключу
     * @param $name
     * @return string
     */
    protected function getValue($name): string
    {
        if (array_key_exists($name, $this->response)) {
            return $this->response[$name];
        } else {
            return '';
        }
    }

    protected function getSuccess(): string
    {
        return $this->getValue('success');
    }

    protected function getTotal():string
    {
        return $this->getValue('total');
    }

    public function setParam(string $param,$value): void
    {
        $this->params = array_merge($this->params,[$param => $value]);
    }
    public function setParams(array $params): void
    {
        $this->params = array_merge($this->params,$params);
    }



}