<?php
require_once "../src/lojas_crud.php";

$id = $_GET['id'];
 excluirLoja($conexao, $id);
 header("location:listar.php");
exit;
?>