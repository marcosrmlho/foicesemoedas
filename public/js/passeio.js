var url_atual = window.location.href.split("?")[0];

function getPasseio(cardDir) {
    window.location.href = url_atual + `source/criarPasseio.php/?passeio=${cardDir}`
};

var addCarrinhoElement = document.querySelector("#addCarrinho");

addCarrinhoElement.addEventListener("click", function() {
    alert("Teste")
});