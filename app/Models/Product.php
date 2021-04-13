<?php

  namespace App\Models;
  use MVC\Model;

  class Product extends Model{
    public function getById($id){
      return ['name' => 'Produto 1'];
    }

    public function getMostViewed(){
      // $this->getPDO();
    }
  }