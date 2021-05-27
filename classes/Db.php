<?php

namespace classes;

class DB {
	
	const DB_HOSTNAME = "localhost";
	const DB_USERNAME = "root";
	const DB_PASSWORD = "";
	const DB_NAME = "shop";
	const CHARSET = "utf8";
	
	private $link;

	public function __construct() {
		$this->connect();
	}

	public function connect() {
		try {
			$dsn = 'mysql:host=' . self::DB_HOSTNAME . ';dbname=' . self::DB_NAME . ';charset=' . self::CHARSET;
			
			$this->link = new \PDO($dsn, self::DB_USERNAME, self::DB_PASSWORD);

			return $this;
		} catch(PDOException $e) {
			exit('Error connection to DataBase');
		}
	}

	public function execute($sql) {
		$sth = $this->link->prepare($sql);

		return $sth->execute();
	}

	public function query($sql) {
		$sth = $this->link->prepare($sql);

		$sth->execute();

		$result = $sth->fetchAll(\PDO::FETCH_ASSOC);

		if ($result === false) {
			return [];
		}

		return $result;
	}

	public function closeConnect() {
		$this->link = null;

		unset($_POST);
	}

}

?>