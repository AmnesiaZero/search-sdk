<?php

namespace Search\Sdk\collections;

use Search\Sdk\Clients\BasicClient;
use Search\Sdk\Clients\Client;
use Search\Sdk\core\Response;

class Collection extends Response
{
    public array $collection=[];

    protected const PREFIX = '';

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
        $apiMethod = "/search/".self::PREFIX;
        return $this->basicSearch($search,$apiMethod,$params);
    }

    /**
     * Мастер-поиск
     * @param string $search
     * @param array $params
     * @return array|false|mixed
     */
    public function searchMaster(string $search,array $params = []):mixed
    {
        $apiMethod = "/search/master/".self::PREFIX;
        return $this->basicSearch($search,$apiMethod,$params);
    }

    public function basicSearch(string $search,string $apiMethod,array $params)
    {
        $this->response = $this->getClient()->makeRequest($apiMethod, array_merge(['search' => $search],$params));
        if (array_key_exists(self::PREFIX, $this->response) and is_array($this->response[self::PREFIX])) {
            $this->collection = $this->response[self::PREFIX];
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

    /**
     * Получить имена элементов коллекции
     * @param array $collection
     * @param int $pageId
     * @param int $perPage
     * @return string
     */
    public function getNames(array $collection, int $pageId,int $perPage=9): string
    {
        $startIndex = ($pageId - 1) * $perPage;
        $showContent = array_slice($collection, $startIndex, $perPage);
        $string = '';
        $pageNumber = ($pageId - 1) * $perPage + 1; // Начальный номер для текущей страницы

        for ($i = 0; $i < count($showContent); $i++) {
            $string .= $pageNumber + $i . ') ' . $showContent[$i][$this->titleField] . "\n";
            $string .= 'Ссылка - [здесь будет ссылка]' . "\n";
        }

        return $string;
    }


}