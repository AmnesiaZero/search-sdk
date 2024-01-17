<?php

namespace Search\Sdk\Models;

class BookContent extends Model
{

    protected array $params = [
        'title' => 'Название',
        'recordyear' => 'Год выпуска',
        'authors' => 'Авторы',
        'description' => 'Описание',
        'pubhouse' => 'Издательство'
    ];

    protected array $intParams = [
        'recordyear'
    ];

}