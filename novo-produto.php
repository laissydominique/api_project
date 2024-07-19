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
);

adicionarNovoProduto($pdo, $produto);
header('Location: index.php');
