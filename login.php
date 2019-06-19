<?php
session_start();
require_once "connect.php";

if(isset($_POST['user']) && !empty($_POST['user']) && isset($_POST['pass']) && !empty($_POST['pass'])){
    $usuario          = $_POST['user'];
    $senha            = $_POST['pass'];
    $sql              = "SELECT * FROM usuarios WHERE nome LIKE '$usuario'";
    $result           = mysqli_query($connect,$sql) or die(mysqli_error());
    if($row = mysqli_fetch_array($result)){
        if(password_verify($senha,$row['senha'])){
          $_SESSION['usr']  = $usuario;
          $_SESSION['pass'] = $senha;
          echo "true";
    }else{
      echo "Senha incorreta";
    }
  }else{
    echo "Usuario não cadastrado!<br/>Cadastre-se no link abaixo";
  }
}
	
