<?php


namespace App\config;

    use PDO;
    use PDOException;

    class Connect extends PDO {

        CONST DB_HOST = 'localhost';
        CONST DB_NAME = 'blog_bdd';
        CONST DB_USER = 'root';
        CONST DB_PASSWORD = '';

        public function __construct() {

            $dsn = "mysql:dbname=".self::DB_NAME.";host=".self::DB_HOST;

            try {

                parent::__construct($dsn, self::DB_USER, self::DB_PASSWORD);

                $this->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
                $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->query("SET NAMES 'utf8'");
                $this->query("SET lc_time_names = 'fr_FR';");

                echo 'Connection etablie';


            } catch(PDOException $e) {

                die("Erreur: ".$e->getMessage());

            }
        }
        /**
         * Function for type request FetchAll


        public function fetchAllQuery(string $sql, array $params=[]){

            $req = parent::prepare($sql);
            $req->execute($params);
            return $req;
        }
    */

    }