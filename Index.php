<?php 

	require_once("config.php");

	$sql = new Sql();

	$usuarios = $sql->select("select * from tb_usuario");

	echo json_encode($usuarios);

	// Acima eu estou falando pro meu código que eu preciso requisitar as classes do meu código, para isso eu uso o confi.php, logo em seguida eu encontro a classe que eu quero, que no caso é a new sql, e após executar essa classe eu vou executar um comando no banco de dados listando tudo o que eu tenho na minha tabela usuários e por último eu vou fazer um json de tudo o que eu preparei para executar o código.

 ?>