<?php

require_once "../src/fornecedor_crud.php";
// Fornecedores

$id = $_GET['id'];
excluirFornecedores($conexao, $id);
header("location:listar.php");
exit;
?>
