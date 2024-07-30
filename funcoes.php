<?php

require_once 'Produto.php';

function todosOsProdutos(\PDO $pdo): array
{

    $sql = "SELECT * FROM produtos";
    $stmt = $pdo->query($sql);
    $produtosDados = $stmt->fetchAll(\PDO::FETCH_ASSOC);

    $produtos = [];

    foreach ($produtosDados as $produto) {
        $produtoObjeto = new Produto($produto['produto'], $produto['preco'], $produto['descricao'], $produto['tamanho'], $produto['imagem'] );
        $produtoObjeto->id = $produto['id_produto'];
        $produtos[] = $produtoObjeto;
    }

    return $produtos;
}

function adicionarNovoProduto(PDO $pdo, Produto $produto)
{
    $sql = "INSERT INTO produtos ( produto, preco, descricao, tamanho, imagem) VALUES (? , ? , ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$produto->produto,  $produto->preco, $produto->descricao, $produto->tamanho, $produto->getImagem()]);
}

function excluirProduto(\PDO $pdo, $idProduto): void
{
    $sql = "DELETE FROM produtos WHERE id_produto = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$idProduto]);
}

// function editarProduto(PDO $pdo, Produto $produto) {
//     $sql = "UPDATE produtos SET produto = ?, preco = ?, descricao = ?, tamanho = ?  WHERE id_produto = ?";
//     $stmt = $pdo->prepare($sql);
//     return
//     $stmt->execute([$produto->getProduto(), $produto->getPreco(), $produto->getDescricao(),  $produto->getTamanho(), $produto->id]);
// }
