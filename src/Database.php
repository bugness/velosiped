<?php

namespace Velosiped;

class Database
{
    /**
     * @var Database
     */
    private static $instance = null;

    /**
     * @var \PDO
     */
    private $pdo = null;

    private function __construct()
    {
        $this->connect();
    }

    private function __clone()
    {
        
    }

    /**
     * @return Database
     */
    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    public function connect()
    {
        global $config;

        try {
            $pdo = new PDO(
                sprintf(
                    'mysql:host=%s;port=%d;dbname=%s',
                    $config['db']['host'],
                    $config['db']['port'],
                    $config['db']['name']
                ),
                $config['db']['user'],
                $config['db']['pass'],
                [
                    \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
                    \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
                ]
            );
        } catch (\PDOException $e) {
            exit('DB Error: ' . $e->getMessage() . '<br/>');
        }

        $this->pdo = $pdo;
    }

    public function disconnect()
    {
        $this->pdo = null;
    }

    /**
     * @param string $sql
     * @return \PDOStatement
     */
    public function query($sql)
    {
        try {
            return $this->pdo->query($sql);
        } catch (\PDOException $e) {
            exit('DB Error: ' . $e->getMessage() . '<br/>');
        }
    }

    /**
     * @param string $sql
     * @return \PDOStatement
     */
    public function prepare($sql)
    {
        try {
            return $this->pdo->prepare($sql);
        } catch (\PDOException $e) {
            exit('DB Error: ' . $e->getMessage() . '<br/>');
        }
    }
}
