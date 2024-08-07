<?php

require_once 'vendor/autoload.php';
require 'Produto.php';
require 'funcoes.php';
require "conexao-bd.php";


$novoProduto = $_POST;
if (!$novoProduto['produto']) {
    header('Location: index.php');
    exit;
}

$produto = new Produto(
    $novoProduto['produto'],
    $novoProduto['preco'],
    $novoProduto['descricao'],
    $novoProduto['tamanho'],
    $novoProduto['imagem'],
);

if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
    $novoNomeImagem = uniqid() . '_' . $_FILES['imagem']['name'];

    $caminhoDestino = 'img/uploads/' . $novoNomeImagem;

    if (move_uploaded_file($_FILES['imagem']['tmp_name'], $caminhoDestino)) {
        $produto->setImagem($novoNomeImagem);
    } else {
        echo 'Erro ao mover o arquivo enviado.';
    }
}


adicionarNovoProduto($pdo, $produto);
header('Location: index.php');
