<?php

namespace Search\Sdk\Models;

class Model
{

    public array $content;

    protected array $params;


    protected array $intParams;

    /**
     * Конструктор Model
     * @param array $content
     */
    public function __construct(array $content=[])
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

    public function getParams():array
    {
        return $this->params;
    }


    public function getStringParams():string
    {
        $string = '';
        $i = 1;
        foreach ($this->params as $key=> $value){
            $string.=$i.")".$value."\n";
            $i++;
        }
        return $string;
    }

    public function toString(): string
    {
        $string = "";
        foreach ($this->params as $key=> $value){
            $string.=$value.":".$this->content[$key]."\n";
        }
        return $string;
    }

    public function isInt(string $param):bool
    {
        if(in_array($param,$this->intParams)){
            return true;
        }
        else{
            return false;
        }
    }






}