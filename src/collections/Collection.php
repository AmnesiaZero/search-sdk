<?php

namespace Search\Sdk\collections;

use Search\Sdk\Client;
use Search\Sdk\core\Response;

abstract class Collection extends Response
{
    public array $collection;

    const PREFIX = '';

    public function __construct(Client $client)
    {
        parent::__construct($client);
    }

    /**
     * @return Client
     */
    public function getClient(): Client
    {
        return $this->client;
    }

    /**
     * Отправка запроса
     * @param string $search
     * @param array $params
     * @return array|mixed
     */
    public function search(string $search,array $params)
    {
        $apiMethod = "/search/".self::PREFIX;
        $this->response = $this->getClient()->makeRequest($apiMethod, array());
        if (array_key_exists('message', $this->response)) {
            $this->collection = $this->response['result'];
        }
        else {
            $this->data = array();
        }
        return $this->collection;
    }

}