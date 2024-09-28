const getCard = (imgSource, altImg, descricao, zIndex, ranking) => {
    const cardTemplate = `
        <div class="cardWrapper" style="z-index: ${zIndex};" onclick="window.location='cardAsaDelta.html';">
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
    getCard("imagemAsaDelta.webp", "Imagem da Aventura Asa Delta", "Passeio de Asa Delta na Pedra da Gávea", zIndex--, "8"),
    getCard("imagemAsaDelta.webp", "Imagem da Aventura Asa Delta", "Passeio de Asa Delta na Pedra da Gávea", zIndex--, "8")
]);

const getCardInfo = (idCard) => {
            axios.get(`/api/getcard?id=${idCard}`)

            .then((response) => {
                const dados = response.data
                alert(`Minha imgSource é ${dados.imgSource}. Minha altImg é ${dados.altImg}. Minha descrição é ${dados.descricao}. Meu ranking é ${dados.ranking}.`);
            })
            .catch((error) => {
                console.error(error);
            });
        }