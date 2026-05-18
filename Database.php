<?php

class Database
{
	public $conn;

	/**
	 * Database constructor.
	 *
	 * @param array $config
	 */
	public function __construct($config)
	{
		$dsn = "mysql:host={$config['host']};port={$config['port']};dbname={$config['dbname']}";

		$options = [
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
			PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
		];

		try {
			$this->conn = new PDO($dsn, $config['username'], $config['password'], $options);
		} catch (PDOException $e) {
			throw new Exception("Database connection failed: " . $e->getMessage());
		}
	}

	/**
	 * Execute a SQL query and return the results.
	 *
	 * @param string $query
	 * @return PDOStatement
	 * @throws Exception
	 */
	public function query($query, $params = [])
	{
		try {
			$sth = $this->conn->prepare($query);

			// Bind named parameters if provided
			foreach ($params as $key => $value) {
				$sth->bindValue(":" . $key, $value);
			}

			$sth->execute();
			return $sth;
		} catch (PDOException $e) {
			throw new Exception("Query failed: " . $e->getMessage());
		}
	}
}
