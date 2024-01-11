<?php

namespace Search\Sdk\Models;

use Exception;
use Search\Sdk\Client;

class Model
{
    public array $content;

    protected array $showFields;

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

    public function toString(): string
    {
        $string = "";
        foreach (array_keys($this->showFields ) as $key){
                $string.=$key.":".$this->content[$key]."\n";
            }
        return $string;
    }






}