<?php

namespace Search\Sdk\collections;

class AuthorCollection extends Collection
{
    protected const PREFIX = 'authors';

    protected string $titleField = 'fullname';

}