<?php

namespace Search\Sdk\Test;

use Exception;
use PHPUnit\Framework\TestCase;
use Search\Sdk\Client;
use Search\Sdk\Logs\Log;
use Search\Sdk\Models\Book;

class Test extends TestCase
{
    /**
     * @throws Exception
     */
    public function testBooks()
  {
      $client = new Client(2,'someKey');
      $book = new Book($client);
      $book->setParams(['available' => 0]);
      $book->search('a');
      Log::debug($book->getBooks());

  }

}