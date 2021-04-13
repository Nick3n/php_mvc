<?php
  
  namespace App\Controllers;

use App\Models\User;
use App\Models\Product;
use MVC\Controller;

  class UsersController extends Controller{

    public function __construct(User $modelUser, Product $modelProduct)
    {
      $this->modelUser = $modelUser;
      $this->modelProduct = $modelProduct;
    }
    
    public function index(){
      $user = $this->modelUser->getById(1);
      $product = $this->modelProduct->getById(1);
      $this->render([
        'userName' => $user['name'],
        'productName' => $product['name']
      ]);
    }

    public function create(){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        
      }
      $this->render();
    }

    public function header(){
      $this->render(['name' => 'Nicolas']);
    }
  }
