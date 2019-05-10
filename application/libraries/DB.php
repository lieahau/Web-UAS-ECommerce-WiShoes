<?php
class DB{
    public static $pdo;

    public static function connect(){
        $host = "localhost"; // lokasi mysql
        $username = "root"; // user untuk login
        $password = ""; // password untuk login
        $dbname = "epiz_23654154_facenote"; // database name

        self::$pdo = new PDO("mysql:host=$host;dbname=$dbname;", $username, $password); // connect pdo
        self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // set error mode
        self::$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    }

    public static function query($query, $params = array()){
        if(!isset(self::$pdo))
            self::connect();

        $statement = self::$pdo->prepare($query);
        $statement->execute($params);
    }

    public static function queryInsert($tableName, $params = array()){
        if(!isset(self::$pdo))
            self::connect();

        $columns = array_keys($params);
        $values = array_values($params);
        $query = "INSERT INTO $tableName (".implode(',', $columns).") VALUES ('".implode("', '", $values)."')";
        $statement = self::$pdo->prepare($query);
        $statement->execute();
    }

    public static function queryCount($tableName, $condition = true){
        if(!isset(self::$pdo))
            self::connect();

        $query = "SELECT COUNT(*) FROM $tableName WHERE $condition";
        $statement = self::$pdo->query($query); // ini manggil query() function nya PDO, bukan function di class ini
        return $statement->fetchColumn();
    }

    public static function querySelect($tableName, $columns = array('*'), $condition = true){ 
        if(!isset(self::$pdo))
            self::connect();

        $query = "SELECT ".implode(',', $columns)." FROM $tableName WHERE $condition";
        print_r($query);
        $statement = self::$pdo->prepare($query);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>
