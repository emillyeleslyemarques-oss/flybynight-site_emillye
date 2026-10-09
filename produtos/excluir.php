<?php

require_once "../src/produto_crud.php";
// Produtos

$id = $_GET['id'];
excluirProduto($conexao, $id);
header("location:listar.php");
exit;
?>