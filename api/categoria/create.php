<?php

header('Content-Type: application/json');

//arquivo para testar o metodo create()
	include_once '../../config/Conexao.php';
	include_once '../../model/Categoria.php';
	//instanciando e retornando conexao
	$db = new Conexao();
	$conexao = $db->getConexao();
	//instanciando categoria
	$cat = new Categoria($conexao);
	//atribuindo os valores enviados aos atributos da cat

	$cat->nome = $_POST['nome'];
	$cat->descricao = $_POST['descricao'];

	//executando o método create

	if($cat->create()){//retorna msg de erro ou sucesso
		$res = array('mensagem', 'Categoria criada!');
	}else{
		$res = array('mensagem', 'Erro ao criar categoria!');
	}
	echo json_encode($res);

