const express = require('express')
const app = express()
const port = 4000



app.use(express.static('static', {index:['home.html']}))



const banco = [
  {
    imgSource: "imagemAsaDelta.webp",
    altImg: "Imagem da Aventura Asa Delta",
    descricao: "Passeio de Asa Delta na Pedra da Gávea",
    ranking: "1"
  },
  {
    imgSource: "imagemAsaDelta.webp",
    altImg: "Imagem da Aventura Asa Delta",
    descricao: "Passeio de Asa Delta na Pedra da Gávea",
    ranking: "2"
  },
  {
    imgSource: "imagemAsaDelta.webp",
    altImg: "Imagem da Aventura Asa Delta",
    descricao: "Passeio de Asa Delta na Pedra da Gávea",
    ranking: "3"
  },
]

app.get("/api/getcard", (req,res) => {
  const cardId = parseInt(req.query.id);
  res.send(banco[cardId]);
})

app.listen(port, () => {
  console.log(`Example app listening on port ${port}`)
})