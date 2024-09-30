const getCard = (imgSource, altImg, descricao, zIndex, ranking) => {
    const cardTemplate = `
        <a class="cardWrapper" style="z-index: ${zIndex};" href="../static/cardAsaDelta.php">
            <div class="card">
                <img src="${imgSource}" alt="${altImg}">
                <div class="cardDescricao">
                    <div class="descricao">
                        ${descricao}
                    </div>
                    <div class="ranking">
                        Ranking: <b>${ranking}</b>
                    </div>
                </div>
            </div>
        </a>
    `;
    return cardTemplate;
}

const getChildrenHtml = (children) => {
    return children.join('');
}

const maisComprados = document.querySelector(".maisComprados");

let zIndex = 2000;


maisComprados.innerHTML = getChildrenHtml([
    getCard("imagemAsaDelta.webp", "Imagem da Aventura Asa Delta", "Passeio de Asa Delta na Pedra da Gávea", zIndex--, "8"),
    getCard("imagemAsaDelta.webp", "Imagem da Aventura Asa Delta", "Passeio de Asa Delta na Pedra da Gávea", zIndex--, "8"),
    getCard("imagemAsaDelta.webp", "Imagem da Aventura Asa Delta", "Passeio de Asa Delta na Pedra da Gávea", zIndex--, "8"),
    getCard("imagemAsaDelta.webp", "Imagem da Aventura Asa Delta", "Passeio de Asa Delta na Pedra da Gávea", zIndex--, "8"),
    getCard("imagemAsaDelta.webp", "Imagem da Aventura Asa Delta", "Passeio de Asa Delta na Pedra da Gávea", zIndex--, "8"),
    getCard("imagemAsaDelta.webp", "Imagem da Aventura Asa Delta", "Passeio de Asa Delta na Pedra da Gávea", zIndex--, "8"),
    getCard("imagemAsaDelta.webp", "Imagem da Aventura Asa Delta", "Passeio de Asa Delta na Pedra da Gávea", zIndex--, "8"),
    getCard("imagemAsaDelta.webp", "Imagem da Aventura Asa Delta", "Passeio de Asa Delta na Pedra da Gávea", zIndex--, "8"),
    getCard("imagemAsaDelta.webp", "Imagem da Aventura Asa Delta", "Passeio de Asa Delta na Pedra da Gávea", zIndex--, "8")
]);