<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('functions.php');

$conn = connectToDBS('localhost', 'root', '', 'dsd','1');
//$conn2 = connectToDBS('25.21.252.69', 'martin', 'heslo123', 'dsd','2');
//$conn3 = connectToDBS('25.86.62.187', 'martin', 'heslo123', 'dsd','3');



$connection = [
    'conn' => $conn,
    //'conn2' => $conn2,
    //'conn3' => $conn3,
];