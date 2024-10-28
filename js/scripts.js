//Inicializar qualquer modal no projeto
document.addEventListener('DOMContentLoaded', function (){
    let modal = document.querySelectorAll('.modal');
    let selects = document.querySelectorAll('select');

    M.Modal.init(modal);
    M.FormSelect.init(selects);
});

//Define um host raiz para ser utilizado em todo o js
let HOST = '';
if (window.location.host == 'localhost'){
    HOST = '/testes/rafael/lacos/'
}

let token = '';

function alterarQuantidade(valor) {
    let quantidadeInput = document.getElementById('quantidade');
    let quantidadeAtual = parseInt(quantidadeInput.value);
    if (!isNaN(quantidadeAtual)) {
        let novaQuantidade = quantidadeAtual + valor;
        if (novaQuantidade > 0) { // Evita que a quantidade seja menor que 1
            quantidadeInput.value = novaQuantidade;
        }
    }
}
function consultaToken(){
    return new Promise((resolve, reject) => {
        let dados = new FormData();
        dados.append('acao', 'consultarToken');

        $.ajax({
            method: 'POST',
            url: HOST + 'post',
            data: dados,
            processData: false,
            contentType: false,
            success: function (response) {
                let retorno = JSON.parse(response);
                token = retorno['dados'];
                resolve(token);
            },
            error: function (response) {
                reject('Erro ao consultar o token');
            }
        })
    });
}
function addItemCarrinho(id){
    consultaToken().then((token) => {
        let instancia = M.Modal.getInstance(document.getElementById('modalAddItem'));
        let imgModal = document.getElementById('imgModal');
        let divTituloModal = document.getElementById('divTituloProdutoModal');
        let spanPrecoProduto = document.getElementById('spanPrecoProduto');
        let dados = new FormData();
        dados.append('id', id);
        dados.append('token', token);
        dados.append('acao', 'consultaInfosItem');

        $.ajax({
            method: 'POST',
            url: HOST + 'post',
            data: dados,
            processData: false,
            contentType: false,
            success: function (response){
                let retorno = JSON.parse(response);

                if (retorno['tipo'] == 'success'){
                    imgModal.src = HOST + retorno['dados']['caminhoImagem'];
                    $(spanPrecoProduto).html('R$ ' + retorno['dados']['valor']);
                    $(divTituloModal).html(retorno['dados']['descricao']);

                    instancia.open(); //Abre o modal
                } else {
                    Swal.fire({
                        icon: retorno['tipo'],
                        title: retorno['titulo'],
                        html: retorno['msg']
                    });
                }
            },
            error: function (response){
                console.log('Não foi para a ação');
            }
        })
    }).catch((error) => {
        console.log(error); // Trata o erro se necessário
    });
}