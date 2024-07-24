const getCard = (imgSource, altImg, descricao, zIndex, ranking) => {
    const cardTemplate = `
        <div class="cardWrapper" style="z-index: ${zIndex};">
            <div class="card">
                <img src="${imgSource}" alt="${altImg}">
                <div class="">
                    ${descricao}
                    <div>
                    ${ranking}
                    </div>
                </div>
            </div>
        </div>
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
    getCard("imagemAsaDelta.webp", "Imagem da Aventura Asa Delta", "Passeio de Asa Delta na Pedra da Gávea", zIndex--, "8")
]);