<?php

require_once "../src/produto_crud.php";
// Fornecedores

$id = $_GET['id'];
excluirProduto($conexao, $id);
header("location:listar.php");
exit;
?>