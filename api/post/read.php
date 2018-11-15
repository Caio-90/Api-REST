<?php

	header('Content-Type: application/json');
//arquivo para testar o metodo read()
	include_once '../../config/Conexao.php';
	include_once '../../model/Post.php';

	$db = new Conexao();
	$conexao = $db->getConexao();

	$post = new Post($conexao);

	if (isset($_GET['idp'])){
		$resultado = $post->read($_GET['idp']);
	}elseif(isset($_GET['idc'])){
		$resultado = $post->read(null,$_GET['idc']);
	}else{
		$resultado = $post->read();
        // apenas posts daquela categoria
	}


	
	echo json_encode($resultado);
