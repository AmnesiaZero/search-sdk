<?php

namespace Search\Sdk\collections;

use Search\Sdk\Client;

class BookCollection extends Collection
{
    const PREFIX = 'books';
    public function __construct(Client $client)
    {
        parent::__construct($client);
    }

}