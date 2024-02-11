<?php

class DataBaseSingleton
{

    private static $instance;
    private $connection;

    private $config = [];

    private function __construct()
    {
        $this->loadConfig();
        $this->connection = new PDO(
            "mysql:host={$this->config['host']};dbname={$this->config['db_name']}",
            $this->config['user'],
            $this->config['password']
        );
    }

    private function loadConfig()
    {
        $json_file = file_get_contents('../config/db-conf.json');
        $this->config = json_decode($json_file, true);
    }

    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function getConnection()
    {
        return $this->connection;
    }
}
