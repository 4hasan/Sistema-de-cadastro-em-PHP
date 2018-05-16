<?php
class ConexaoBanco extends PDO{

  private static $instance = null;

  public function __construct($dsn, $user, $pass){

    parent::__construct($dsn, $user, $pass);
  }

  public static function getInstance(){
    if(!isset(self::$instance)){
      try {
        self::$instance=new ConexaoBanco("mysql:dbname=gerenciamento; host=localhost","root","");
      } catch (PDOException $e) {
        echo "erro ao conectar!".$e;
      }//catc
    }//if
    return self::$instance;
  }//construct
}//classe
