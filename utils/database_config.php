<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'password');
define('DB_NAME', 'intern_datatable');
define('Admin', 'admin');
define('User', 'user');
 $mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
if($mysqli === false){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}
?>