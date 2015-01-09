<?php

class Database extends mysqli {
	private static $instance = null;

	private function __construct() {
		parent::__construct(DB_HOST, DB_USER, DB_PWD, DB_NAME);
		$this->query('SET NAMES "utf8";');
	}

	public static function getInstance() {
		if (self::$instance == null) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	public function __destruct() {
		parent::close();
	}
}