<?php
error_reporting(E_ALL ^E_NOTICE ^E_WARNING);

$web['dbhost'] = 'localhost';

$web['database'] = 'binaryquestions';

$web['connection'] = 'mysql:host='.$web['dbhost'].';dbname='.$web['database'];


$web['dbuser'] = 'root';

$web['dbpassword'] = '';

$web['options']  = array(
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
); 
try {
    $db = new PDO($web['connection'], $web['dbuser'], $web['dbpassword'],$web['options']);
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>