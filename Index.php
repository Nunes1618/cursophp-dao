<?php 

	require_once("config.php");

	//Carrega apenas um usuário
	//$root = new Usuario();
	//$root->loadById(1);
	//echo $root;

	// Carrega uma lista de usuários
	//$lista = Usuario::getList();
	//echo json_encode($lista);

	// Carrega uma lista de usuários a partir do login
	//$search = Usuario::search("Wesley");
	//echo json_encode ($search);

	//Carrega um usuário usando o login e a senha
	$usuario = new Usuario();
	$usuario->login("root", 12345);

	echo $usuario;

 ?>