<?php

namespace App\Model;

class MyDB extends \SQLite3
{
    function __construct(){
        $this->open(__DIR__ .'/../db/my.db');
    }
}