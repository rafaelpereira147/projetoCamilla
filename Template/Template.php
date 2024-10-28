<?php

namespace Template;

class Template
{

    //Cabeçalho padrão para todas as páginas
    public function headerPadrao($array = array('titulo' => 'Modelo', 'descricao' => 'Projeto Modelo', 'menu' => false))
    {
        $html = '<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="msapplication-tap-highlight" content="no">
    <meta name="description" content="'.$array['descricao'].'">
    <title>'.$array['titulo'].'</title>
    <meta name="googlebot" content="noindex">
    <meta name="robots" content="noindex">
    <!-- Favicons-->
    <link rel="apple-touch-icon-precomposed" href="'.SUB_PASTA.'/images/lacoFavicon.png">
    <meta name="msapplication-TileColor" content="#FFFFFF">
    <meta name="msapplication-TileImage" content="'.SUB_PASTA.'/images/lacoFavicon.png">
    <link rel="icon" href="'.SUB_PASTA.'/images/lacoFavicon.png" sizes="32x32">
    <meta property="og:image" content="'.SUB_PASTA.'/images/lacoFavicon.png">
    <meta property="og:image:secure_url" content="'.SUB_PASTA.'/images/lacoFavicon.png">
    <meta name="twitter:image" content="'.SUB_PASTA.'/images/lacoFavicon.png"/>
    <!--  Android 5 Chrome Color-->
    <meta name="theme-color" content="#EE6E73">
    <!-- CSS-->
    <!--    <link href="//cdn.shopify.com/s/files/1/1775/8583/t/1/assets/admin-materialize.min.css?0" rel="stylesheet">-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet">
    <link href="'.SUB_PASTA.'/css/lineIcons/web-font-files/lineicons.css" rel="stylesheet" type="text/css">
    <link href="'.SUB_PASTA.'/css/style.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="'.SUB_PASTA.'/js/jquery-3.7.1.min.js"></script>
    <script src="'.SUB_PASTA.'/js/jqeuryMask/jquery.mask.js"></script>
    <link href="'.SUB_PASTA.'/css/materialize/js/materialize.min.js" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="'.SUB_PASTA.'/js/dataTables/datatables.js"></script>
    <script src="'.SUB_PASTA.'/js/scripts.js"></script>
    <link href="'.SUB_PASTA.'/js/dataTables/datatables.css" rel="stylesheet" type="text/css">
    <link href="https://cdn.datatables.net/v/dt/dt-2.1.6/datatables.min.css" rel="stylesheet">
    <script src="https://cdn.datatables.net/v/dt/dt-2.1.6/datatables.min.js"></script>
    <script src="'.SUB_PASTA.'/js/jsZip/dist/jszip.min.js"></script>
    <script src="'.SUB_PASTA.'/js/pdfMake/build/pdfmake.min.js"></script>
    <script src="'.SUB_PASTA.'/js/vfsFonts.js"></script>
    </head>
    <style>
    body{
        background-image: url("' . SUB_PASTA . '/images/fundoRosa.jpg");
    }
  </style>
    <body><input type="hidden" id="hostPadrao" value="'.HOST.'">';

        return $html;
    }

    public function cabecalhoPadrao()
    {
        $html = '<!-- Navbar Responsiva -->
  <nav>
    <div class="nav-wrapper container">
      <!-- Logotipo -->
      <a href="#" class="brand-logo"><img src="'.SUB_PASTA.'/images/rabico.png" style="width: 65px; border-radius: 50%"></a>

      <!-- Ícone de Menu (Hambúrguer) para Mobile -->
      <a href="#" data-target="mobile-demo" id="linkMobile" class="sidenav-trigger right">
        <i class="material-icons">menu</i>
      </a>

      <!-- Menu Normal para Desktop -->
      <ul class="right hide-on-med-and-down">
        <li><a href="#home">Início</a></li>
        <li><a href="#products">Produtos</a></li>
        <!--<li><a href="#about">Sobre Nós</a></li>-->
        <li><a href="#contact">Contato</a></li>
        <li>
            <a href="#" class="cart-icon">
              <i class="fas fa-shopping-cart"></i>
              <span class="cart-details">
                (<span id="cartQuantity" class="cart-count">0</span> itens) - R$ <span id="cartTotal">0,00</span>
              </span>
            </a>
        </li>
      </ul>
    </div>
  </nav>

  <!-- Menu para Mobile -->
  <ul class="sidenav" id="mobile-demo">
    <li><a href="#home">Início</a></li>
    <li><a href="#products">Produtos</a></li>
    <!--<li><a href="#about">Sobre Nós</a></li>-->
    <li><a href="#contact">Contato</a></li>
    <li>
        <a href="#" class="cart-icon">
              <i class="fas fa-shopping-cart"></i>
              <span class="cart-details">
                (<span id="cartQuantity" class="cart-count">0</span> itens) - R$ <span id="cartTotal">0,00</span>
              </span>
        </a>
    </li>
  </ul>
  <script>
    // Inicialização do Sidenav para mobile
    document.addEventListener("DOMContentLoaded", function() {
      let elems = document.querySelectorAll(".sidenav");
      M.Sidenav.init(elems);
    });
  </script>';
        return $html;
    }

    public function rodapePadrao()
    {
        $redesSociais = '<div class="container"><div class="row" style="background-color: #f8f9fa; border-radius: 50px">
        <div class="col s12 tituloSeguir">
            <h2 class="subTituloSeguir">Nos siga nas redes sociais!</h2>
        </div>
        <div class="socialIcons">
            <a href="https://chat.whatsapp.com/C8oUYZgvgjgK0s9SWVyJTo" target="_blank"><i class="fab fa-whatsapp whatsapp-icon" style="font-size: 50px; margin-left: 150px"></i></a>
            <a href="https://www.instagram.com/rabicoartinlaco/" target="_blank"><i class="material-icons" style="font-size: 50px">instagram</i></a>
        </div>
        <div class="col s12 l6 s6" style="text-align: center">
            <span class="iconeService"><i class="material-icons">credit_card</i></span>
            <h4 class="classeH4"> Parcele suas compras</h4>
            <p class="subParagrafo">em até 3x sem juros</p>
        </div>
        <div class="col s12 l6 s6" style="text-align: center">
            <span class="iconeService"><i class="material-icons">question_answer</i></span>
            <h4 class="classeH4"> Dúvidas?</h4>
            <p class="subParagrafo">Fale conosco!</p>
        </div>
    </div></div>';
        $footer = '<footer class="page-footer pink darken-1">
  <div class="container">
    <div class="row">
      <div class="col l6 s12">
        <h5 class="white-text">Sobre Nós</h5>
        <p class="grey-text text-lighten-4">Somos especialistas em laços de cabelo, criando produtos únicos para realçar a beleza em qualquer ocasião.</p>
      </div>
      <div class="col l4 offset-l2 s12">
        <h5 class="white-text">Redes Sociais</h5>
        <ul>
          <li><a class="grey-text text-lighten-3" href="#!"><i class="fab fa-whatsapp"></i> WhatsApp</a></li>
          <li><a class="grey-text text-lighten-3" href="#!"><i class="fab fa-facebook"></i> Facebook</a></li>
          <li><a class="grey-text text-lighten-3" href="#!"><i class="fab fa-instagram"></i> Instagram</a></li>
        </ul>
      </div>
    </div>
  </div>
  <div class="footer-copyright">
    <div class="container">
    © 2024 Rabicó Art Laço
    <a class="grey-text text-lighten-4 right" href="#!">Mais informações</a>
    </div>
  </div>
</footer>';

        $html = $redesSociais . $footer;
        return $html;
    }

}