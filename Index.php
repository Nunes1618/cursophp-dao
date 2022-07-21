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
	//$usuario = new Usuario();
	//$usuario->login("root", 12345);
	//echo $usuario;

	$aluno = new Usuario();
	// Precisei comentar o código acima e em seguida vou fazer o insert de um usuário novo
	
	$aluno->setDeslogin("aluno");
	$aluno->setDessenha("123456");

	$aluno->insert();
	// O cadastro ñ tem ID e a data de cadastro, mas esses dados serão puxados como resposta por causa do meu procedure

	echo $aluno;
	

 ?>