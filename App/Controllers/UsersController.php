<?php
  
  namespace App\Controllers;

  use App\Models\User;
  use App\Models\Product;
  use Core\Controller;
  use Core\View;

  class UsersController extends Controller{

    public function __construct(User $modelUser, Product $modelProduct, View $view)
    {
      $this->modelUser = $modelUser;
      $this->modelProduct = $modelProduct;
      $this->view = $view;
    }
    
    public function index(){
      $user = $this->modelUser->getById(1);
      $product = $this->modelProduct->getById(1);
      $path = $this->controllerName();
      $this->view::render($path, [
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
