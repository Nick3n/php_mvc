<?php
  
  namespace MVC;

  class Model{
    protected $pdo;
    protected $tableName;

    public function __construct(\PDO $pdo = null){
      $this->pdo = $pdo;
    }

    public function getAll(){
      $sql = 'SELECT * FROM '.$this->table;
      $result = $this->getPDO()->query($sql);
      return $result->fetchAll(MYSQLI_ASSOC);
    }

    public function getPDO(){
      return $this->pdo;
    }

    public function get(){
      return [
        'name' => 'Nicolas'
      ];
    }

    public function setTableName(string $tableName){
      $this->tableName = $tableName;
    }

    public function getTableName(){
      return $this->tableName;
    }

  }