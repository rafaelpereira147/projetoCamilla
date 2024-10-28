<?php
/**
 * Arquivo que contem configurações e a segurança
 */

include('constantes.php');
include('autoload.php');
include('rotas.php');

//Inicia sessão
if (!isset($_SESSION)) {
    session_start();
}
$subpasta = '';
if (HOST == 'C:/xampp/htdocs'){
    $subpasta = '/testes/rafael/lacos';
}

use Template\Template;
$classTemplate = new Template();

//Pega a url da requisição
if (isset($_GET['url']) && $_GET['url'] != ''){
    $url = $_GET['url'];
} else {
    $url = 'home';
}

$arrayPagina = array(
    'titulo' => 'Rabicó Art In Laço',
    'descricao' => 'Moda infantil'
);

//Configura o roteamento(testando uma nova abordagem)
$router = new rotas();

//Define rotas para controllers e methods(inserção manual das rotas)

//Rotas GET
$router->addRota('home', 'home', 'listaProdutos');

//Rotas POST
$router->addRota('home', 'home', 'post', 'POST');

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $router->run($url);
} else {
    // Renderiza os templates apenas para GET
    echo $classTemplate->headerPadrao($arrayPagina);
    echo $classTemplate->cabecalhoPadrao();
    $router->run($url);
    echo $classTemplate->rodapePadrao();
}

exit();
echo $classTemplate->headerPadrao($arrayPagina);
echo $classTemplate->cabecalhoPadrao();
$router->run($url);
echo $classTemplate->rodapePadrao();
exit();

//Verifica o método da requisição
if ($_SERVER['REQUEST_METHOD'] == 'POST'){

    //Tratar requisições de POST diretamente
    if (isset($_POST['acao']) && !empty($_POST['acao'])){
        include('c/' . $url . 'Controller.php');
    }
} else {
    //Infos de template para ser carregada antes e depois da página ser incluida
    $arrayPagina = array(
        'titulo' => 'Rabicó Art In Laço',
        'descricao' => 'Moda infantil'
    );
    echo $classTemplate->headerPadrao($arrayPagina);
    echo $classTemplate->cabecalhoPadrao();
    $router->run($url);
    echo $classTemplate->rodapePadrao();
}
//$router->addRota('home', 'home', 'post', 'POST');

exit();

//Função para tratar a url amigável e carregar sua view correspondente
function carregarPagina($pagina)
{
    global $classTemplate;

    $subpasta = '';
    if (HOST == 'C:/xampp/htdocs'){
        $subpasta = '/testes/rafael/lacos';
    }

    //Trata inicialmente a url com segurança padrão do PHP
    $paginaSegura = filter_var($pagina, FILTER_SANITIZE_URL);

    //Caminho da view
    $caminhoView = HOST . $subpasta . "/v/{$paginaSegura}.php";

    //Caminho da controller
    $caminhoController = HOST . $subpasta . "/c/{$paginaSegura}Controller.php";

    //Verifica se a controller existe
    if (file_exists($caminhoController)){
        require_once($caminhoController);

        //Instancia controller
        $controllerClass = "c\\" . $paginaSegura . "Controller";
        $controller = new $controllerClass;

        //Determina o método a ser chamado
        $methodDefault = 'listaProdutos';

        //Verifica se o método foi passado na url e se existe
        if (isset($_GET['method']) && !empty($_GET['method']) && method_exists($controller, $_GET['method'])){
            $methodDefault = $_GET['method'];
        }

        if (method_exists($controller, $methodDefault)) {

            //Chama o método no controller
            ob_start(); //Inicia o buffer de saída
            $controller->$methodDefault();
            $saida = ob_get_clean(); //Obtem o conteudo do buffer e limpa
        }

    }

    //Verifica se a view existe
    if (file_exists($caminhoView)){
        $arrayPagina = array(
            'titulo' => 'Rabicó Art In Laço',
            'descricao' => 'Moda infantil'
        );
        echo $classTemplate->headerPadrao($arrayPagina);
        echo $classTemplate->cabecalhoPadrao();
        include($caminhoView);
        echo $classTemplate->rodapePadrao();
    } else {
        echo '<h1 style="text-align: center">Página não existe</h1>';
    }
}

//Chama a função de carregar a página
carregarPagina($url);