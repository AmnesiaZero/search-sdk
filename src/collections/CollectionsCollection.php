<?php

namespace Search\Sdk\collections;

use Search\Sdk\Client;

class CollectionsCollection extends Collection
{
    const PREFIX = 'collections';
    public function __construct(Client $client)
    {
        parent::__construct($client);
    }

}