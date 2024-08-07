 <?php

require_once 'vendor/autoload.php';
require 'funcoes.php';
require "conexao-bd.php"; 
require_once "Produto.php"; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id = $_POST['id'];
    $produtoNome = $_POST['produto'];
    $preco = $_POST['preco'];
    $descricao = $_POST['descricao'];
    $tamanho = $_POST['tamanho'];

    // Manter o nome da imagem existente, ou processar o upload da nova imagem
    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
        $imagem = uniqid() . '_' . basename($_FILES['imagem']['name']);
        $caminhoDestino = 'img/uploads/' . $imagem;

        if (!move_uploaded_file($_FILES['imagem']['tmp_name'], $caminhoDestino)) {
            echo 'Erro ao mover o arquivo enviado.';
            exit;
        }
    } else {
        // Se nenhuma nova imagem foi enviada, manter a imagem existente
        $imagem = $_POST['imagem']; // Certifique-se de passar o nome da imagem existente no formulário
    }

    $produto = new Produto($produtoNome, $preco, $descricao, $tamanho, $imagem);
    $produto->id = $id;

    if (editarProduto($pdo, $produto)) {
        echo '<p>Produto atualizado com sucesso!</p>';
    } else {
        echo '<p>Erro ao atualizar o produto.</p>';
    }

    // Redirecionar após o processamento
    header('Location: index.php');
    exit;
}
