<?php

/**
 * Arquivo para conter variaveis e funções globais, usadas em todo o projeto
 */

//Inicia uma sessão caso não tenha
if (!isset($_SESSION)){
    session_start();
}

const HOST_ABSOLUT = __DIR__;
$subpasta = '';
if ($_SERVER['DOCUMENT_ROOT'] == 'C:/xampp/htdocs'){
    $subpasta = '/testes/rafael/lacos';
}

$token = md5(date('d/m/Y') . $subpasta . 'B&J@3dV{U$DP0i8%');
define('TOKEN', $token);
define('SUB_PASTA', $subpasta);
define("HOST", $_SERVER['DOCUMENT_ROOT'] . $subpasta);
