<?php
  namespace Core;

  class Controller{
    protected $model;
    
    protected function render(array $data = [], string $view = null)
    {
      /* debug_backtrace()[1] -> Get the name of the last method called
        that corresponds with the name of the template archive
      */
      if(!$view) $view = $this->controllerName() . '/' . debug_backtrace()[1]['function'];
      extract($data); // create variables with the name of keys from array
      require dirname(__DIR__).'/App/Views/'.$view.'.php';
    }

    protected function controllerName(){
      $class = get_class($this); // return class name with namespace | App\Controllers\UserController
      $class = explode('\\',$class); // [App, Controllers, UserController];
      $class = array_pop($class); // UserController
      $class = preg_replace('/Controller$/', '', $class); // User
      return $class; //user
    }

    private function configModel(){
      if(!$this->model->getTableName()){
        $this->model->setTableName($this->controllerName());
      }
    }
  }