<?php 

	class Sql extends PDO {
		// Nessa classe como eu posso perceber ela extende do PDO, ou seja, tudo o que o pdo faz essa classe também já sabe fazer, como bind_value, execute, prepare...

		private $conn;

		public function __construct(){
			// Esse método acima é usado para conectar no banco de dados automaticamente

			$this->conn = new PDO("mysql:host=localhost;dbname=dbphp", "root", "");
			// Acima eu estou colocando na minha variável de conexão o new PDO os dados do meu banco de dados; Com isso toda vez que eu chamar minha classe New Sql ela já vai conectar no banco; Muito útil em uma equipe de t.i para quando tiver vários usuários.
		}

		private function setParams($statement, $parameters = array()) {
			// O método acima é para deixar o código mais inteligente, onde eu posso reutilizar os métodos que já foram passados no código abaixo.

			foreach ($parameters as $key => $value) {	

				$this->setParam($statement, $key, $value);
				
			}
}
		private function setParam($statement, $key, $value) {

			$statement->bindParam('$statement', $key, (int) $value);
		}

		public function RunQuery ($rawQuery, $params = array()) {
			// Acima eu tenho o código para conectar no banco de dados, rawquery significa query bruta.

			$stmt = $this->conn->prepare($rawQuery);

			$this->setParams($stmt, $params);

			$stmt->execute($statement = array());
			//Executando o que foi passado.

			return $stmt;

		}

		public function select($rawQuery, $params = array()):array {
		{
			// Método usado caso eu quiser mais de um parâmetro.

			$stmt = $this->RunQuery($rawQuery, $params);
			// Eu chamo novamente meu método query pois nele já tem os parâmetros de que eu preciso, dessa forma eu ñ preciso ficar fazendo o código tudo de novo.

			return $stmt->fetchAll(PDO::FETCH_ASSOC);
			// Depois eu faço um fetchAll retornando meu objeto stmt e nele vou estar dizendo que só é para vim os dados associativos.

		}


	}

}

 ?>