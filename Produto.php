<?php

class Produto
{
    public $id;
    public $produto;
    public $preco;
    public $descricao;
    public $tamanho;
    public $imagem;

    public function __construct($produto, $preco, $descricao, $tamanho, $imagem,)
    {
        $this->produto = $produto;
        $this->preco = $preco;
        $this->descricao = $descricao;
        $this->tamanho = $tamanho;
        $this->imagem = $imagem;
    }

    public function getId(){
        return $this->id;
    }

    public function getProduto()
    {
        return $this->produto;
    }
    public function getPreco()
    {
        return $this->preco;
    }

    public function getDescricao()
    {
        return $this->descricao;
    }

    public function getTamanho()
    {
        return $this->tamanho;
    }

    public function getImagem()
    {
        return $this->imagem;
    }

    public function getImagemDiretorio():string {
        return "img/uploads/" . $this->imagem;
    }

    public function setImagem(string $imagem): void
{
    $this->imagem = $imagem;
}
}
