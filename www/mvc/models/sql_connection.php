<?php

// Database connection
try
{
    $bdd = new PDO('mysql:host=db;dbname=experiments;charset=utf8', 'experiments', 'anexperimentspassword');
}
catch(Exception $e)
{
    die('Error : '.$e->getMessage());
}

include_once("mvc/models/get_data.php");
