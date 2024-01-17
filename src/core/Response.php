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
    protected BasicClient $client;

    /*
     * Ответ
     */
    protected mixed $response;

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
     * @return BasicClient
     */
    public function getClient(): BasicClient
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
    public function getSuccess(): mixed
    {
        return $this->getValue('success');
    }

    /**
     * Возвращает текстовое сообщение ошибки
     * @return mixed
     */
    public function getMessage(): mixed
    {
        return $this->getValue('message');
    }

    /**
     * Возвращает общее кол-во элементов ответа
     * @return mixed
     */
    public function getTotal()
    {
        return $this->getValue('total');
    }


}