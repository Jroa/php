<?php

  class Db{
    private static $dsn;
    private static $username;
    private static $password;
    private static $connection;

    private function __construct(){}

    public static function getInstance(){
      try{
        if (self::$connection == null){
          self::$dsn = "mysql:dbname=bandamusica;host=localhost;port=3306";
          self::$username = "root";
          self::$password = "root";
          self::$connection = new PDO(self::$dsn, self::$username, self::$password);  
        }
        return self::$connection;
        
      }catch(PDOException $e) {
        die('No se puedo conectar a la base de datos:<br/>' . $e);
      }
    }
  }
?>