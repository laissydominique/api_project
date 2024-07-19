<?php

require_once 'vendor/autoload.php';
require 'Produto.php';
require 'funcoes.php';
require "conexao-bd.php";

$produtos = todosOsProdutos($pdo);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/frontend.css">
    <title> GlamX </title>
</head>

<body>
    <div class="saudacao">
    <h1> Glam<span>X</span></h1>
    <br>
    <p class="frase" >Transforme seu estilo com <span >elegância e inovação</span>. descubra a <span> beleza</span> em cada detalhe!</p>

    </div>

    <div class="container">
        <div class="produtos">
            <?php foreach ($produtos as $produto) : ?>
                <div class="item"> 
                <div class="produto">
                <p> <?= $produto->produto ?> </p>
                </div>
                <div class="imagem">
                    <img src="img/image.png" alt="" width="100px">
                </div>
                <div class="preco"> 
                <p> <?= $produto->preco ?> </p>
                </div>
                <div class="descricao"> 
                <p> <?= $produto->descricao ?> </p>
                </div>
                <div class="tamanho"> 
                <p> <span class="spantamanho"></span> <?= $produto->tamanho ?> </p>
                </div>
                </div>
            <?php endforeach; ?>
        </div>
</body>

</html>