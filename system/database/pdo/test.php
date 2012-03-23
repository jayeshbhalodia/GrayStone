<?php

require_once "abstractpdo.php";
require_once "mysqlpdo.php";
require_once "select.inc";
require_once "query.inc";

$databases = array(
    'default' =>
    array(
        'default' =>
        array(
            'database' => 'mysystem2',
            'username' => 'root',
            'password' => '',
            'host' => 'localhost',
            'port' => '',
            'driver' => 'mysql',
            'prefix' => '',
        ),
    ),
);

//$nid = db_insert('users')
//        ->fields(array(
//            'username' => 'test89',
//            'password' => 'test89',
//            'email_id' => 'test89@gmail.com',
//            'created' => time(),
//            'updated' => time(),
//            'ip_address' => '127.0.0.1',
//        ))
//        ->execute();

//echo $nid;

$q = db_select('users', 'u');

$q->fields('u');
$q->condition('u.id', 2);
$result = $q->execute()->fetchAll();
$num_rows = $q->countQuery()->execute()->fetchField();

echo $num_rows;
print_r($result);
?>