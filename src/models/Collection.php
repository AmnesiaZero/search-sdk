<?php

namespace Search\Sdk\Models;

use Search\Sdk\Models\Model;

class Collection extends Model
{
    protected array $params = [
        'name' => 'Название',
        'recordyear' => 'Год выпуска',
        'authors' => 'Авторы',
        'description' => 'Описание',
        'executant' => 'Исполнитель',
        'pubhouse' => 'Издательство'
    ];

    protected array $intParams = [
        'recordyear'
    ];



}
