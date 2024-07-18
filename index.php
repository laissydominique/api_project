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
    <link rel="stylesheet" href="styles/styles.css">
    <title>Backend Admin GlamX </title>
</head>

<body>
    <div class="container">
        <div class="saudacao">
            <h1>Bem vindo ao Backend da GlamX</h1>
            <h2>Insira, exclua ou edite novos produtos</h2>
        </div>

        <div class="inputs">
            <form action="/novo-produto.php" method="post">
                <div class="produto">
                    <label for="produto">Produto</label>
                    <input type="text" name="produto" id="produto" placeholder="Digite o novo produto:" required>
                </div>

                <div class="preco">
                    <label for="preco">Valor de venda</label>
                    <input type="text" name="preco" id="preco" placeholder="Digite o valor de venda:" required>
                </div>

                <div class="descricao">
                    <label for="descricao">Descrição</label>
                    <input type="text" name="descricao" id="descricao" placeholder="Faça uma breve descrição do produto:" required>
                </div>

                <div class="tamanho">
                    <label for="tamanho">Tamanho</label>
                    <input type="text" name="tamanho" id="tamanho" placeholder="Informe o tamamho" required>
                </div>
        <div class="btn">
        <button>Salvar</button>
            </div>
            </form>
        </div>




        <div class="tabela-de-produtos">
            <table>
                <thead>
                    <tr>
                        <th class="feito">Produto</th>
                        <th class="tarefa">Valor de venda</th>
                        <th class="descricao">Descrição</th>
                        <th class="tamanho">Descrição</th>
                        <th class="eliminar">Eliminar</th>
                        <th class="editar">Editar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($produtos as $produto) : ?>
                        <tr>
                            <td>
                                <p class="produto"> <?= $produto->produto ?> </p>
                            </td>
                            <td>
                                <p class="preco"> <?= $produto->preco ?> </p>
                            </td>
                            <td>
                                <p class="descricao"> <?= $produto->descricao ?> </p>
                            </td>
                            <td>
                                <p class="tamanho"> <?= $produto->tamanho ?> </p>
                            </td>
                            <td><a href="excluir-produto.php?id=<?= $produto->id ?>">Excluir</a></td>
                            <!-- <td><a href="editar-produto.php?id=" >Editar</a></td> -->
                        </tr>
                    <?php endforeach; ?>
                </tbody>

            </table>
        </div>

    </div>
</body>

</html>