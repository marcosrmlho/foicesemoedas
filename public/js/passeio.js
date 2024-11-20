var url_atual = window.location.href.split("/source")[0];

var addCarrinhoElement = document.querySelector("#addCarrinho");

addCarrinhoElement.addEventListener("click", function() {
    window.location.href = url_atual+ `/scripts/addCarrinho.php/?cardDir=${cardDir}`;
});