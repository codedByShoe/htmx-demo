<?php

namespace App\Libraries;

use PDO;

class Database
{
    public $connection;
    public $config;
    public $statement;

    public function __construct($config)
    {
        $this->config = $config;
        $dsn = $this->getDsn(mb_convert_case($config['connection'], MB_CASE_LOWER));
        try {
            $this->connection = new PDO($dsn, $config['dbuser'], $config['dbpass'], [
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
            ]);
        } catch (\Exception $e) {
            dumpe($e->getMessage());
        }
    }
    private function getDsn($dbType)
    {
        $dsn = match($dbType) {
          'mysql'  => 'mysql:host=' . $this->config['host'] . ';dbname=' . $this->config['dbname'],
          'sqlite' => 'sqlite:' . base_path($this->config['dburl']),
          default  => throw new \Exception('Unsupported database type: ' . $dbType)
        };

        return $dsn;

    }

    public function query($query, $params = [])
    {
        $this->statement = $this->connection->prepare($query);

        $this->statement->execute($params);

        return $this;
    }

    public function get()
    {
        return $this->statement->fetchAll();
    }

    public function find()
    {
        return $this->statement->fetch();
    }

    public function findOrFail()
    {
        $result = $this->find();

        throw_when(!$result, 'Resource not found in database');

        return $result;
    }
}
