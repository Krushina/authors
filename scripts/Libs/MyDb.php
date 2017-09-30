<?php
/**
 * Created by PhpStorm.
 * User: sorriso
 * Date: 01.10.17
 * Time: 1:13
 */
namespace Libs;

class MyDb {

    protected $config;
    protected $connection;

    function __construct($config) {
        $this->config = $config;
    }

    public function getConnection()
    {
        if (!is_null($this->connection)) {
            return $this->connection;
        }

        $this->getFirstConnection();
    }

    protected function getFirstConnection(){
        $dsn = sprintf("mysql:host=%s;dbname=%s", $this->config['Mysql']['host'], $this->config['Mysql']['dbname']);
        $this->connection = new PDO($dsn,  $this->config['Mysql']['dbuser'],  $this->config['Mysql']['dbpass']);
    }
} 