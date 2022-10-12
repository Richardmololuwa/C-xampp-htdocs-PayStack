<?php

$host="localhost";
$user="root";
$password="freshmololuwa";
$db="smart";
$port="3307";



$data= mysqli_connect($host,$user,$password,$db,$port);
if(!$data)
{
    die(mysqli_error($data));
}

?>