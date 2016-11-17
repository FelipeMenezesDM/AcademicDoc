<?php namespace controller; //Define o pacote da classe

/**
 * A classe "addForms" é responsável por estruturar formulários
 * Ela extende a classe "validadeForms", que valida os campos cadastrados
**/

class addForms extends validadeForms {
	
	//Propriedade que define a estrutura básica dos campos de validação do formulário
	private $_field = array(
		"type"       => "text", //Define o tipo do campo
		"optimizeto" => "", //Define qual o tipo de validação (name, email, text)
		"id"         => "", //Define uma ID para o campo
		"name"       => "", //Define o nome do campo que será validado
		"class"      => "", //Define uma classe para o campo
		"value"      => "", //Define um valor padrão para o campo
		"legend"     => "", //Define uma legenda para a estrutura HTML do campo
		"required"   => false, //Define se o campo é obrigatório ou não
		"rows"       => 4, //Se o campo for do tipo "área de texto", define quantas linhas está deve ter
		"clone"      => "", //Define se o campo deve ser comparado com um outro, ou seja, se os valores devem ser compatíveis
		"remember"   => true, //Define se o valor anterior deve permanecer exposto no campo quando o formulário é submetido
		"submit"     => false, //Se i campo for do tipo "botão", define se esse botão é quem submete os valores do formulário
	);
	
	//Propriedade que define a estrutura básica do formulário
	private $_form = array(
		"id"             => "newForm", //Define uma ID para o formulário
		"name"           => "newForm", //Define um nome para o formulário que será validado
		"method"         => "post", //Define o método de requisição
		"action"         => "", //Define a url onde será executada a validação
		"validate"       => true, //Deternima se o formulário será validado ou não
	);
	
	//Armazena os erros do formulário
	private $_formCache = false;
	
	//Faz as contagem de erros do formulário
	private $_errorsCount = false;
	
	//Armazena a estrutura do formulário (campo, títulos e HTML livre)
	private $_structure = array();
	
	//Deternima a função que deve ser executada caso a validação do formulário seja bem-sucedida
	private $_afterValidation = NULL;
	
	
	
	/**
	 * Busca a resposta da validação de cada campo do formulário fornecida pela superclasse "validateForms"
	 * Recebe o parâmetro $fieldid correspondente ao indice do campo para o qual se busca uma resposta
	**/
	private function getValidationResponse( $fieldid = 0 ) {
		
		//Armazena todas as respostas
		$response = $this->getResponse();
		
		//Varíavel que armazena a estrutura HTMl da resposta que será mostrada
		$html = "";
		
		//Verifica se o índice existe na resposta e só retorna a estrutura HTML se o estatus da resposta for negativo
		if( isset( $response[ $fieldid ] ) && $response[ $fieldid ]["status"] == "invalid" ) {
			$html = '<p id="fieldMessageCache" class="field-message type-invalid show">' . $response[ $fieldid ]["message"] . '</p>';
		}
		
		return $html;
			
	}
	
	//Verifica se os campos obrigatórios foram devidamente informados
	private function checkPostValue( $field, $value = "", $type = "", $remember ) {
		
		//Armazena o valor do campo de acordo com o método de requisição que o formulário está utilizando
		@$request = ( $this->_form["method"] == "get" ) ? $_GET[$field] : $_POST[$field];
		
		/**
		 * Verifica se o campo obrigatório existe
		 * Verifica se o campo não está em branco
		 * Verifica se o valor deve ser exposto após a submição, retornando os valores de campos que não são do tipo "senha" (password)
		**/
		if( isset( $request ) && !empty( $request ) && $remember == true && $type != "password" ) 
			return $request;
		else
			return $value;
			
		
		
	}
	
	//Retorna toda estrutura do formulário
	public function getTheStructure() {
		return $this->_structure;
	}
	
	//Define um novo campo para o formuálrio
	public function setNewField( $set = array() ) {
		
		//Define os tipos permitidos para os campos
		$types = array( "text", "email", "textarea" );
		
		//$defaults armazena a estrutura padrão dos campos do formulário
		$defaults = $this->_field;
		
		//Verifica se os argumentos em $set são vetores. Se não forem, os argumentos serão automaticamente a estrutura padrão
		if( !is_array( $set ) )
			$set = $defaults;
		
		//Verifica se o tipo de campo informado nos argumentos é válido. Se não for, ele será transformado para o padrão "texto"
		if( !isset( $set[ "type" ] ) || !in_array( $set[ "type" ], $types ) )
			$type = "text";
			
		//Concatena os argumentos passados por parâmetro com os padronizados, ou seja, cria um novo vetor de configuração juntando os argumentos com os padrões da classe
		$newfield = array_merge( $defaults, $set );
		
		//Adiciona o novo campo à estrutura do formulário
		$this->_structure = array_merge( $this->_structure, array( count( $this->_structure ) => $newfield ) );
		
	}
	
	//Adiciona um novo formulário
	public function setNewForm($form = array()) {
		
		//Verifica se os argumentos em $set são vetores. Se não forem, os argumentos serão automaticamente a estrutura padrão
		if( !is_array( $form ) )
			$form = array();
		
		//Concatena os arqumentos repassados por parâmetro com os padronizados, ou seja, cria um novo vetor de configuração juntando os argumentos com os padrões da classe
		$this->_form = array_merge( $this->_form, $form );
		
	}
	
	//Adiciona uma estrutura HTML livre ao corpo do formuário
	public function setFreeHtml( $html = "" ) {
		
		if( !is_string( $html ) )
			$html = "";
			
		$this->_structure = array_merge( $this->_structure, array( count( $this->_structure ) => array( "type" => "html", "content" => htmlentities( $html ) ) ) );
	
	}
	
	//Adiciona um validador anti-spam ReCaptcha
	public function setReCaptcha( $args = array() ) {
		
		/**
		 * Por padrão, os validadores ReCaptcha utilizam certas chaves de acesso para confirmar que a página é uma página autêntica
		 * Essas chaves podem ser obtidas no site do ReCaptcha, com o suporte da Google
		**/
		$defaults = array( "site_key" => "", "secret_key" => "" );
		
		if( !is_array( $args ) )
			$args = array();
		
		//Concatena os arqumentos repassados por parâmetro com os padronizados, ou seja, cria um novo vetor de configuração juntando os argumentos com os padrões da classe
		$newcaptcha = array_merge( $defaults, $args );
		
		//Os valores padrões são obrugatórios, por isso, se algum deles não for informado corretamente, o ReCaptcha não será inicializado
		if( !empty( $args[ "site_key" ] ) && !empty( $args[ "secret_key" ] ) ) {
			
			$this->_structure = array_merge( $this->_structure, array( count( $this->_structure ) => array( "type" => "recaptcha", "settings" => $args ) ) );
			
		}
		
	}
	
	//Retorna a estrutura HTML de campos adicionados ao formulário
	private function getFieldHtml( $args = false, $id = -1 ) {
		
		//Se os argumentos passados por parâmetro não existirem ou se não forem um array, os argumentos padrão serão usados
		$args = ( $args == false || !is_array( $args ) ) ? $this->_fields : $args;
		
		//Envia o valor do campo para verificação
		$value = $this->checkPostValue( $args['name'], $args['value'], $args['type'], $args['remember'] );
		
		//Inicia a estrutura HTML com a legenda
		$output = '<div id="field"><label>' . ( ( !empty( $args[ "legend" ] ) ) ? '<span id="legend">' . $args[ "legend" ] . '</span>' : '' );
		
		//Verifica se o campo é uma área de texto e concatena a respectiva estrutura HTML à legenda
		if( $args[ "type" ] == "textarea" ) {
			$output .= '<textarea name="' . $args[ "name" ] . '" id="' . $args[ "id" ] . '" class="' . $args[ "class" ] . '" rows="' . $args[ "rows" ] . '">' . $value . '</textarea>';
		} else {
			$output .= '<input type="' . ( ( $args[ "optimizeto" ] == "email" ) ? 'email' : $args[ "type" ] ) . '" name="' . $args[ "name" ] . '" class="' . $args[ "class" ] . '" id="' . $args[ "id" ] . '" ' . ( ( !empty( $value  ) ) ? 'value="' . $value . '" ' : '' ) . '/>';
		}
		
		//Finaliza a legenda
		$output .= '</label></div>';
		
		//Concatena possíveis erros de validação do campo
		$output .= $this->getValidationResponse( $id );
		
		//Retorna a estrutura HTML
		return $output;
		
	}
	
	//Retorna a estrutura HTML de botões adicionados ao formulário
	private function getButtonHtml( $args = array() ) {
		
		$output = '<input type="' . ( ( $args[ "submit" ] == true ) ? 'submit' : 'button' ) . '" id="' . $args[ "id" ] . '" class="' . $args[ "class" ] . '" ' . ( ( !empty( $args[ "value" ] ) ) ? 'value="' . $args[ "value" ] . '" ' : '' ) . '/>';
		return $output;
		
	}
	
	//Inicializa o validador ReCaptcha adicionado ao formulário 
	private function getReCaptcha( $args = array(), $id = -1 ) {
		
		$output = '<div id="captcha"><div class="g-recaptcha" data-sitekey="' . $args[ "site_key" ] . '"></div>';
		$output .= $this->getValidationResponse( $id ) . '</div>';
		
		return $output;
		
	}
	
	//Retorna uma contagem de erros
	public function getErrors() {
		return $this->_errorsCount;
	}
	
	//Retorna a estrutura HTML dos erros de validação do formulário
	private function getFormCache() {
		
		$response = "";
		
		//Retorna a estrutura HTML somente se o erro existir
		if( $this->_formCache != false ) {
			$response = '<div id="formCacheMessages" class="form-messages status-' . ( ( $this->_formCache[0] == true ) ? 'valid' : 'invalid' ) . '">' . $this->_formCache[1] . '</div>';
		}
		
		return $response;
		
	}
	
	//Define a função que deve ser iniciada após a validação do formulário ocorrer sem erros
	public function afterValidation( $func ) {
		$this->_afterValidation = $func;
	}
	
	
	//Inicia a validação do formulário
	private function validateForm() {
		
		//Busca toda a estrutura do formulário
		$fields = $this->_structure;
		
		//Define o inicializador padrão para a validação do formulário
		$this->setRequestStarter( md5( $this->_form[ "id" ] ) );
		
		//Define o método de requisição que será usado
		$this->setRequestMethod( $this->_form[ "method" ] );
		
		//Laço para cadastrar os campos que serão validados
		for( $i = 0; $i < count( $fields ); $i++ ) {
			
			$field = $fields[ $i ];
			
			//Se for um validador ReCaptcha, validação ocorre por um método especial
			if( $field[ "type" ] == "recaptcha" ) {
				$this->setNewRequestField( array( "name" => "captcha", "type" => "recaptcha", "site_key" => $field[ "settings" ][ "site_key" ], "secret_key" => $field[ "settings" ][ "secret_key" ] ) );
			} else {
				
				//Verifica se o campo é obrigatório
				$required = ( !isset( $field[ "required" ] ) ) ? false : $field[ "required" ];
				
				//Verifica se o campo é um clone
				$clone = ( !isset( $field[ "clone" ] ) ) ? "" : $field[ "clone" ];
				
				//Define o tipo de validação para o campo
				$optimizeto = ( !isset( $field[ "optimizeto" ] ) ) ? "none" : $field[ "optimizeto" ];
				
				//Cadastra para validação somente os campos de texto e as áreas de texto
				if( $field[ "type" ] != "button" && $field[ "type" ] != "html" ) {
					$this->setNewRequestField( array( "name" => $field["name"], "type" => $field[ "type" ], "optimizeto" => $optimizeto, "required" => $required, "clone" => $clone ) );
				}
			
			}
							
		}
		
		//Inicializa a validação
		$this->validateOptimizers();
		
		//Busca o contador de erros de validação
		$this->_errorsCount = $this->getErrosCount();
		
		//Se a contagem de erros for igual a 0, ou seja, se não houverem erros, uma mensagem será imprimida para indicar que a requisição foi bem sucedida
		if( $this->_errorsCount === 0 ) {
			$this->_formCache = array( true, "Sua requisição foi concluída com êxito." );
			
			//Chama a que deve ser inicada após a validação do formulário, se esta existir
			if( $this->_afterValidation != NULL )
				$this->_formCache = $this->_afterValidation->__invoke();
		} elseif( $this->_errorsCount > 0 ) {
			$this->_formCache = array( false, "O formulário contém erros de validação." );
		}
		
	}
	
	//Retorna o formulário em HTML
	public function getForm() {
		
		//Busca a estrutura do formulário
		$fields = $this->_structure;
		
		//Busca as configurações do formulário
		$form = $this->_form;
		
		//Se o formulário estiver disponível para validação, esta será iniciada
		if( $form[ "validate" ] == true )
			$this->validateForm();
		
		//Busca os erros do formulário
		$output = $this->getFormCache();
		
		//Inicia a estrutura HTML do formulário, definindo suas configurações
		$output .= '<form enctype="multipart/form-data" method="' . $form[ "method" ] . '" action="' . $form[ "action" ] . '" id="' . $form[ "id" ] . '" name="' . $form[ "name" ] . '">';
			
			$id = 0;
			
			//Laço que analiza a estrutura do formulário e concatena o HTML dos campos.
			for( $i = 0; $i < count( $fields ); $i++ ) {
				
				$field = $fields[ $i ];
				
				if( $field[ "type" ] == "html" ) {
					$output .= html_entity_decode( $field[ "content" ] );
				} elseif( $field[ "type" ] == "recaptcha" ) {
					$output .= $this->getReCaptcha( $field[ "settings" ], $id );
					$id++;
				} elseif( $field[ "type" ] == "button" ) {
					$output .= $this->getButtonHtml( $field );
				} else {
					$output .= $this->getFieldHtml( $field, $id );
					$id++;
				}
				
			}
			$output .=
					'<input type="hidden" name="' . md5( $form[ "id" ] ) . '" value="1" />' . //Inicializador padrão para a validação do formulário
					'<input type="hidden" name="request_type" value="form-validation" />'.
					'<input type="hidden" name="the_form" value="contact" />'; //Nome do formulário
		$output .= '</form>';
		
		return $output;
		
	}
	
	
	
}