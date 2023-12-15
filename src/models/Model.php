<?php

namespace Search\Sdk\Models;

use Exception;
use Search\Sdk\Client;

class Model
{
    protected string $prefix;

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
     * @param array $response
     * @throws Exception
     */
    public function __construct(Client $client, array $response = [])
    {
        $this->client = $client;
        $this->response = $response;
        $this->params = [];
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
        $apiMethod = "/search/".$this->prefix;
        $this->params = array_merge($this->params,['search' => $search]);
        $this->response = $this->getClient()->makeRequest($apiMethod, $this->params);
        if (array_key_exists('data', $this->response) and $this->response['data']!=null) {
            $this->data = $this->response['data'];
        }
        else {
            $this->data = array();
        }
    }
    /**
     * Получить значение по ключу
     * @param $name
     * @return string|bool
     */
    protected function getValue($name):string|bool
    {
        if (array_key_exists($name, $this->response)) {
            return $this->response[$name];
        } else {
            return false;
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