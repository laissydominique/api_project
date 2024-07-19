<?php

class Produto
{

    public $id;
    public $produto;
    public $preco;
    public $descricao;
    public $tamanho;
    // public $imagem;


    public function __construct($produto, $preco, $descricao, $tamanho, )
    {
        $this->produto = $produto;
        $this->preco = $preco;
        $this->descricao = $descricao;
        $this->tamanho = $tamanho;
        // $this->imagem = $imagem;

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

    // public function getImagem()
    // {
    //     return $this->imagem;
    // }
}
