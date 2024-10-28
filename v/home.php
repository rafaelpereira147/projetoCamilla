<?php

?>

<!-- Conteúdo da página -->
<div class="container">
    <div class="carousel carousel-slider carouselPersonalize">
        <a class="carousel-item" href="#"><img src="<?php echo SUB_PASTA ?>/images/lacoColorido.jpeg" alt="Destaque 1"></a>
        <a class="carousel-item" href="#"><img src="<?php echo SUB_PASTA ?>/images/lacoLilas.jpeg" alt="Destaque 2"></a>
        <a class="carousel-item" href="#"><img src="<?php echo SUB_PASTA ?>/images/tiaraRoxa.jpeg" alt="Destaque 3"></a>
    </div>

    <!-- Cards -->
    <div class="row">
        <?php if (isset($produtosAtivos)){
                foreach ($produtosAtivos as $produtos){
        ?>
            <div class="col s12 m4 l4 divCard">
                <div class="card">
                    <div class="card-image">
                        <img src="<?php echo SUB_PASTA . $produtos['caminhoImagem'] ?>">
                        <span class="card-title"><?php echo $produtos['descricao'] ?></span>
                    </div>
                    <div class="card-content">
                        <p>R$ <?php echo number_format($produtos['valor'], 2, ',', '.') ?></p>
<!--                        <p>Condições de Pagamento</p>-->
                    </div>
                    <div class="card-action">
                        <a class="waves-effect waves-light btn" href="#" onclick="addItemCarrinho(<?php echo $produtos['id']; ?>)"><i class="material-icons left">add</i> Adicionar ao Carrinho</a>
                    </div>
                </div>
            </div>
        <?php }} ?>
    </div>

    <!-- Estrutura modal -->
    <div id="modalAddItem" class="modal">
        <div class="modal-content">
            <span class="btn btn-floating alinhaDireita modal-close"><i class="material-icons">close</i></span>
            <div class="itemProduto">
                <div class="row">
                    <!-- Imagem à esquerda -->
                    <div class="col s12 m5 alinhaCentro">
                        <div class="imgContainer">
                            <img class="imgModal" id="imgModal" src="https://via.placeholder.com/300x400">
                        </div>
                    </div>
                    <!-- Informações à direita -->
                    <div class="col s12 m7">
                        <h1 class="produtoNome" id="divTituloProdutoModal">Nome do Produto</h1>
                        <div class="containerPrecoProduto">
                            <span class="comparaPreco alinhaDireitaSpan">R$ 200,00</span>
                            <span class="linhaInline" id="spanPrecoProduto">R$ 150,00</span>
                        </div>

                        <!-- Linha separadora -->
                        <div class="divider"></div>

                        <!-- Seletor de cor e outras opções -->
                        <div class="input-field col s12">
                            <select id="selectCor">
                                <option value="" disabled selected>Escolha a cor</option>
                                <option value="1">Vermelho</option>
                                <option value="2">Azul</option>
                                <option value="3">Amarelo</option>
                            </select>
                            <label>Selecione a cor</label>
                        </div>

                        <!-- Campo de quantidade com botões de mais e menos -->
                        <div class="row">
                            <div class="col s4">
                                <button class="btn-flat btn-small" onclick="alterarQuantidade(-1)">-</button>
                            </div>
                            <div class="input-field col s4">
                                <input id="quantidade" type="number" value="1" min="1">
                            </div>
                            <div class="col s4">
                                <button class="btn-flat btn-small" onclick="alterarQuantidade(1)">+</button>
                            </div>
                        </div>

                        <!-- Botão de adicionar ao carrinho -->
                        <div class="row">
                            <div class="col s12">
                                <button class="btn waves-effect waves-light pink darken-1">Adicionar ao carrinho</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-close waves-effect waves-green btn-flat">Fechar</a>
        </div>
    </div>

</div>

<?php //echo $classTemplate->rodapePadrao(); ?>

<!-- Incluindo Materialize JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        let carousels = document.querySelectorAll(".carousel");
        M.Carousel.init(carousels, {
            fullWidth: true,
            indicators: true,
            duration: 500, //Duração da transição em milissegundos
        });
        //Mudar slides automaticamente
        setInterval(function () {
            let instance = M.Carousel.getInstance(document.querySelector(".carousel"));
            instance.next();
        }, 7000);
    });
</script>
