<?php

/*
 * ����__call�ͷ��䣬ʵ��һ���򵥵Ĺ���
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



 
