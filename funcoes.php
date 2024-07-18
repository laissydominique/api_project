<?php


function todosOsProdutos(\PDO $pdo): array
{

    $sql = "SELECT * FROM produtos";
    $stmt = $pdo->query($sql);
    $produtosDados = $stmt->fetchAll(\PDO::FETCH_ASSOC);

    $produtos = [];

    foreach ($produtosDados as $produto) {
        $produtoObjeto = new Produto($produto['produto'], $produto['preco'], $produto['descricao'], $produto['tamanho']);
        $produtoObjeto->id = $produto['id_produto'];
        $produtos[] = $produtoObjeto;
    }

    return $produtos;
}

function adicionarNovoProduto(PDO $pdo, Produto $produto)
{
    $sql = "INSERT INTO produtos ( produto, preco, descricao, tamanho) VALUES (? , ? , ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$produto->produto,  $produto->preco, $produto->descricao, $produto->tamanho]);
}

function excluirProduto(\PDO $pdo, $idProduto): void
{
    $sql = "DELETE FROM produtos WHERE id_produto = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$idProduto]);
}

function editarProduto(\PDO $pdo, $idProduto) {
    
 
    $sql = "UPDATE produtos SET produto = ?, preco = ?, descricao = ?, tamanho = ?  WHERE id_produto = ?";
    $stmt = $pdo->prepare($sql);
    return
    $stmt->execute([$idProduto->getProduto(), $idProduto->getPreco(), $idProduto->getDescricao(),  $idProduto->getTamanho(), $idProduto->id]);
}
