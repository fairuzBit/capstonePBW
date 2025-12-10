<?php

$hostname="localhost";
$username="admin";
$password="admin123";
$database_name="users";

$db = mysqli_connect($hostname,$username,$password,$database_name);

if($db->connect_error){
    echo "koneksi databases eror!";
    die("error!");

}

?>