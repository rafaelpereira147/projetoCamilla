<?php

namespace c;

use m\ProdutoModel;
class homeController
{
    private $productModel;

    public function __construct()
    {
        //Instancia a classe
        $this->productModel = new ProdutoModel();
    }

    public function listaProdutos()
    {
        $produtosAtivos = $this->productModel->listaProdutosAtivos('S');

        //Retorna infos para a view
        require_once(HOST . '/v/home.php');
    }

    public function gerarToken()
    {
        return base64_encode(md5(date('d/m/Y') . SUB_PASTA . 'B&J@3dV{U$DP0i8%'));
    }

    public function post()
    {

        //Dados para retorno em json
        $ret = "";
        $msg = "Erro ao processar os dados.";
        $tipo = "";
        $html = "";
        $dados = "";
        $titulo = "";

        if (!empty($_POST['acao'])){
             if ($_POST['acao'] == 'consultarToken'){
                 $dados = $this->gerarToken();
             } else {
                 $tokenPost = base64_decode($_POST['token']);

                 if ($tokenPost == TOKEN) {
                     switch ($_POST['acao']) {
                         case 'consultaInfosItem':
                         {
                             $infosProduto = $this->productModel->detalhaProduto($_POST['id']);

                             if (!empty($infosProduto)){
                                 $tipo = 'success';
                                 $dados = $infosProduto;
                             } else {
                                 $tipo = 'warning';
                                 $titulo = 'Atenção!';
                                 $msg = 'Não houve retorno para esse produto, tente novamente.';
                             }
                             break;
                         }
                     }
                 } else {
                     $tipo = 'error';
                     $titulo = 'Erro!';
                     $msg = 'Token não confere.';
                 }
             }
        }

        $retorno = [
            'ret' => $ret,
            'msg' => $msg,
            'tipo' => $tipo,
            'html' => $html,
            'dados' => $dados,
            'titulo' => $titulo
        ];
        echo json_encode($retorno);
        exit();
    }
}