<?php
error_reporting(E_ALL ^E_NOTICE ^E_WARNING);

$web['dbhost'] = 'xBeast-PC';

$web['database'] = 'BinaryQuestions';

$web['connection'] = 'mysql:host='.$web['dbhost'].';dbname='.$web['database'];


$web['dbuser'] = 'sa';

$web['dbpassword'] = 'Psihopat1';

$web['options']  = array(
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
); 
try {
    $grizismudb = new PDO($web['connection'], $web['dbuser'], $web['dbpassword'],$web['options']);
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>