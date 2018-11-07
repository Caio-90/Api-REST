<?php
	public function aut(){
		public $autorizado ;
		header('Content-Type: application/json');
			if (!isset($_SERVER['PHP_AUTH_USER'])) {
				header('WWW-Authenticate: Basic realm="Página Restrita"');
				header('HTTP/1.0 401 Unauthorized');
				echo json_encode(["mensagem" => "Autenticacao necessária"]);
				exit;
			}elseif ($SERVER['PHP_AUTH_USER'] == 'eu'
					 && $_SERVER ['PHP_AUTH_PW'] == '123') {
				echo json_encode(["mensagem" => "Bem vindo!"]);
				$autorizado = 'true' ;
				
			}
		}
