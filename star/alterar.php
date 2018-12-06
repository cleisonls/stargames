<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
		<title>Alterar</title>
	</head>
	<body>
		<div class="jumbotron container-fluid text-center">
			<h1>Alterar dados do Usuário</h1>
		</div>
		<div class="container text-center">
			<div class="row">
				<div class="col-md-12" style="background: #ccc"> </div>
			</div>
			<div class="row">
				<div class="col-md-3" style="background: #ccc"> </div>
				<div class="col-md-6" style="background: #eee">
					<?php
						//alterar.php
						
						require "conexao.php";
						
						$id = $_POST["id"];
						
						$sql = "SELECT * FROM usuarios WHERE id_usuario={$id};";
						$resultado = $conexao->query($sql);
						while($campo = $resultado->fetch_assoc()){
							$i = $campo["id_usuario"];
							$n = $campo["nome"];
							$e = $campo["email"];
							$u = $campo["usuario"];
							$s = $campo["senha"];
							echo "
							<form action='funcoes.php' method='post'>
								<input type='hidden' name='f' value='a'>
								<div class='form-group'>
									<label for='id'>ID</label>
									<input class='form-control' type='text' name='id_usuario' value='{$i}' disabled>
									<input type='hidden' name='id' value='{$i}'>
								</div>
								<div class='form-group'>
									<label for='nome'>NOME</label>
									<input class='form-control' type='text' name='nome' value='{$n}'>
								</div>
								<div class='form-group'>
									<label for='email'>EMAIL</label>
									<input class='form-control' type='text' name='email' value='{$e}'>
								</div>
								<div class='form-group'>
									<label for='usuario'>USUARIO</label>
									<input class='form-control' type='text' name='usuario' value='{$u}'>
								</div>
								<div class='form-group'>
									<label for='senha'>SENHA</label>
									<input class='form-control' type='text' name='senha' value='{$s}'>
								</div>
								<div class='form-group'>
									<input class='btn btn-info' type='submit' value='Alterar'>
								</div>
							</form>";
						}
						$conexao->close();
					?>
				</div>
				<div class="col-md-3" style="background: #ccc"> </div>
			</div>
			<div class="row">
				<div class="col-md-12" style="background: #ccc"> </div>
			</div>
		</div>
	</body>
</html>