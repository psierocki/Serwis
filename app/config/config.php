<?php

$hostname = 'localhost';
$db = 'serwis';
$username = 'root';
$password = '';

@ $db = new mysqli($hostname,$username,$password,$db);
$db-> query("SET NAMES 'utf8' COLLATE 'utf8_general_ci'");
