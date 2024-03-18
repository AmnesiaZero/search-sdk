<?php

namespace Search\Sdk\Models;

class Page extends Model
{

    protected array $fullParams = [
        'title' => 'Название книги',
        'pubyear' => 'Год выпуска книги',
        'authors' => 'Авторы книги',
        'description' => 'Описание книги ',
        'pubhouses' => 'Издательство книги'
    ];

    protected array $params = [
         'page_id' => 'Номер страницы'
    ];

    protected array $intParams = [
        'recordyear'
    ];

    public function toString(): string
    {
        $string = "";
        if (!$this->content['flag']){
            $params = $this->params;
        }
        else{
            $params = $this->fullParams;
        }
        foreach ($params as $key=> $value){
            $string.=$value.":".$this->content[$key]."\n";
        }
        return $string;
    }

}