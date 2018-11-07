<?php

	header('Content-Type: application/json');
//arquivo para testar o metodo read()
	include_once '../../config/Conexao.php';
	include_once '../../model/Categoria.php';

	$db = new Conexao();
	$conexao = $db->getConexao();

	$cat = new Categoria($conexao);

	$resultado = $cat->read(); //todos
//	$resultado = $cat->read(); //só um

	$resultado = $cat->read($_GET['id']);
	
	print_r($resultado);
