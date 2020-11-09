<?php


class Pessoa {
	public $nome;
	public function falar(){
		return "O meu nome é " . $this->nome;
	}
}

class Carro {
	private $modelo;
	private $motor;
	private $ano;

	public function getModelo(){
		return $this->modelo;
	}

	public function setModelo($modelo){
		$this->modelo = $modelo;

	}

	public function getMotor(){
		return $this->motor;
	}

	public function setMotor($motor){
		$this->motor = $motor;
	}

	public function getAno(){
		return $this->ano;
	}

	public function setAno($ano){
		$this->ano = $ano;
	}

	public function exibir(){
		return array(
			"modelo"=>$this->getModelo(),
			"motor"=>$this->getMotor(),
			"ano"=>$this->getAno()
		);
	}
}

$gol = new Carro();
$gol->setModelo("Gol GT");
$gol->setMotor("1.6");
$gol->setAno("2020");

//print_r($gol->exibir());

class Documento {
	private $numero;

	public function getNumero(){
		return $this->numero;
	}

	public function setNumero($numero){
		$validacao = Documento::validarCPF($numero);

		if($validacao === false) {
			throw new Exception("O CPF informado não é válido");
		}

		$this->numero = $numero;
	}

	public static function validarCPF($cpf) {
		if(empty($cpf)) {
        return false;
    }
 
    $cpf = preg_match('/[0-9]/', $cpf)?$cpf:0;

    $cpf = str_pad($cpf, 11, '0', STR_PAD_LEFT);
     
    
    if (strlen($cpf) != 11) {
        echo "length";
        return false;
    }
    
    else if ($cpf == '00000000000' || 
        $cpf == '11111111111' || 
        $cpf == '22222222222' || 
        $cpf == '33333333333' || 
        $cpf == '44444444444' || 
        $cpf == '55555555555' || 
        $cpf == '66666666666' || 
        $cpf == '77777777777' || 
        $cpf == '88888888888' || 
        $cpf == '99999999999') {
        return false;

     } else {   
         
        for ($t = 9; $t < 11; $t++) {
             
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf{$c} * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf{$c} != $d) {
                return false;
            }
        }
 
        return true;
    	}
	}
}

class Endereco {
	private $logradouro;
	private $numero;
	private $cidade;

	public function __construct($a, $b, $c){
		$this->logradouro = $a;
		$this->numero = $b;
		$this->cidade = $c;
	}

	public function __destruct(){

	}
}

$novoEndereco = new Endereco("Rua 2", "L23", "Brasilia");

class Pessoas {
	public $nome = "Rasmus Lerdorf";
	protected $idade = 48;
	private $senha = "123456";

	public function verDados(){
		echo $this->nome . "<br/>";
		echo $this->idade . "<br/>";
		echo $this->senha . "<br/>";
	}
}

class Programador extends Pessoas {
	public function verDados(){

		echo get_class($this) . "<br/>";

		echo $this->nome . "<br/>";
		echo $this->idade . "<br/>";
		echo $this->senha . "<br/>";
	}
}

class Document {
	private $numero;

	public function getNumero(){
		return $numero;
	}

	public function setNumero($numero){
		$this->numero = $numero;
	}
}

class CPF extends Documento {
	public function validar() {
		$numeroCPF = $this->getNumero();

		return true;
	}
}

interface Veiculo {
	public function acelerar($velocidade);
	public function freiar($velocidade);
	public function trocarMarcha($marcha);
}

class Civic implements Veiculo {
	public function acelerar($velocidade){
		echo "O veículo acelerou até " . $velocidade . " km/h" . "</br>";
	}

	public function freiar($velocidade){
		echo "O veiculo freiou até " . $velocidade . " km/h" . "</br>";
	}

	public function trocarMarcha($marcha){
		echo "O veiculo trocou para " . $marcha . " marcha" . "</br>";
	}
}

$car = new Civic();
$car->acelerar("150");
$car->freiar("10");
$car->trocarMarcha("5");

// $cpf = new Documento();
// $cpf->setNumero('05083912104');
//var_dump(Documento::validarCPF("05083912104"));
?>