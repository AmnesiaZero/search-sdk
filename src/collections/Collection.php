<?php

namespace Search\Sdk\collections;

use Search\Sdk\Client;
use Search\Sdk\core\Response;

class Collection extends Response
{
    public array $collection=[];

    protected string $prefix;

    protected array $params;

    protected string $titleField='title';

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
    public function search(string $search,array $params): mixed
    {
        $apiMethod = "/search/".$this->prefix;
        $this->response = $this->getClient()->makeRequest($apiMethod, array_merge(['search' => $search],$params));
        if (array_key_exists($this->prefix, $this->response) and is_array($this->response[$this->prefix])) {
            $this->collection = $this->response[$this->prefix];
        }
        else {
            return false;
        }
        return $this->collection;
    }

    public function get():array
    {
        return $this->collection;
    }

    public function getNames(): string
    {
        $string = '';
        for($i=0;$i<count($this->collection);$i++)
        {
            $string.= ($i+1).$this->collection[$i][$this->titleField].'\n';
        }
        return $string;
    }

}