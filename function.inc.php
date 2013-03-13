<?php
session_start();
include_once( "class.TemplatePower.inc.php" );
//include_once("db_verbinding.php");

$db = new PDO("mysql:host=localhost;dbname=les_1","root","");
