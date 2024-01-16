<?php

namespace Search\Sdk\Test;

use Exception;
use PHPUnit\Framework\TestCase;
use Search\Sdk\Clients\Client;
use Search\Sdk\collections\BookCollection;
use Search\Sdk\collections\FreePublicationCollection;
use Search\Sdk\Logs\Log;
use Search\Sdk\Models\Book;
use Search\Sdk\Models\FreePublication;

class Test extends TestCase
{
    /**
     * @throws Exception
     */
    public function testBooks()
  {
      $client = new Client(32,'421bd26c4717baddf5dcce0f09a9fa04');
      $booksCollection = new BookCollection($client);
      $content = $booksCollection->search('a',['available' => 0]);
      $book = new Book($content[1]);
      Log::debug($book->getValue('title'));

      $freePublicationsCollection = new FreePublicationCollection($client);
      $content =  $freePublicationsCollection->search('',[]);
      $freePublication = new FreePublication($content[0]);
      Log::debug($freePublication->getValue('title'));


  }

}