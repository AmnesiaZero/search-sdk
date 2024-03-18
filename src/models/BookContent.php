<?php

namespace Search\Sdk\Models;

class BookContent extends Model
{

    protected array $params = [
        'title' => 'Название книги',
        'pubyear' => 'Год выпуска книги',
        'authors' => 'Авторы книги',
        'description' => 'Описание книги ',
        'pubhouses' => 'Издательство книги'
    ];

    protected array $intParams = [
        'recordyear'
    ];

}