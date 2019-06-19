<?php
require_once "connect.php";

if(isset($_POST['user']) && !empty($_POST['user']) && isset($_POST['pass']) && !empty($_POST['pass']) && isset($_POST['email']) && !empty($_POST['email'])){
	$usuario 			= $_POST['user'];
	$senha				= $_POST['pass'];
	$email				= $_POST['email'];
	$senha 				= password_hash($senha, PASSWORD_DEFAULT);
	$consult			= "SELECT * FROM usuarios WHERE nome LIKE '$usuario' OR email LIKE '$email'";
	$result				= mysqli_query($connect,$consult);
	if($row = mysqli_fetch_array($result)){
		echo "Usuário com esse  email ou nome já cadastrado!";
	}else{
		$sql 			= "INSERT INTO usuarios(nome,senha,email) VALUES ('$usuario','$senha','$email')";
		$insert 		= mysqli_query($connect,$sql);
		echo "Usuário cadastrado com sucesso!";		
	}

}
