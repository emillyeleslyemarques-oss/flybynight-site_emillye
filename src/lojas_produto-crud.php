<?php
require_once "conecta.php";
function buscarLojasProdutos(PDO $conexao): array
{
    $sql = "SELECT * FROM lojas_produtos";

    $consulta = $conexao->query($sql);

    return $consulta->fetchAll();
}

function inserirLojaProduto(PDO $conexao, int $loja_id, int $produto_id, int $estoque): void
{
    $sql = "INSERT INTO lojas_produtos (loja_id, produto_id, estoque) 
     VALUES (:loja_id, :produto_id, :estoque)";
    $consulta = $conexao->prepare($sql);
    $consulta->bindValue(":loja_id", $loja_id);
    $consulta->bindValue(":produto_id", $produto_id);
    $consulta->bindValue(":estoque", $estoque);
    $consulta->execute();
}

function buscarLojaProdutoPorIds(PDO $conexao, int $loja_id, int $produto_id): array
{
    $sql = "SELECT * FROM lojas_produtos WHERE loja_id = :loja_id AND produto_id = :produto_id";
    $consulta = $conexao->prepare($sql);
    $consulta->bindValue(":loja_id", $loja_id);
    $consulta->bindValue(":produto_id", $produto_id);
    $consulta->execute();
    return $consulta->fetch();
}

function atualizarLojaProduto(PDO $conexao, int $loja_id, int $produto_id, int $estoque): void
{
    $sql = "UPDATE lojas_produtos SET estoque = :estoque WHERE loja_id = :loja_id AND produto_id = :produto_id";
    $consulta = $conexao->prepare($sql);
    $consulta->bindValue(":estoque", $estoque);
    $consulta->bindValue(":loja_id", $loja_id);
    $consulta->bindValue(":produto_id", $produto_id);
    $consulta->execute();
}
