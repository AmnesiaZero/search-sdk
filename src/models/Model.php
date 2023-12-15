<?php

namespace Search\Sdk\Models;

use Exception;
use Search\Sdk\Client;

class Model
{
    public array $content;

    /**
     * Конструктор Model
     * @param array $content
     */
    public function __construct(array $content)
    {
       $this->content = $content;
    }

    /**
     * Получить значение по ключу
     * @param $name
     * @return string
     */
    public function getValue($name): string
    {
        if (array_key_exists($name, $this->content)) {
            return $this->content[$name];
        } else {
            return false;
        }
    }




}