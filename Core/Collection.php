<?php

  namespace Core;

  trait Collection{
    private $routes = [];

    public function __construct(array $routes = [])
    {
      $this->routes = $routes;
    }

    public function offsetExists($offset)
    {
      return isset($this->routes[$offset]); // verify if data exists
    }

    public function offsetGet($offset)
    {
      return $this->routes[$offset]; // get data
    }

    public function offsetSet($offset, $value)
    {
      if(is_callable($value)){
        $value = $value($this);
      }
      $this->routes[$offset] = $value; // set new value to data
    }

    public function offsetUnset($offset)
    {
      unset($this->routes[$offset]);
    }
  }