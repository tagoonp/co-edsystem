<?php
class database extends Configuration{

  private $pdo;

  public function __construct(){
    // Code here
  }

  public function connect(){
    try {
      $this->pdo = new PDO('mysql:host='.$this->config['host'].';dbname='.$this->config['dbname'], $this->config['dbuser'], $this->config['dbpass'], array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8") );
    } catch (Exception $e) {
      echo "Can not connect database";
    }
	}

  public function select($strSQL, $array){
    $stagement = $this->pdo->prepare($strSQL);
    $stagement->execute($array);

    $count = $stagement->rowCount();
    if($count > 0){
      return $stagement;
    }else{
      return false;
    }
  }

  public function delete($strSQL, $array){
    $stagement = $this->pdo->prepare($strSQL);
    $stagement->execute($array);

    $count = $stagement->rowCount();
    return true;
  }

  public function insert($strSQL, $array){
    $stagement = $this->pdo->prepare($strSQL);
    $stagement->execute($array);

    $count = $stagement->rowCount();
    if($count > 0){
      return true;
    }else{
      return false;
    }
  }

  public function update($strSQL, $array){
    $stagement = $this->pdo->prepare($strSQL);
    $stagement->execute($array);

    $count = $stagement->rowCount();
    return true;
  }

  public function disconnect(){
    $this->pdo = null;
  }

  public function getTitle(){
    return $this->config['sitetitle'];
  }

  public function getSessionPrefix(){
    return $this->config['session_prefix'];
  }

  public function getSaltkey(){
    return $this->config['salt'];
  }

}
