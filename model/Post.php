<?php
/*
	Classe que manipula os dados de post
*/

class Post
{
	public $autorizado = 'true';
	//atributos correspondentes aos da tabela post
	public $id;
	public $nome;
	public $descricao;
	//variável para a conexão
	private $conexao;

	//sempre que um objeto é instanciado
	//já recebe a conexão
	public function __construct($con)
	{
		$this->conexao = $con;
	}

	//faz uma consulta e retorna um resultado
	public function read($idpost=null, $idcategoria=null) {
		if (isset($idcategoria) and ($this->autorizado == 'true')) {// id tem valor		
			$query = "SELECT * FROM post 
			WHERE id_categoria=:id ORDER BY id";
		//prepara a execucao
			$stmt = $this->conexao->prepare($query);
			$stmt->bindParam('id', $idcategoria);
		}elseif (isset($idpost) and $this->autorizado == 'true') {// id tem valor		
			$query = "SELECT texto FROM post 
			WHERE id=:id ORDER BY id";
		//prepara a execucao
			$stmt = $this->conexao->prepare($query);
			$stmt->bindParam('id', $idpost);
		}else{// id nao tem valor	
			$query = "SELECT * FROM post";
		//prepara a execucao
			$stmt = $this->conexao->prepare($query);
		//}else{
		//	aut();
		}
		//executa a consulta
		$stmt->execute();
		//transforma os resultados em um array
		$resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
		//retorna o resultado
		return $resultado;
	
	}
	 function create() {
		if ($autorizado == 'true') {
			try {
				$query = "INSERT INTO post (titulo,texto,id_categoria,autor,dt_criacao) values(:titulo,:texto,:id_categoria,:autor,:dt_criacao)";
				//prepara a execucao
				$stmt = $this->conexao->prepare($query);
				$stmt->bindParam('titulo', $this->titulo);
                $stmt->bindParam('texto', $this->texto);
                $stmt->bindParam('id_categoria', $this->id_categoria);
                $stmt->bindParam('autor', $this->autor);
                $stmt->bindParam('dt_criaco', $this->dt_criaco);
				//executa a consulta
				$stmt->execute();
				//transforma os resultados em um array
				$resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
				//retorna o resultado
				return true;
				} catch(Exception $e) {
		  		    die("erro com o servidor: " . $e->getMessage());
			}
		}
		//else{
		//	aut();
		}

	

	//tá errado ainda
	function update() {
		if ($autorizado == 'true') {	
			try{
				$query = "UPDATE post SET titulo=:titulo, texto=:texto, id_categoria=:id_categoria, autor=:autor, dt_criacoa=:dt_criacoa, WHERE id=:id";
				//prepara a execucao
				$stmt = $this->conexao->prepare($query);
				$stmt->bindParam('id', $id);
				$stmt->bindParam('titulo', $titulo);
                $stmt->bindParam('texto', $texto);
                $stmt->bindParam('id_catgoria', $id_catgoria);
                $stmt->bindParam('autor', $autor);
                $stmt->bindParam('dt_criacoa', $dt_criacoa);
			
				//executa a consulta
				$stmt->execute();
				//transforma os resultados em um array
				$resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
				//retorna o resultado
				return $resultado;
			}catch(Exception $e) {
		  		    die("erro com o servidor: " . $e->getMessage());
			}
		//}else{
		//	aut();
		}
	}
	 function delete($id=null) {
		if ($autorizado == 'true') {
			try {
				if (isset($id)) {// id tem valor		
					$query = "DELETE * FROM post WHERE id=:id";
					//prepara a execucao
					$stmt = $this->conexao->prepare($query);
					$stmt->bindParam('id', $id);
				}
				//executa a consulta
				$stmt->execute();
				//transforma os resultados em um array
				$resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
				//retorna o resultado
				return $resultado;
			}catch(Exception $e) {
		  		    die("erro com o servidor: " . $e->getMessage());
			}
		//}else{
		//	aut();
		}
	}
}
