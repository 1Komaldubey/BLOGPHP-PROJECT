<?php 
$SERVER="localhost";
$USERNAME="root";
$PASSWORD="";
$DBNAME="blogs";

$conn = mysqli_connect($SERVER,$USERNAME,$PASSWORD,$DBNAME);
if(!$conn)
{
    echo "nor connected to db";
}

?>