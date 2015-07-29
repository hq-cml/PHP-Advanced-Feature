<?php

/*
 * 利用__call和反射，实现一个简单的工厂
 */

class Mysql
{
    function connect($db_config)
    {
        echo "Mysql Connect:".json_encode($db_config)."\n";
    }
}

class SqlFactory
{
    private $target;
    
    function __construct($tar)
    {
        $this->target = new $tar();
    }
    
    function __call($name, $args)
    {
        $ref = new ReflectionClass($this->target);
        if($method = $ref->getMethod($name))
        {
            echo "Before Call\n";
            
            $method->invoke($this->target, $args);
            
            echo "After Call\n";
            
        }
    }
}

$db_config = array(
    'host'=>'127.0.0.1',
    'port'=>'3306'
);
            
$sql = new SqlFactory('Mysql');
$sql->connect($db_config);


 
