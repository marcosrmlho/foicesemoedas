<?php
include '../../enviroment.php';
include '../banco.php';

if ($conn->query("insert into passeio (idPasseio, horaInicio, dataInicio, horaFinal, dataFinal, nome, ranking, valor, imgSource, altImg, cardDir, descricao)
VALUES
('1', '12:00:00', '2024-12-01', '13:00:00', '2024-12-01', 'Passeio de Asa Delta na Pedra da Gávea', '10', '140.00', 'imagemAsaDelta.webp', 'Imagem da Aventura Asa Delta', 'cardAsaDelta',
'Voe sobre o Rio de Janeiro e viva uma experiência única de liberdade!
O passeio de asa-delta tem como ponto de partida a Pedra da Gávea, uma das formações rochosas mais icônicas da cidade.
Inclui transporte até o local, equipamento completo e acompanhamento de um instrutor experiente para garantir a segurança e aproveitar ao máximo o voo.
Durante o trajeto, você contemplará vistas deslumbrantes de praias, florestas e montanhas, finalizando com um pouso suave na Praia de São Conrado.
Ideal para aventureiros e amantes de natureza!')")){
    echo "Passeio Asa Delta criado! <br>";
}

if ($conn->query("insert into passeio (idPasseio, horaInicio, dataInicio, horaFinal, dataFinal, nome, ranking, valor, imgSource, altImg, cardDir, descricao)
VALUES
('2', '10:00:00', '2024-11-15', '10:00:00', '2024-11-16', 'Salto de Bungee Jump no Corcovado', '9', '220.00', 'imagemBungeeJump.jpg', 'Imagem da Aventura Bungee Jump', 'cardBungeeJump',
'Adrenalina e vistas inesquecíveis te esperam neste salto de bungee jump no Corcovado, um dos cartões-postais mais famosos do Rio de Janeiro! 
A experiência inclui transporte até o local, equipamentos de segurança de alta qualidade e acompanhamento de instrutores especializados. 
Prepare-se para sentir a emoção de um salto livre com o Cristo Redentor e as paisagens deslumbrantes da cidade como pano de fundo. 
Ideal para quem busca superar limites e viver momentos únicos de aventura!')")){
    echo "Passeio Bungee Jump criado!";
}

?>