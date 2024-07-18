<?php

require_once 'vendor/autoload.php';
require 'funcoes.php';
require "conexao-bd.php"; 


$id= $_POST['id'];

$produtoAtual = [
    'produto' => $_POST['produto'],
    'preco' => $_POST['preco'],
    'descricao' => $_POST['descricao'],
    'tamanho' => $_POST['tamanho'],
];

$novoProduto = new Produto(
    $produtoAtual['produto'],
    $produtoAtual['preco'],
    $produtoAtual['descricao'],
    $produtoAtual['tamanho'],
);


$novoProduto->id = $id;

if (editarProduto($pdo, $novoProduto)) {
    echo "<p>Tudo OK</p>";
} else {
    echo "<p>Nada OK</p>";
}