<?php

try{
	$bd = include "Conexao.php";
    $sql = " 
    SELECT nome from categoria";

    $md = $bd->prepare($sql);
	$md->execute();		
	$retorno = $md->fetchAll(PDO::FETCH_ASSOC);
	echo json_encode($retorno);
}catch(Exception $e) {
	echo "não foi encontrado: " . $e->getMessage();
}