<?php namespace controller; //Define o pacote da classe

/**
 * A classe "validadeForms" valida campos de formulários
**/

class validadeForms {
	
	//Define os tipos de validação
	private $_optimizers = array(
		"none", //NONE define que o campo não possui um tipo de validação especial
		"name", //NAME define que o campo aceita apenas valores compatíveis com formatos de nomes
		"email" //EMAIL define que o campo aceita apenas valores compatíveis com formatos de email
	);
	
	//Modelo da estrutura dos campos
	private $_defaults = array(
		"type"        => "text",
		"name"        => "",
		"optimizeto"  => "none",
		"required"    => false,
		"clone"       => ""
	);
	
	//Método de requisição
	private $_requestMethod = "post";
	
	//Inializador de validação
	private $_requestStarter = "19672e7b3937ebb199b3f4d73f69f603";
	
	//Campos cadastrados para validação
	private $_fields = array();
	
	//Armazena erros de validação
	private $_cache = array();
	
	
	//Método que remove a acentuação de caracteres
	private function removeStringAccentuation( $text ) {
		
		$before = "áàãäâéèêëíìîïóòôöõúùûüçñÁÀÃÄÂÉÈÊËÍÌÎÏÓÒÔÖÕÚÙÛÜÇÑ";
		$after  = "aaaaaeeeeiiiiooooouuuucnAAAAAEEEEIIIIOOOOOUUUUCN";
		$text   = strtr( utf8_decode( str_replace( " ", "", $text ) ), utf8_decode( $before ), $after );
		
		return $text;
		
	}
	
	//Verifica se o tipo de validação definido para o campo é suportado, se não for, define como padrão "none"
	private function checkOptimizer( $optimizer ) {
		
		if( !empty( $optimizer ) && is_string( $optimizer ) && in_array( $optimizer, $this->_optimizers ) )
			return $optimizer;
		else
			return "none";
			
	}
	
	//Verifica se os campos obrigatórios existem e se foram devidamente informados
	private function checkRequiredField( $name = "", $required = false ) {
		
		//PREG_REPLACE substitui todos os caracteres alfa-numéricos da string
		$name = preg_replace("/(\[)+([\"\'0-9a-zA-Z]*)+(\])/", "", $name);
		
		//Se a identificação do campo não for repassada, uma mensagem de erro é imediatamente retornada
		if( empty( $name ) )
			return array( false, "Defina um nome para o campo" );
		
		
		//Busca o valor do campo de acordo com o tipo de requisição utilizado
		@$request = ( $this->_requestMethod == "get" ) ? $_GET[ $name ] : $_POST[ $name ];
		
		//Se o campo não existir ou se não for corretamente informado, uma mensagem de erro é imeditamente retornada
		if( $required == true && ( !isset( $request ) || empty( $request ) ) ) {
			return array( false, "Você deve preencher este campo obrigatório." );
		}else{
			return array( true, "Nenhum erro encontrado.", trim( $request ) );
		}
				
	}
	
	//Para campos de comparação, verifica se o seu valor é compatível com o do campo principal
	private function checkFieldClone( $field = "", $clone = "" ) {
		
		if( isset( $_REQUEST[ $field ] ) )
			if( $_REQUEST[ $field ] == $_REQUEST[ $clone ] )
				return array( true, "Nennhum erro emcontrado." );
			else
				return array( false, "O termo informado não coincide com o valor primário." );
		else
			return array( false, "O valor primário está ausente, verifique os dados informados para continuar." );
		
	}
	
	//Verifica se o servidor do email informado existe de fato
	private function checkEmailServer( $server = "" ) {
		
		//Define os servidores que são comumente usados e que são seguros
		$usualServers = array(
			"gmail.com",
			"googlemail.com",
			"hotmail.com",
			"outlook.com",
			"outlook.com.br",
			"live.com",
			"yahoo.com",
			"yahoo.com.br",
			"facebook.com"
		);
		
		//Se o valor do servidor for vazio, ele é inválido
		if( !empty( $server ) ) {
			
			//Se o servidor não estiver na lista de servidores permitidos, ele será busca para saber se existe realmente
			if( !in_array( $server, $usualServers ) ) {
				
				//Busca o servidor online
				if( @fopen( "http://www." . $server, "r" ) == false ) //Se o servidor não puder ser acessado, ele é inválido
					return false;
				else
					return true;
					
			} else { //Se o servidor estiver na lista de servidores permitidos, ele é válido
				return true;
			}
			
		} else {
			return false;
		}
		
	}
	
	//Valida todos os campos, independente do tipo de validação
	private function validateAllOptimizers( $set = array() ) {
		
		//Checa a validade de campos obrigatórios
		$firstStep = $this->checkRequiredField( $set["name"], $set["required"] );
		
		//Padroniza o status de validação
		$status = "invalid";
		
		//Checa a resposta para a validação de campos obrigatórios
		if( $firstStep[0] == false ) {
			$message = $firstStep[1];
		} else {
			
			//Busca o valor do campo
			$value = $firstStep[2];
			
			//Checa a validade de campos do tipo "clone"
			$checkclone = ( ( !empty( $set["clone"] ) ) ? $this->checkFieldClone( $set["clone"], $set["name"] ) : array( true ) );
			
			//Se houver algum erro, o status NÂO é altera e uma mensagem é retornada. Senão, o status é alterado para "válido" e uma mensagem é retornada
			if( $checkclone[0] == false )
				$message = $checkclone[1];
			else
				$status = "valid";
				$message = $firstStep[1];
			
		}
		
		return array( $status, $message, @$value );
		
	}
	
	//Valida somente os campos sem um tipo de validação especial
	private function validateOptimizerNone( $set = array() ) {
		
		//Checa a validade geral do campo, independente de seu tipo
		$default = $this->validateAllOptimizers( $set );
		
		//Se houver erro, ele é armazenado no vetor de erros da classe
		$this->_cache = array_merge( $this->_cache, array( array( "status" => $default[0], "type" => $set["type"], "name" => $set["name"], "message" => $default[1] ) ) );
		
	}
	
	//Valida campos especiais do tipo "name"
	private function validateOptimizerName( $set = array() ) {
		
		//Checa a validade geral do campo, independente de seu tipo
		$default = $this->validateAllOptimizers( $set );
		
		if( $default[0] == "valid" && !empty( $default[2] ) ) {
			
			//PREG_MATCH verifica se o valor do campo é composto apenas por caracteres alfa-numéricos
			if( !preg_match( "/^([\-a-zA-Z0-9]*)$/", $this->removeStringAccentuation( $default[2] ) ) ) {
				$default[0] = "invalid";
				$default[1] = "Este campo reconhece apenas caracteres alfanuméricos e hífens, não incluso: " . preg_replace( "/[\-a-zA-Z0-9]/", "", $this->removeStringAccentuation( $default[2] ) ) . ".";
			}
			/**
			 * PREG_REPLACE remove os caracteres numéricos do valor e STRLEN faz a contagem dos que restaram
			 * Se esse resto for menor que dois, o campo é inválido
			**/
			elseif( strlen( preg_replace( "/[\-0-9]/", "", $default[2] ) ) < 2 ) {
				$default[0] = "invalid";
				$default[1] = "Formato inválido, verifique o valor digitado e tente novamente.";
			}
			
		}
		
		$this->_cache = array_merge( $this->_cache, array( array( "status" => $default[0], "type" => $set["type"], "name" => $set["name"], "message" => $default[1] ) ) );
		
	}
	
	//Valida campos especiais do tipo "email"
	private function validateOptimizerEmail( $set = array() ) {
		
		//Checa a validade geral do campo, independente de seu tipo
		$default = $this->validateAllOptimizers( $set );
		
		if( $default[0] == "valid" && !empty( $default[2] ) ) {
			
			//Define o status padrão de validação
			$default[0] = "invalid";
			
			//SUBSTR_COUNT verifica se o valor possui, no mínimo, um arroba, que é característica padrão dos endereços de e-mail
			if( substr_count( $default[2], "@" ) < 1 ) {
				$default[1] = 'Informe seu e-mail completo com nome de usuário, seguido de "@" e servidor, como por exemplo: myemail@example.com';
			}
			//SUBSTR_COUNT verifica se o valor possui mais de um arroba. Se possuir, é um valor inválido, já que os emails possuem apenas um arroba
			elseif( substr_count( $default[2], "@" ) > 1 ) {
				$default[1] = 'Formato de e-mail inválido: por padrão, todos os endereços de e-mail possuem apenas um "@".';
			} else {
				
				//Cria um vetor a partir do valor, separando-o em duas partes divididas pelo arroba: a primeira, o usuário; e a segunda, o servidor
				$email = explode( "@", $default[2] );
				
				//Verifica se o usuário do email foi informado corretamente
				if( empty( $email[0] ) ) {
					$default[1] = 'Nome de usuário do e-mail ausente. Por favor, informe o endereço de e-mail completo.';
				}
				//Verifica se o servidor do email foi informado corretamente
				elseif( empty( $email[1] ) ) {
					$default[1] = 'Servidor de e-mail ausente. Por favor, informe o endereço de e-mail completo.';
				}
				/**
				 * Por padrão, os endereços de email eceitam apenas caracteres alfa-numéricos, além de underline(_) e pontos(.)
				 * Se o usuário possui caracteres especiais não compatíveis, ele é inválido
				**/
				elseif( !preg_match( "/^([._-]*[a-zA-Z0-9]*)*$/", $email[0] ) ){
					$invalidchars = preg_replace( "/[\s\-\_\.a-zA-Z0-9]/", "", $email[0] );
					$default[1] = 'Formato de e-mail inválido, pois espaços em branco ' . ( ( strlen( $invalidchars ) == 0 ) ? 'não são permitidos.' : 'e os seguintes caracteres não são permitidos: "' . $invalidchars . '".' );
				}
				//Checa a validade do servidor de email
				elseif( $this->checkEmailServer( $email[1] ) == false ) {
					$default[1] = 'Não foi possível localizar o servidor "' . $email[1] . '", verifique o e-mail informado e tente novamente.';
				} else {
					$default[0] = "valid";
				}
			}
		}
		
		$this->_cache = array_merge( $this->_cache, array( array( "status" => $default[0], "type" => $set["type"], "name" => $set["name"], "message" => $default[1] ) ) );
		
	}
	
	//Verifica a validade da confirmação anti-spam do ReCaptcha
	private function validateReCaptcha( $args = array() ) {
		
		$default = array( "invalid", "Você precisa fazer a confirmação anti-spam." );
		
		/**
		 * Obrigatoriamente, os validadores recaptcha devem possuir chaves de acesso
		 * Caso uma dessas duas chaves não forem informadas, a confirmação é inválida
		**/
		if( !empty( $args[ "site_key" ] ) && !empty( $args[ "secret_key" ] ) ) {
			
			//Verifica se a confirmação ReCaptcha existe
			if( isset( $_POST['g-recaptcha-response'] ) ) {
				
				//Instancia a classe validadora do ReCaptcha
				$recaptcha = new \ReCaptcha\ReCaptcha( $args[ "secret_key" ], new \ReCaptcha\RequestMethod\CurlPost() );
				$resp = $recaptcha->verify( $_POST['g-recaptcha-response'], $_SERVER['REMOTE_ADDR'] );
				
				//Se a resposta da validação for positiva, ela será confirmada
				if( $resp->isSuccess() ) {
					$default[0] = "valid";
					$default[1] = "Confirmação anti-spam realizada com sucesso.";
				}else{
					$default[1] = "Erro de confirmação";
				}
			}
		}
		
		$this->_cache = array_merge( $this->_cache, array( array( "status" => $default[0], "type" => $args[ "type" ], "name" => $args["name"], "message" => $default[1] ) ) );
		
	}
	
	//Define os campos para validação
	public function setNewRequestField( $field = array() ) {
			
		$defaults = $this->_defaults;
		
		//Verifica se os argumentos são vetores, se não forem os argumentos serão os argumentos padrão da classe
		if( !is_array( $field ) )
			$field = array();
		
		if( $field[ "type" ] != "recaptcha" )
			$field = array_merge( $defaults, $field );
		
		$this->_fields = array_merge( $this->_fields, array( count( $this->_fields ) => $field ) );
		
	}
	
	//Define o método de requisição que será usado para a validação
	public function setRequestMethod( $method ) {
		
		if( !empty( $method ) && in_array( $method, array( "post", "get" ) ) )
			$this->_requestMethod = $method;
		
	}
	
	//Define o inicializador padrão da validação
	public function setRequestStarter( $code ) {
		if( !empty( $code ) || !is_array( $code ) )
			$this->_requestStarter = $code;
	}
	
	//Retorna toda a estrutura dos campos que serão validados
	public function getRequestStructure() {
		return $this->_fields;
	}
	
	//Retorna a resposta após a validação, sendo elas erros ou não
	public function getResponse() {
		
		//Busca as respostas de validação
		$response = $this->_cache;
		
		//Se não existirem respostas, retornará o padrão para informar que o campo ainda não foi validado
		if( count( $response ) == 0 ) {
			foreach( $this->getRequestStructure() as $field => $set ) {
				$response = array_merge( $response, array( array( "status" => "not_validated", "type" => $set["type"], "name" => $set["name"], "message" => "Este campo ainda não foi validado" ) ) );
			}
		}
		
		return $response;
		
	}
	
	//Retorna o contador de erros
	public function getErrosCount() {
		
		$response = $this->_cache;
		$count = false;
		
		for( $i = 0; $i < count( $response ); $i++ ) {
			
			if( $response[ $i ][ "status" ] == "invalid" )
				$count = ( $count == false ) ? 1 : ( $count + 1 );
			
		}
		
		if( count( $response ) > 0 && $count == false )
			$count = 0;
		
		return $count;
		
	}
	
	//Inicia a validação
	public function validateOptimizers() {
		
		//Continua somente se o inicializador padrão existir
		if( isset( $_REQUEST[ $this->_requestStarter ] ) ) {
			
			//Laço que verifica a estrutura dos campos e os envia para a validação de acordo com seu tipo
			foreach( $this->_fields as $id => $set ) {
				
				if( $set[ "type" ] == "recaptcha" ) {
					$this->validateReCaptcha( $set );
				} else {
					
					//Verifica se o tipo de validação informado é válido
					$optimizer = $this->checkOptimizer( $set["optimizeto"] );
					
					if( $optimizer == "name" )
						$this->validateOptimizerName( $set );
					elseif( $optimizer == "email" )
						$this->validateOptimizerEmail( $set );
					else
						$this->validateOptimizerNone( $set );
					
				}
								
			}
			
		}
		
	}
	
	
}