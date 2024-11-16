var url_atual = window.location.href.split("?")[0];

function getNextData(ordenacao, pagina) {
    window.location.href = url_atual + `?page=${pagina}&ordenacao=${ordenacao}`
};

var selectElement = document.querySelector("#ordenar");
var botaoVoltarElement = document.querySelector("#voltar");
var botaoFrenteElement = document.querySelector("#frente");

selectElement.addEventListener("change", function() {
    getNextData(this.value, paginaAtual)
});
botaoVoltarElement.addEventListener("click", function() {
    getNextData(ordenacaoAtual, voltar)
});
botaoFrenteElement.addEventListener("click", function() {
    getNextData(ordenacaoAtual, frente)
});