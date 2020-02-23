<?php
	class Database {
		private $username ;
		private $password ;
		private $database = 'dbProject2020';
		private $hostname = 'localhost';
		private $conn     =  null;


		public function __construct($username, $password) {
			$this->username = $username;
			$this->password = $password;
		}

		public function getConnection() {
			try{
				$this->conn = new PDO("mysql:host=" . $this->hostname . ";dbname=" .$this->database,$this->username,$this->password);
				$this->conn->exec("set names utf8");
			}catch(PDOException $exception) {
				echo "Connection error: " . $exception->getMessage();
			}
			return $this->conn;
		}
	}
?>
