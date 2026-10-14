<?php
require_once "../src/lojas_produto-crud.php";

$loja_id = $_GET['loja_id'];
$produto_id = $_GET['produto_id'];

excluirLojaProduto($conexao, $loja_id, $produto_id);

header("Location: listar.php");