<?php
/**
	Classe que manipula os dados de categorias
*/

class Categoria
{
	public $autorizado = 'true';
	//atributos correspondentes aos da tabela categoria
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
	public function read($id=null) {
		if (isset($id) and $autorizado == 'true') {// id tem valor		
			$query = "SELECT * FROM 
				 categoria WHERE id=:id ORDER BY nome";
		//prepara a execucao
			$stmt = $this->conexao->prepare($query);
			$stmt->bindParam('id', $id);
		}
		if (!isset($id) and $autorizado == 'true') {// id nao tem valor	
			$query = "SELECT id, nome, descricao FROM 
				 categoria ORDER BY nome";
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
 //esse é o meu --------------
	 function create() {
		if ($autorizado == 'true') {
			try {
				$query = "INSERT INTO categoria (nome, descricao) values(:nome, :descricao)";
				//prepara a execucao
				$stmt = $this->conexao->prepare($query);
				$stmt->bindParam('nome', $this->nome);
				$stmt->bindParam('descricao', $this->descricao);
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
				$query = "UPDATE categoria SET nome=:nome, descricao=:descricao WHERE id=:id";
				//prepara a execucao
				$stmt = $this->conexao->prepare($query);
				$stmt->bindParam('id', $id);
				$stmt->bindParam('nome', $nome);
				$stmt->bindParam('descricao', $descricao);
			
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
					$query = "DELETE * FROM categoria WHERE id=:id";
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
