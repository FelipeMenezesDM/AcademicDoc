<?php namespace controller; //Define o pacote da classe

/**
 * A classe "academicdocMain" é responsável por validar as notas das avaliações
**/
class academicdocMain {
	
	//Atributos principais que armazenam as notas informadas para validação
	private $_ap1 = false,
			$_ap2 = false,
			$_ap3 = false;
	
	//Vetores que recerem os erros de validação e as pendências, com os seus respectivos valores
	private $_error = array(),
			$_pendencies = array();
	
	
	//Média por disciplina
	private $_average = '-';
	
	//Situação por disciplina
	private $_status = '-';
	
	//Título da disciplina (Se o título não for informado, a classe retornará "Sem título")
	private $_subject = 'Sem título';
	
	static $_pendenciesNum = '-';
	
	/**
	 * Vetores da tabela de observações
	 * Vetores que armazenam maior e menor notas, maior e menor médias, maior e menor pendências
	**/
	static $_highest = array( "subject" => "---", "test" => "---", "score" => "---" ),
	       $_lowest = array( "subject" => "---", "test" => "---", "score" => "---" ),
		   $_hAverage = array( "subject" => "---", "score" => "---" ),
		   $_lAverage = array( "subject" => "---", "score" => "---" ),
		   $_hPendency = array( "subject" => "---", "test" => "---", "score" => "---" ),
		   $_lPendency = array( "subject" => "---", "test" => "---", "score" => "---" );
	
	
	//Método que verifica se o valor informado é válido para cálculo
	private function checkFloatVal( $value, $ap = 'ap1' ) {
		
		//STR_REPLACE está substituindo as vírgulas (,) por pontos (.), para que os valores sejam do tipo "float"
		$value = str_replace( ",", '.', $value );
		
		//Se o valor for igual a 0, o método retornará imediatamente "verdadeiro"
		if( $value == "0" )
			return true;
		
		//Se o valor for vazio (vazio != nulo), o método retornará imediatamente "falso"
		if( empty( $value ) )
			return false;
		
		
		if( !is_numeric( $value ) ) { //IS_NUMERIC Verifica se o valor é realmente um número
			$error = 'as notas das avaliações são dadas por números de 0 a 10.';
		}elseif( floatval( $value ) < 0 ) { //FLOATVAL transforma o valor para o tipo "float" e verifica se esse valor é um valor positivo
			$error = 'as notas das avaliações valem, no mínimo, 0.';
		} elseif( floatval( $value ) > 10 ) { //FLOATVAL transforma o valor para o tipo "float" e verifica se esse valor não ultrapassa o limite de 10
			$error = 'as notas das avaliações valem, no máximo, 10.';
		}
		
		//Se algum erro existir, ele é guardado no vetor de erros e o método retorna "false"
		if( isset( $error ) ) {
			$this->_error[ $ap ] = '"' . $value . '" é inválido, pois ' . $error;
			return false;
		}
		
		//Se não houver nenhum erro, o método retornará "verdadeiro" e a validação de notas será bem sucedida
		return true;
		
	}
	
	//Metódo que atualiza os vetores da tabela de pendências
	private function updateGlobalValues() {
		
		/**
		 * Vetor onde é buscada a menor nota possível
		 * Para evitar erros, as notas da AP1, AP2 e AP3 que forem iguais a "false" (ou seja, que não tenham sido informadas), a valor padrão será "-1".
		**/
		$ap_max = array(
			"AP1" => ( $this->_ap1 === false ? -1 : $this->_ap1 ),
			"AP2" => ( $this->_ap2 === false ? -1 : $this->_ap2 ),
			"AP3" => ( $this->_ap3 === false ? -1 : $this->_ap3 )
		);
		
		/**
		 * Vetor onde é buscada a maior nota possível.
		 * Para evitar erros, as notas da AP1, AP2 e AP3 que forem iguais a "false" (ou seja, que não tenham sido informadas), a valor padrão será "11".
		**/
		$ap_min = array(
			"AP1" => ( $this->_ap1 === false ? 11 : $this->_ap1 ),
			"AP2" => ( $this->_ap2 === false ? 11 : $this->_ap2 ),
			"AP3" => ( $this->_ap3 === false ? 11 : $this->_ap3 )
		);
		
		//Busca o menor valor existente no vetor $ap_min
		$min = min( $ap_min );
		
		//Busca o maior valor existente no vetor $ap_max
		$max = max( $ap_max );
		
		//$lowest armazena a maior nota informada, enquanto $highest armazena a maior nota. Estes são valores estáticos para a classe academicdocMain
		$lowest = academicdocMain::$_lowest;
		$highest = academicdocMain::$_highest;
		
		
		/**
		 * Atualiza o valor da menor nota alcançada
		 * Ele só será atualizado se as condições forem satisfeitas
		 * 1. O valor de $min deve ser menor que 11, pois 11 é um valor inválido para qualquer avalização
		 * 2. Obrigatoriamente, o valor deve ser igual a "---" OU menor ou igual ao valor que já existe como a menor nota da classe.
		**/
		if( $min < 11 && ( $lowest[ "score" ] === "---" || $min <= floatval( $lowest[ "score" ] ) ) ) {
			//Atualiza o valor da menor nota
			academicdocMain::$_lowest[ "score" ] = ( ( $min === false ) ? "---" : $min );
			//Atualiza a avalização que possui esse valor
			academicdocMain::$_lowest[ "test" ] = array_search( $min, array_reverse( $ap_min ) );
			//Atualiza a disciplina que possui esse valor
			academicdocMain::$_lowest[ "subject" ] = $this->_subject;
		}
			
			
		/**
		 * Atualiza o valor da maior nota alcançada
		 * Ele só será atualizado se a condição for satisfeita
		 * 1. Esse valor $max deve ser maior ou igual ao valor que já existe como a maior nota da classe
		**/
		if( $max >= floatval( $highest[ "score" ] ) ) {
			academicdocMain::$_highest[ "score" ] = ( $max === false ? "---" : $max );
			academicdocMain::$_highest[ "test" ] = array_search( $max, array_reverse( $ap_max ) );
			academicdocMain::$_highest[ "subject" ] = $this->_subject;
		}
		
	}
	
	//Metodo para arrendondar números com uma casa decimal
	private function roundNumbers( $num = 0 ) {
		
		return floatval( number_format( $num, 1 ) );
		
	}
	
	
	//Quanto pelo menos uma nota não é informada, esse metódo é responsável por calcular as pendências
	private function partialResults() {
		
		/**
		 * Variáveis que armazenam o valor das notas
		 * Quanto o valor das notas for igual a "falso", ou seja, quando uma nota não é informada, seu valor será "0", para que não haja erro no calculo da média.
		**/
		$ap1 = ( $this->_ap1 !== false ? $this->_ap1 : 0 );
		$ap2 = ( $this->_ap2 !== false ? $this->_ap2 : 0 );
		$ap3 = ( $this->_ap3 !== false ? $this->_ap3 : 0 );
		
		//Calcula a média de acordo com as regras estatísticas da faculdade
		$media = ( ( $ap1 * 0.3 ) + ( $ap2 * 0.3 ) + ( $ap3 * 0.4 ) );
		
		//$num divide a média por "2", para que as notas pendentes sejam calculadas quando duas avalizações não são informadas
		$num = ( 5 - $media ) / 2;
		
		/**
		 * $num1 calcula o valor que deve ser alcançado na pendência, caso essa pendência seja para a AP1 ou AP2, com peso de 30%.
		 * Além disso, $num1 ainda tranforma esse valor em número do tipo "float" com, no máximo, duas casas após a vírgula.
		**/
		$num1 = $this->roundNumbers( ( ( $num * 100 ) / 30 ) );
		
		/**
		 * $num2 calcula o valor que deve ser alcançado na pendência, caso essa pendência seja para a AP3, com peso de 40%.
		 * Além disso, $num2 ainda tranforma esse valor em número do tipo "float" com, no máximo, duas casas após a vírgula.
		**/
		$num2 = $this->roundNumbers( ( ( $num * 100 ) / 40 ) );
		
		//Se todas as notas não houverem sido informadas, as pendências serão calculadas imediatamente e seus valores serão de "5" pontos.
		if( $this->_ap1 === false && $this->_ap2  === false && $this->_ap3 === false ) {
			$this->_pendencies = array( "AP1" => 5, "AP2" => 5, "AP3" => 5 );
		}else{
			//Se a AP3 e se a AP1 OU a AP2 não forem informadas, as pendências receberam valores de $num2 e $num1, respectivamente
			if( $this->_ap3  === false && ( $this->_ap1 === false || $this->_ap2 === false ) ) {
				$this->_pendencies = array( ( $this->_ap1 === false ? 'AP1' : 'AP2' ) => $num1, "AP3" => $num2 );
			}
			//Se a AP3 for informada, mas a AP1 e a AP3 não, ambas pendências receberão o valor de $num1
			elseif( $this->_ap1 === false && $this->_ap2 === false ) {
				$this->_pendencies = array( "AP1" => $num1, "AP2" => $num1 );
			}
			//Se somente a AP3 não for informada, a pendência receberá o valor de $num2
			elseif( $this->_ap3 === false ) {
				$num2 = $this->roundNumbers( ( ( ( 5 - $media ) * 100 ) / 40 ) );
				$this->_pendencies[ "AP3" ] = ( $num2 < 0 ? 0 : $num2 );
			}
			//Se somente a AP1 OU somente a AP2 não for informada, a pendência redemerá o valor de $num1
			elseif( $this->_ap1 === false || $this->_ap2 === false ) {
				$num2 = $this->roundNumbers( ( ( ( 5 - $media ) * 100 ) / 30 ) );
				$this->_pendencies[ ( $this->_ap1 === false ? 'AP1' : 'AP2' ) ] = ( $num2 < 0 ? 0 : $num2 );
			}
		}
		
		//Aqui, os valores da maior e maior pendências são atualizados, semelhante ao que acontece no método updateGlobalValues();
		$min = min( $this->_pendencies );
		$max = max( $this->_pendencies );
		
		$lowest = academicdocMain::$_lPendency;
		$highest = academicdocMain::$_hPendency;
		
		if( $lowest[ "score" ] === "---" || $min <= floatval( $lowest[ "score" ] ) ) {
			academicdocMain::$_lPendency[ "score" ] = ( ( $min === false ) ? "---" : $min );
			academicdocMain::$_lPendency[ "test" ] = array_search( $min, array_reverse( $this->_pendencies ) );
			academicdocMain::$_lPendency[ "subject" ] = $this->_subject;
		}
		
		
		if( $max >= floatval( $highest[ "score" ] ) ) {
			academicdocMain::$_hPendency[ "score" ] = ( $max === false ? "---" : $max );
			academicdocMain::$_hPendency[ "test" ] = array_search( $max, array_reverse( $this->_pendencies ) );
			academicdocMain::$_hPendency[ "subject" ] = $this->_subject;
		}
		
		//Atualiza o contador de pendências de acordo com o número que foi encontrado neste objeto, somando-se com o valor estático já existente
		academicdocMain::$_pendenciesNum += count( $this->_pendencies );
		
	}
	
	//Quando todas as notas são informadas e são válidas, esse método é o responsável por calcular as médias por disciplina e determinar a situação na questão de aprovação
	private function fullResults() {
		
		//Calcula a média ponderada
		$media = ( ( $this->_ap1 * 0.3 ) + ( $this->_ap2 * 0.3 ) + ( $this->_ap3 * 0.4 ) );
		
		//Atualiza a média que a disciplina atual obteve
		$this->_average = $this->roundNumbers( $media );
		
		/**
		 * Atualiza os valores da maior média na tabela de obervações
		 * Atualiza somente se a maior média atual não existir ou se $media for maior que a média já existente
		**/
		if( academicdocMain::$_hAverage[ "score" ] == "---" || $media >= academicdocMain::$_hAverage[ "score" ] ) {
			academicdocMain::$_hAverage[ "score" ] = $this->roundNumbers( $media );
			academicdocMain::$_hAverage[ "subject" ] = $this->_subject;
		}
		
		/**
		 * Atualiza os valores da menor média na tabela de obervações
		 * Atualiza somente se a menor média atual não existir ou se $media for menor que a média já existente
		**/
		if( academicdocMain::$_lAverage[ "score" ] == "---" || $media <= academicdocMain::$_lAverage[ "score" ] ) {
			academicdocMain::$_lAverage[ "score" ] = $this->roundNumbers( $media );
			academicdocMain::$_lAverage[ "subject" ] = $this->_subject;
		}
		
		//Se a média for maior ou igual a 5, determina-se que a situação é "Aprovado", senão, determina-se que a situação é "Reprovado"
		if( $this->_average >= 5 )
			$this->_status = 'Aprovado';
		else
			$this->_status = 'Reprovado';
			
		
	}
	
	
	/**
	 * SETTERS AND GETTERS
	**/
	
	//Deternima o valor da AP1 somente se o valor for válido
	public function setAp1( $ap1 ) {
		if( $this->checkFloatVal( $ap1 ) )
			$this->_ap1 = floatval( str_replace( ',', '.', $ap1 ) );
	}
	
	//Deternima o valor da AP2 somente se o valor for válido
	public function setAp2( $ap2 ) {
		if( $this->checkFloatVal( $ap2, 'ap2' ) )
			$this->_ap2 = floatval( str_replace( ',', '.', $ap2 ) );
	}
	
	//Deternima o valor da AP3 somente se o valor for válido
	public function setAp3( $ap3 ) {
		if( $this->checkFloatVal( $ap3, 'ap3' ) )
			$this->_ap3 = floatval( str_replace( ',', '.', $ap3 ) );
	}
	
	//Deternima o título da disciplina cujas notas estão sendo calculadas
	public function setSubjectTitle( $subject ) {
		$this->_subject = $subject;
	}
	
	//Se o valor de AP1 existir, ou seja, se não for igual a "falso", o método retornará este, caso contrário, retornará "-"
	public function getAp1() {
		return ( ( $this->_ap1 === false ) ? '-' : $this->_ap1 );
	}
	
	//Se o valor de AP2 existir, ou seja, se não for igual a "falso", o método retornará este, caso contrário, retornará "-"
	public function getAp2() {
		return ( ( $this->_ap2 === false ) ? '-' : $this->_ap2 );
	}
	
	//Se o valor de AP3 existir, ou seja, se não for igual a "falso", o método retornará este, caso contrário, retornará "-"
	public function getAp3() {
		return ( ( $this->_ap3 === false ) ? '-' : $this->_ap3 );
	}
	
	
	//Retorna todos os error de validação encontrados
	public function getErrors() {
		return $this->_error;
	}
	
	//Retorna as pendências
	public function getPendencies() {
		return $this->_pendencies;
	}
	
	//Retorna o contador de pendências geral da classe "academicdocMain"
	public function getPendenciesNum() {
		return academicdocMain::$_pendenciesNum;
	}
	
	//Retorna as informações da maior nota geral como um objeto
	public function getHighest() {
		return (object)academicdocMain::$_highest;
	}
	
	//Retorna as informações da menor nota geral como um objeto
	public function getLowest() {
		return (object)academicdocMain::$_lowest;
	}
	
	//Retorna as informações da maior média geral como um objeto
	public function getHighestAverage() {
		return (object)academicdocMain::$_hAverage;
	}
	
	//Retorna as informações da menor média geral como um objeto
	public function getLowestAverage() {
		return (object)academicdocMain::$_lAverage;
	}
	
	//Retorna as informações da maior pendência geral como um objeto
	public function getHighestPendency() {
		return (object)academicdocMain::$_hPendency;
	}
	
	//Retorna as informações da menor pendência geral como um objeto
	public function getLowestPendency() {
		return (object)academicdocMain::$_lPendency;
	}
	
	
	//Retorna o valor da média obtida na disciplina cujas notas estão sendo calculadas
	public function getAverage() {
		return $this->_average;
	}
	
	//Retorna a situação quanto a alcançada - ou não - na disciplina cujas notas estão sendo calculadas
	public function getStatus() {
		return $this->_status;
	}
	
	//Inicia os calculos
	public function calculate() {
		
		//Inicia a atualização dos valores gerais da classe "academicdocMain"
		$this->updateGlobalValues();
		
		//Quando pelo menos uma das notas não é informada, os cálculos são feitos a partir de pendências
		if( $this->_ap1 === false || $this->_ap2 === false || $this->_ap3 === false ) {
			$this->partialResults();
		}
		//Caso contrário, o cálculo será realizado a partir das notas
		else{
			$this->fullResults();
		}
		
	}
	
}