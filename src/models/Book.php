<?php

namespace Search\Sdk\Models;

use Search\Sdk\Models\Model;

class Book extends Model
{

    protected array $params = [
        'title'=>'Название',
        'pubhouses' => 'Издательства',
        'authors' => 'Авторы',
        'pubyear' => 'Год издания',
        'description' => 'Описание'
    ];

    protected array $intParams = ['pubyear'];




}