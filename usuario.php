<?php 

class Usuario {

	private $idusuario;
	private $deslogin;
	private $dessenha;
	private $dtcadastro;

	public function getIdusuario () {
		return $this->idusuario;
	}

	public function setIdusuario ($value) {
		return $this-> $value;

	}

	public function getDeslogin () {
		return $this->deslogin;

	}

	public function setDeslogin ($value) {
		return $this-> $value;

	}

	public function getDessenha () {
		return $this->dessenha;

	}

	public function setDessenha ($value) {
		return $this-> $value;

	}

	public function getDtcadastro () {
		return $this->dtcadastro;

	}

	public function setDtcadastro ($value) {
		return $this-> $value;

	}

	public function loadById ($id) {
		$sql = new Sql();

		$results = $sql->select ("select * from tb_usuario where idusuario = :ID", array (":ID=>$id" 

		));

		if (count ($results) > 0) {
			$this->setData($results[0]);    
		
		}

	}


	public static function getList(){

		$sql = new Sql();

		return $sql->select("select * from tb_usuario order by deslogin;");

	}

	public static function search($login) {

		$sql = new Sql ();

		return $sql->select("select * from tb_usuario where deslogin like :search order by deslogin", array(':search'=>"%".$login."%"));
		// Agora esse método vai pegar o que eu digitar nessa variável login, vai colocar a % antes e depois com concatenação, onde siginifica...
		//... Que o método ñ faz diferença se começa com número ou letra; e quando ele for enviado lá para o meu parâmetro que foi preparado...
		//... Para evitar o sql direction é a minha classe que vai adicionar as ''

	}
	
	public function login ($login, $password) {

		$sql = new Sql();

		$results = $sql->select("select * from tb_usuario where deslogin = :LOGIN and dessenha = :PASSWORD", array (
			":LOGIN"=>$login, 
			":PASSWORD "=>$password

		));

		if (count ($results) > 0) {
			$this->setData($results[0]);

		}
	} 

	public function setData($data) {

		$this->setIdusuario($data['idusuario']);
		$this->setDeslogin($data['deslogin']);
		$this->setDessenha($data['dessenha']);
		$this->setDtcadastro($data['dtcadastro']);    

	}

	public function insert () {

		$sql = new Sql();
		$results = $sql->select("CALL sp_usuario_insert(:LOGIN, :PASSWORD)", array (
			//Criando uma procedure, para isso é usado a palavra CALL

			':LOGIN'=>$this->getDeslogin(),
			':PASSWORD'=>$this->getDessenha()

		));

		if (count($results) > 0 ) {
			$this->setData($results[0]);
		}

	}

	public function __toString() {

		return json_encode(array (
			"idusuario"=>$this->getIdusuario(),
			"deslogin"=>$this->getDeslogin(),
			"dessenha"=>$this->getDessenha(),
			"dtcadastro"=>$this->getDtcadastro()

		));

	}

}

 ?>