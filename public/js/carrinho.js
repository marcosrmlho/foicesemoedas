var url_atual = window.location.href.split("source")[0];
var retirarDoCarrinhoElement = document.querySelector(".retirarDoCarrinho");

retirarDoCarrinhoElement.addEventListener("click", function() {
    window.location.href = url_atual + `/scripts/delCarrinho.php/?passeio=${cardDir}`
});