<?php

namespace App\Core;

use PDO;
use PDOException;

/**
 * Database class
 */
class Database extends PDO
{
    // Instance unique de la class
    private static $instance;

    // set bdd
    public function __construct()
    {
        // Database config.ini info
        $config = parse_ini_file(__DIR__."../config.ini");
        
        // DSN database
        $_dsn = "mysql:host=".$config['DBHOST'].";dbname=".$config['DBNAME'];
        
        // Call constructor of PDO class
        try {
            parent::__construct($_dsn, $config['DBUSER'], $config['DBPASS']);

            // $this references PDO
            $this->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, 'SET NAMES utf8');
            $this->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $this->setAttribute(PDO:: ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    // get database
    public static function getBdd() : self
    {
        if(self::$instance === null){
            // new self = new Db()
            self::$instance = new self();
        }
        return self::$instance;
    }
}