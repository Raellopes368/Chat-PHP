<?php
	session_start();
	if(!isset($_SESSION['usr']) || !isset($_SESSION['pass'])){
	header("Location:index.html");	
	exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8"/>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="css/estilo2.css"/>
	<title></title>
</head>
<body>

 
	<div class="center">
		<div class="sair"><a href="sair.php">SAIR</a></div>
		<div  id="botao">
			<button class="btn btn-outline-success adicionar">Adicionar mensagem</button>
		</div>
		<div class="mensagens">
			<p id="msg">Mensagens</p> 
			<?php
				require_once "connect.php";
				$sql  	= "SELECT * FROM mensagens";
				$res	= mysqli_query($connect,$sql);
				if(mysqli_num_rows($res)){
					echo "<table class='table'>
						  <thead>
						    <tr>
						      <th scope='col'>Usuário</th>
						      <th scope='col'>Mensagem</th>
						    </tr>
						  </thead>";
				}
				while($linha = mysqli_fetch_array($res)){
					 	$mensagem  = $linha['mensagem'];
					 	$usuario   = $linha['usuario'];
					 	echo "<tbody>
						    	<tr>
							      <td scope='row'>$usuario</td>
							      <td scope='row'>$mensagem</td>
							 	  </tr>";
						  			
					}	 		  
					echo "</tbody>
						  </table>";
						  
			?>
		</div>
	 </div> 	
		<!-- modal -->
	    <!--primeiro modal -->
			<div class="modal fade" id="modalChat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" id="exampleModalLabel">Mensagens</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-body">
			      	<textarea class="form-control" placeholder="Insira aqui sua mensagem" rows="5" id="mensagem"></textarea>
	             </p>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-outline-danger fechar" >Fechar</button>
			        <button type="button" class="btn btn-outline-success adc" >Adicionar</button>
			      </div>
			    </div>
			  </div>
			</div>
	    	<!-- fim do primeiro modal --> 	
		
		

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script >
		$(document).on("click",".adicionar",function(){
			$("#modalChat").modal("show");
		});
		$(document).on("click",".fechar",function(){
			$("#modalChat").modal("hide");
		});
		

	</script>
	<script >
		$(document).on("click",".adc",function(){
			let mensagem 	= document.getElementById("mensagem").value; 	
			document.getElementById("mensagem").value = "";
			$.ajax({
				url:"mensagem.php",
				method:"POST",
				data:{
					mensagem:mensagem
				},
				async:true,
				success:function(data){
					window.location.reload();
					$("modalChat").modal("hide");
				}
			});
			
		});
	</script>
</html>









	