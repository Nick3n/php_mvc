<?php

  namespace App\Models;
  use MVC\Model;

  class User extends Model{
    public function getById($id){
      return ['name' => 'Nicolas'];
    }

    public function getMostViewed(){
      // $this->getPDO();
    }
  }