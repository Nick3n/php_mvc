<?php

  namespace MVC;

  class Resolver implements \ArrayAccess{
    use Collection;

    public function handler(string $class, string $method = null){
      $reflectionClass = new \ReflectionClass($class);
      $instance = $this->getInstance($reflectionClass);

      if(!$method) return $instance;

      $methodReflection = new \ReflectionMethod($instance, $method);

      // Resolve dependecies from method called when instantiate
      $parametersFromMethod = $this->methodsResolver($methodReflection);

      call_user_func_array([$instance, $method], $parametersFromMethod);
    }

    private function getInstance($class){
      $constructor = $class->getConstructor();
      if(!$constructor) return $class->newInstance();
      
      $parametersFromConstructor = $this->methodsResolver($constructor);

      // create new class with all the class from params instantiated
      return $class->newInstanceArgs($parametersFromConstructor);
    }

    private function methodsResolver($method){
      $parameters = [];

      foreach($method->getParameters() as $param){

        // if param exists and exists in object of resolver in root it will be get
        if($param->getType() != null && $this->offsetExists((string)$param->getType())){
          $parameters[] = $this->offsetGet((string)$param->getType());
          continue;
        }
        
        // verify if param is optional and return to parameters the default value
        if($param->isOptional()){
          $parameters[] = $param->getDefaultValue();
          continue;
        }

        // verify if parameter is a class and instantiate this
        $classFromParam = $param->getClass()->getName();
        if($classFromParam){
          $parameters[] = $this->handler($classFromParam);
          continue;
        }
      }

      return $parameters;
    }
  }