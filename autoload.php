<?php
spl_autoload_register(function ($class){
    //Define a base principal do projeto
    $baseDir = HOST . '/';

    //Substitui as barras invertidas (\) por barras normais (/)
    //Essa substituição é necessária para que funcione com namespaces, caso esteja utilizando estiver utilizando
    $file = $baseDir . str_replace('\\', '/', $class) . '.php';

    //Verifica se o arquivo existe
    if (file_exists($file)){

        //Inclui o arquivo da classe
        require_once($file);
    } else {
        echo "A classe {$class} não foi encontrada.";
    }
});