<?php
$connection = new mysqli("localhost","root","","cadtech");
if (! $connection){
    die("Error in connection".$connection->connect_error);
}