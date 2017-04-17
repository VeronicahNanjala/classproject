<?php
define('DBHOST', 'localhost');
define('DBUSERNAME', 'root');
define('DBPASSWORD', '');
define('DBNAME', 'classproject2017');

$dbconn=mysqli_connect(DBHOST,DBUSERNAME,DBPASSWORD,DBNAME);

if (mysqli_connect_errno()){
    echo "Failed to connect tto MYSQL:," . mysqli_connect_error();
}else{
    echo "Connected to MYSQL" ."<br>";
}
?>