<?php

namespace Search\Sdk\Models;

use Search\Sdk\Models\Model;

class Collection extends Model
{
    protected array $params = [
        'name' => 'Название',
        'books_count' => 'Количество книг'
    ];

    protected array $intParams = ['books_count'];



}
