<?php
	try
	{
		$pdo = new PDO("mysql:dbname=star;host=localhost", "root", "");
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch(PDOException $e)
	{
		echo "Falha na conexão: " . $e->getMessage();
		exit();
	}
?>