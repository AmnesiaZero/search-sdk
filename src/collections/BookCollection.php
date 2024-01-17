<?php

namespace Search\Sdk\collections;

class BookCollection extends Collection
{
    protected const PREFIX = 'books';

    protected string $titleField = 'title';
}