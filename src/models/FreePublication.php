<?php

namespace Search\Sdk\Models;

use Search\Sdk\Models\Model;

class FreePublication extends Model
{
    protected array $params = [
        'title' => 'Название',
        'year' => 'Год выпуска',
        'countpages' => 'Количество страниц',
        'subtitle' => 'Подзаголовок',
        'city' => 'Город издательства',
        'description' => 'Описание',
        'pubhouse' => 'Издательство'
    ];

    protected array $intParams = ['year','countpages'];


}