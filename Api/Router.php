<?php

class Router {
  private array $routes = [];
  
  public function get(string $path,array $action){      
    $this->routes['GET'][$path] = $action;
  }
  public function get(string $path,array $action){      
    $this->routes['POST'][$path] = $action;
  }
  public function dispatch(){
    $method = $_SERVER['REQUEST_METHOD'];
    $path = strtok($_SERVER['REQUEST_URI'], '?');

    if(!isset($this->routes[$method][$path])){
      http_response_code(404);
      echo json_encode(["erro" => "Rota não encontrada"]);
      return;
    }
    
    [$controller, $methodAction] = $this->routes[$method][$path];
    
    require_once __DIR__ . "/Modules/$controller.php";
    
    $controllerInstance = new $controller();
    $controllerInstance->$methodAction();
  }
}
?>