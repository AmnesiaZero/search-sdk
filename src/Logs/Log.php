<?php

namespace Search\Sdk\Logs;

use Monolog\Handler\StreamHandler;
use Monolog\Level;
use Monolog\Logger;

class Log
{
    public static function debug($message): void
    {
        if(is_array($message)){
            $message = json_encode($message);
        }
        $log = new Logger('name');
        $log->pushHandler(new StreamHandler(__DIR__ . '/app.log',Level::Debug));
        $log->debug($message);
    }

}