<?php

namespace Search\Sdk\collections;

use Search\Sdk\Clients\BasicClient;
use Search\Sdk\Clients\Client;
use Search\Sdk\core\Response;

class Collection extends Response
{
    public array $collection=[];

    protected string $prefix;

    protected array $params;

    protected string $titleField='title';

    public function __construct(BasicClient $client)
    {
        parent::__construct($client);
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
        return $this->basicSearch($search,$apiMethod,$params);
    }

    public function searchMaster(string $search,array $params = [])
    {
        $apiMethod = "/search/master/".$this->prefix;
        return $this->basicSearch($search,$apiMethod,$params);
    }

    public function basicSearch(string $search,string $apiMethod,array $params)
    {
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
            $string.= ($i+1).') '.$this->collection[$i][$this->titleField]."\n";
            $string.= 'Ссылка на книгу - [здесь будет ссылка]'."\n";
        }
        return $string;
    }

}