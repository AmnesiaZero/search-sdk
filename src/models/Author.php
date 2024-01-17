<?php

namespace Search\Sdk\Models;

use Search\Sdk\Models\Model;
class Author extends Model
{
    protected array $params = [
        'fullname' => 'Имя',
        'country' => 'Страна',
    ];

    protected array $intParams = [];



}