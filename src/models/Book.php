<?php

namespace Search\Sdk\Models;

use Search\Sdk\Models\Model;

class Book extends Model
{
    protected string $prefix = 'books';

    protected array $showFields = [
        'title'=>'Название',
        'pubhouses' => 'Издательства',
        'authors' => 'Авторы',
        'pubyear' => 'Год издания',
        'description' => 'Описание'
        ];


}