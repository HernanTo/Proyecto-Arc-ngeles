<?php

class database{

    private static $dbHost = "localhost";
    private static $dbName = "arca";
    private static $dbUsername = "root";
    private static $dbUserpassword = "";


    public static function conectar(){

        try {

            $con = new PDO("mysql:dbname=".self::$dbName.";dbHost=".self::$dbHost,self::$dbUsername,self::$dbUserpassword);
            $con ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $con;
        } catch (Exception $e) {
            die ($e->getMessage());
        }
    }
}

?>