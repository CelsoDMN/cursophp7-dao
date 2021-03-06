<?php

class Usuario{

	private $id;
	private $deslogin;
	private $dessenha;
	private $dtcadastro;

// Inicio dos Getters and Setters
	public function getId(){
		return $this->id;
	}

	public function setId($value){
		$this->id = $value;
	}


	public function getDeslogin(){
		return $this->deslogin;
	}

	public function setDeslogin($value){
		$this->deslogin = $value;
	}


	public function getDessenha(){
		return $this->dessenha;
	}

	public function setDessenha($value){
		$this->dessenha = $value;
	}


	public function getDtcadastro(){
		return $this->dtcadastro;
	}

	public function setDtcadastro($value){
		$this->dtcadastro = $value;
	}
// Fim dos Getters and Setters

	public function __construct($login="", $senha=""){

			date_default_timezone_set('America/Sao_Paulo');
			$dt = date('Y-m-d H:i:s');
			$this->setDeslogin($login);
			$this->setDessenha($senha);
			$this->setDtcadastro($dt);

	}

	public function __toString(){

		return json_encode(array(
			"id"=>$this->getId(),
			"deslogin"=>$this->getDeslogin(),
			"dessenha"=>$this->getDessenha(),
			"dtcadastro"=>$this->getDtcadastro()->format("d/m/Y H:i:s")
		));
	}

	public function loadById($id){

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_usuarios WHERE id = :ID", array(":ID"=>$id));

		if(count($results) > 0){

			$this->setData($results[0]);
		}
	}

	public function getList(){

		$sql = new Sql();

		return $sql->select("SELECT * FROM tb_usuarios ORDER BY deslogin");
	}

	public static function search($login){

		$sql = new Sql();

		return $sql->select("SELECT * FROM tb_usuarios WHERE deslogin LIKE :SEARCH ORDER BY deslogin",array(':SEARCH'=> "%".$login."%"));

	}

	public function login($login, $senha){

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_usuarios WHERE deslogin = :LOGIN AND dessenha = :SENHA", array(
			":LOGIN"=> $login, 
			":SENHA"=> $senha
		));

		if(count($results) > 0){

			$this->setData($results[0]);


		}

		else{

			throw new Exception("Login e/ou senha invalido");
			
		}
	}

	public function setData($data){

		$this->setId($data['id']);
		$this->setDeslogin($data['deslogin']);
		$this->setDessenha($data['dessenha']);
		$this->setDtcadastro(new DateTime($data['dtcadastro']));

	}

	public function insert(){

		$sql = new Sql();

		$results = $sql->select("CALL sp_usuarios_insert(:LOGIN, :SENHA, :DTCADASTRO)", array(
			':LOGIN'=>$this->getDeslogin(),
			':SENHA'=>$this->getDessenha(),
			':DTCADASTRO'=>$this->getDtcadastro()
		));

		if(count($results) > 0){

			$this->setData($results[0]);
		}

	}

	
}

?>