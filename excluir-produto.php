<?php

require_once 'vendor/autoload.php';
require 'funcoes.php';
require "conexao-bd.php"; 


$idProduto = $_GET['id'];

excluirProduto($pdo, $idProduto);

header('Location: index.php');
