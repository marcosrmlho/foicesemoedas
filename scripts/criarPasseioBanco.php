<?php

include '../enviroment.php';
include '../banco/banco.php';
include '../scripts/funcoesUniversais.php';
include '../scripts/checkCarrinho.php';


$horaInicio = ($conn->real_escape_string($_POST['horaInicio']));
$horaFinal = ($conn->real_escape_string($_POST['horaFinal']));
$dataInicio = ($conn->real_escape_string($_POST['dataInicio']));
$dataFinal = ($conn->real_escape_string($_POST['dataFinal']));
$nome = ($conn->real_escape_string($_POST['nome']));
$ranking = ($conn->real_escape_string($_POST['ranking']));
$valor = ($conn->real_escape_string($_POST['valor']));
$descricao = ($conn->real_escape_string($_POST['descricao']));
$altImg = ($conn->real_escape_string($_POST['altImg']));

// Caminho absoluto para a pasta de upload na raiz do sistema
$uploadDir = $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'foicesemoedas' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'imagens' . DIRECTORY_SEPARATOR . 'imgPasseios';


// Verificar se a pasta de destino existe, caso contrário, criar
if (!file_exists($uploadDir)) {
    if (!mkdir($uploadDir, 0775, true)) {
        die('Erro ao criar a pasta de destino.');
    }
}

// Verifica se há um arquivo enviado via FormData
if (isset($_FILES['imgSource']) && $_FILES['imgSource']['error'] === UPLOAD_ERR_OK) {
    // Obter informações do arquivo enviado
    $arquivoTmp = $_FILES['imgSource']['tmp_name'];
    $nomeOriginal = $_FILES['imgSource']['name'];
    $tamanho = $_FILES['imgSource']['size'];
    $tipo = $_FILES['imgSource']['type'];

    // Validar extensão do arquivo
    $extensao = strtolower(pathinfo($nomeOriginal, PATHINFO_EXTENSION));
    $extensoesPermitidas = ['jpg', 'jpeg', 'png', 'gif'];

    if (!in_array($extensao, $extensoesPermitidas)) {
        die('Erro: Apenas arquivos .jpg, .jpeg, .png, .gif são permitidos.');
    }

    // Gerar um novo nome único para o arquivo
    $novoNome = uniqid('img_', true) . '.' . $extensao;

    // Caminho completo para salvar o arquivo
    $caminhoDestino = $uploadDir . DIRECTORY_SEPARATOR . $novoNome;

    // Movendo o arquivo para o destino final
    if (move_uploaded_file($arquivoTmp, $caminhoDestino)) {
        $imgSource = $novoNome;
        $cardDir = explode("img_", $novoNome)[1];

        $quantidadePasseios = intval($conn->query("SELECT COUNT(*) AS total FROM Passeio")->fetch_assoc()['total']) + 1;

        // Usando consulta preparada
        $stmt = $conn->prepare("INSERT INTO Passeio (
            idPasseio, horaInicio, dataInicio, horaFinal, dataFinal, nome, ranking, valor, imgSource, altImg, cardDir, descricao
        ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        
        $stmt->bind_param(
            "isssssssssss",
            $quantidadePasseios, 
            $horaInicio,         
            $dataInicio,         
            $horaFinal,          
            $dataFinal,          
            $nome,               
            $ranking,            
            $valor,              
            $imgSource,          
            $altImg,             
            $cardDir,            
            $descricao           
        );

        if ($stmt->execute()) {
            header("location: ../source/home.php");
            exit();
        } else {
            echo "Erro ao inserir passeio: " . $stmt->error;
        }
    } else {
        echo json_encode([
            'status' => 'erro',
            'mensagem' => 'Erro ao salvar o arquivo no servidor.'
        ]);
    }
} else {
    echo json_encode([
        'status' => 'erro',
        'mensagem' => 'Nenhum arquivo foi enviado ou ocorreu um erro no upload.'
    ]);
}
?>
