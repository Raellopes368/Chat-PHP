<?php

$host			= "localhost";
$user			= "root";
$pass			= "";
$bd				= "mensagens";


$connect 		= new mysqli($host,$user,$pass,$bd) or die(mysqli_error());
