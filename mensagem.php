<?php
    session_start();
	require_once "connect.php";
	if(isset($_POST['mensagem']) && !empty($_POST['mensagem'])){
		$nome 	   = $_SESSION['usr'];
		$mensagem  = $_POST['mensagem'];
		$sql 	   = "INSERT INTO mensagens(mensagem,usuario) VALUES ('$mensagem','$nome')";
		$insert    = mysqli_query($connect,$sql);
	}

