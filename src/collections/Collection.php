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

    /**
     * Мастер-поиск
     * @param string $search
     * @param array $params
     * @return array|false|mixed
     */
    public function searchMaster(string $search,array $params = []):mixed
    {
        $apiMethod = "/search/master/".$this->prefix;
        return $this->basicSearch($search,$apiMethod,$params);
    }

    public function basicSearch(string $search,string $apiMethod,array $params): bool|array
    {
        $this->response = $this->getClient()->makeRequest($apiMethod, array_merge(['search' => $search],$params));
        if (array_key_exists('data', $this->response) and is_array($this->response['data'])) {
            $this->collection = $this->response['data'];
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
    public function getNames(array $collection, int $pageId,int $perPage=10): string
    {
        $startIndex = ($pageId - 1) * $perPage;
        $showContent = array_slice($collection, $startIndex, $perPage);
        $string = '';
        $pageNumber = ($pageId - 1) * $perPage + 1; // Начальный номер для текущей страницы
        for ($i = 0; $i < count($showContent); $i++) {
            $string .= $pageNumber + $i . ') ' . $showContent[$i][$this->titleField] . "\n";
        }
        return $string;
    }

    public function getLink(int $bookId): string
    {
        return 'https://www.iprbookshop.ru/'.$bookId.'.html';
    }


}