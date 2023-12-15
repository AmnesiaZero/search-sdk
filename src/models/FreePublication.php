<?php

namespace Search\Sdk\Models;

use Search\Sdk\Models\Model;

class FreePublication extends Model
{
    protected string $prefix = 'free-publications';

    public function get(): string
    {
        return $this->getValue('free_publications');
    }

}