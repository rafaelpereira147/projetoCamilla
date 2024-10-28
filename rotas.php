<?php

class rotas
{
    private $rotas = [];
    private $rotasPost = [];

    public function addRota($urlPattern, $controller, $method, $requestType = 'GET')
    {
        if ($requestType == 'GET') {
            $this->rotas[] = [
                'urlPattern' => $urlPattern,
                'controller' => $controller,
                'method' => $method,
            ];
        } elseif ($requestType == 'POST'){
            $this->rotasPost[$method] = [
                'controller' => $controller,
                'method' => $method
            ];
        }
    }

    public function run($url)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $this->runPost($url);
            return;
        } elseif($_SERVER['REQUEST_METHOD'] == 'GET') {
            $this->runGet($url);
            return;
        }
        //echo 'Rota não encontrada';
    }

    private function runGet($url)
    {
        foreach ($this->rotas as $route){
            if ($url == $route['urlPattern']){
                $controllerClass = "c\\" . $route['controller'] . "Controller";
                $controller = new $controllerClass();
                $method = $route['method'];
                return $controller->$method();
            }
        }
        echo 'Método GET não encontrado!';
    }

    private function runPost($url)
    {
        if (isset($this->rotasPost[$url])){
            $route = $this->rotasPost[$url];
            $controllerClass = "c\\" . $route['controller'] . "Controller";
            $controller = new $controllerClass();
            $method = $route['method'];
            return $controller->$method();
        }
        echo 'Rota post não encontrada!';
    }
}