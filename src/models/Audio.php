<?php

namespace Search\Sdk\Models;

use Search\Sdk\Models\Model;

class Audio extends Model
{

    protected array $params = [
        'title' => 'Название',
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