<?php

/*
 * 利用__call和反射，实现一个简单的工厂
 */

class Mysql
{
    function connection($db_config)
    {
        echo "Mysql Connect";
    }
}

class SqlFactory
{
    private $target;
    
    function __construct($tar)
    {
        $this->target = new $tar();
    }
}



 
