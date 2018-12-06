<?php
	session_start();
	require 'conexao.php';

	if(isset($_POST['nome']) && !empty($_POST['nome']))
	{
		$nome = $_POST['nome'];
		$mensagem = $_POST['mensagem'];

		$sql = $pdo->prepare("INSERT INTO mensagem SET nome = :nome, msg = :msg, data_msg = NOW()");
		$sql->bindValue(":nome", $nome);
		$sql->bindValue(":msg", $mensagem);
		$sql->execute();
	}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Projeto Comentários</title>

	<!-- METADADOS -->
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width; initial-scale=1"/>

	<!-- BOOTSTRAP, CSS -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css"/>
	<link rel="stylesheet" href="assets/css/style.css"/>
</head>
<body>
	<div class="container-fluid d-flex justify-content-center" id="topo">
		<figure>
			<img src="assets/images/tech1.jpg"/>
		</figure>
	</div>

	<div class="row" style="margin-right: 0px;">
		<div class="col-lg-2">&nbsp;</div>
		<div class="col-lg-4">
			<h1 class="text-secondary">Comentários</h1>
			<hr>

			<form method="POST">
				<div class="form-group">
					<label for="name">Nome</label>
					<input type="text" class="form-control" id="name" name="nome">
				</div>
				<div class="form-group">
					<label for="message">Mensagem</label>
					<textarea class="form-control" id="message" name="mensagem" rows="3"></textarea>
				</div>

				<div class="form-group d-flex justify-content-center">
					<input type="submit" value="Comentar" class="btn btn-info col-md-3" />
				</div>
			</form>
		</div>
		<div class="col-lg-4">
			<div data-offset="0" class="col-12 scrollspy-example" style="height: 350px; overflow: auto;" id="scroll">
			<?php
				$sql = "SELECT * FROM mensagem ORDER BY data_msg DESC";
				$sql = $pdo->query($sql);
				if($sql->rowCount() > 0)
				{
					foreach($sql->fetchAll() as $mensagem)
					{
						?>
						<strong><?php echo $mensagem['nome']; ?></strong><br/>
						<?php echo $mensagem['msg']; ?>
						<hr/>
						<?php
					}
				}
				else
				{
					echo "<p style='color: #aaa;'>Nenhum comentário até o momento...</p>";
				}	
			?>
			</div>
		</div>
		<div class="col-lg-2">&nbsp;</div>
	</div>

	<!-- JQUERY, POPPER, BOOTSTRAP -->
	<script src="assets/js/jquery-3.3.1.slim.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
</body>
</html>