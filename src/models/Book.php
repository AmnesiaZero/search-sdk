<?php

namespace Search\Sdk\Models;

use Search\Sdk\Models\Model;

class Book extends Model
{
    public function getBooks(): string
    {
        return $this->getValue('books');
    }

}