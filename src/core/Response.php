<?php

namespace Search\Sdk\core;

use Exception;
use Search\Sdk\Clients\BasicClient;
use Search\Sdk\Clients\Client;

class Response
{

    /*
     * Инстанс клиента
     */
    protected Client $client;

    /*
     * Ответ
     */
    protected $response;

    /*
     * Данные ответа
     */



    /**
     * Конструктор Response
     * @param Client $client
     * @param $response
     * @throws Exception
     */
    public function __construct(BasicClient $client, $response = null)
    {
        if (!$client) {
            throw new Exception('client is not init');
        }

        $this->client = $client;
        $this->response = $response;
        return $this;
    }


    /**
     * Получить клиент
     * @return Client
     */
    public function getClient(): Client
    {
        return $this->client;
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
            return false;
        }
    }


    /**
     * Возвращает статус запроса
     * @return mixed
     */
    public function getSuccess()
    {
        return $this->response['success'];
    }

    /**
     * Возвращает текстовое сообщение ошибки
     * @return mixed
     */
    public function getMessage(): mixed
    {
        return $this->response['message'];
    }

    /**
     * Возвращает общее кол-во элементов ответа
     * @return mixed
     */
    public function getTotal()
    {
        return $this->response['total'];
    }

    /**
     * Возвращает статус ответа
     * @return mixed
     */
    public function getStatus()
    {
        return $this->response['status'];
    }

}