<?php
  define('HOST', 'localhost');
  define('DBNAME', 'menes');
  define('USER', 'root');
  define('PASSWORD', '');
  
  class Connect{
      protected $connection;
  
      function __construct(){
          $this->connectDatabase();
      }
  
      private function connectDatabase() {
          try {
              $this->connection = new PDO('mysql:host='.HOST.';dbname='.DBNAME, USER, PASSWORD);
              $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          } catch (PDOException $e) {
              echo "Error connecting to database: " . $e->getMessage();
              die();
          }
      }
  }
  
    
?>