<?php

class Usuario {
	private $idusuario;
	private $deslogin;
	private $dessenha;
	private $dtcadastro;

	public function __construct($Login = '', $password = ''){
		$this->setDeslogin($Login);
		$this->setDessenha($password);
	}

	public function getIdUsuario(){
		return $this->idusuario;
	}

	public function setIdUsuario($idUsuario){
		$this->idusuario = $idUsuario; 
	}

	public function getDeslogin(){
		return $this->deslogin;
	}

	public function setDeslogin($deslogin){
		$this->deslogin = $deslogin; 
	}

	public function getDessenha(){
		return $this->dessenha;
	}

	public function setDessenha($dessenha){
		$this->dessenha = $dessenha; 
	}

	public function getDtCadastro(){
		return $this->dtcadastro;
	}

	public function setDtCadastro($dtcadastro){
		$this->dtcadastro = $dtcadastro; 
	}

	public function loadById($id){
		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_usuarios WHERE idusuario = :ID", array(
			":ID"=>$id
		));

		if (count($results) > 0) {
			$row = $results[0];

			$this->setIdUsuario($row['idusuario']);
			$this->setDeslogin($row['deslogin']);
			$this->setDessenha($row['dessenha']);
			$this->setDtCadastro(new DateTime($row['dtcadastro']));
		}
	}

	public static function getList(){
		$sql = new Sql();

		return $sql->select("SELECT * FROM tb_usuarios ORDER BY idusuario");
	}

	public static function search($Login) {
		$sql = new Sql();

		return $sql->select("SELECT * FROM tb_usuarios WHERE deslogin LIKE :SEARCH ORDER BY deslogin", array(':SEARCH' => "%" . $Login . "%"));
	}

	public function login($Login, $password){
		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_usuarios WHERE deslogin = :LOGIN AND dessenha = :PASSWORD", array(
			":LOGIN"=>$Login,
			":PASSWORD"=>$password,
		));

		if (count($results) > 0) {
			$row = $results[0];

			$this->setIdUsuario($row['idusuario']);
			$this->setDeslogin($row['deslogin']);
			$this->setDessenha($row['dessenha']);
			$this->setDtCadastro(new DateTime($row['dtcadastro']));
		} else {
			throw new Exception("Login e/ou senha inválidos");
		}
	}

	public function setData($data) {
		$this->setIdUsuario($data['idusuario']);
		$this->setDeslogin($data['deslogin']);
		$this->setDessenha($data['dessenha']);
		$this->setDtCadastro(new DateTime($data['dtcadastro']));
	}

	public function insert(){
		$sql = new Sql();

		$results = $sql->select("CALL sp_usuarios_insert(:LOGIN, :PASSWORD)", array(
			":LOGIN" => $this->getDeslogin(),
			":PASSWORD" => $this->getDessenha()
		));

		if (count($results) > 0) {
			$this->setData($results[0]);
		};
	}

	public function update($login, $password){
		$this->setDeslogin($login);
		$this->setDessenha($password);

		$sql = new Sql();

		$results = $sql->query("UPDATE tb_usuarios SET deslogin = :LOGIN, dessenha = :PASSWORD WHERE idusuario = :ID", array(
			":LOGIN" => $this->getDeslogin(),
			":PASSWORD" => $this->getDessenha(),
			":ID" => $this->getIdUsuario()
		));
	}

	public function delete(){
		$sql = new Sql();

		$sql->query("DELETE FROM tb_usuarios WHERE idusuario = :ID", array(
			":ID" => $this->getIdUsuario()
			));

		$this->setIdUsuario(0);
		$this->setDeslogin("");
		$this->setDessenha("");
		$this->setDtCadastro(new DateTime());
	}

	public function __toString(){
		return json_encode(array(
			'idusuario'=> $this->getIdUsuario(),
			'dessenha' => $this->getDessenha(),
			'deslogin' => $this->getDeslogin(),
			'dtcadastro' => $this->getDtCadastro()->format('d/m/Y H:i:s')
		));
	}
}

?>