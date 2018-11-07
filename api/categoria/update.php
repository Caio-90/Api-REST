<?php


//tá errado ainda
header('Content-Type: application/json');

	include_once '../../config/Conexao.php';
	include_once '../../model/Categoria.php';


	$db = new Conexao();
	$conexao = $db->getConexao();
	//instanciando categoria
	$cat = new Categoria($conexao);

	$dados = json_decode(file_get_contents('php://input'), true);

	$cat->id = $dados['id'];
	$cat->nome = $dados['nome'];
	$cat->descricao = $dados['descricao'];

	
	if($cat->update()){//retorna msg de erro ou sucesso
		$res = array('mensagem', 'Mudou');
	}else{
		$res = array('mensagem', 'Erro ao mudar');
	}
	echo json_encode($res);

