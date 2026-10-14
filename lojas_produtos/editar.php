<?php 
require_once "../src/lojas_produto-crud.php";
require_once "../src/lojas_crud.php";
require_once "../src/produto_crud.php";

$loja_id = $_GET ['loja_id'];
$produto_id = $_GET ['produto_id'];

$produtos = buscarProdutos($conexao);
$lojas = buscarLojas($conexao);
$lojaProduto = buscarLojaProdutoPorIds($conexao, $loja_id, $produto_id);

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $loja_id = $_POST ['loja_id'];
    $produto_id = $_POST ['produto_id'];
    $estoque = $_POST ['estoque'];

    atualizarLojaProduto($conexao, $loja_id, $produto_id, $estoque);

    header("location: listar.php");
    exit;
}

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar produto em uma loja - Fly By Night</title>
    <link rel="stylesheet" href="../css/estilos.css">
</head>

<body>
    <?php
    $caminhoBase = '../';
    $secaoAtual = 'lojas_produtos';
    require '../componentes/cabecalho.php';
    ?>
    <main>
        <h2>Editar produto em uma loja</h2>
        <!-- Modelo visual: os campos não são enviados nem persistidos. -->
        <!-- Os campos serão preenchidos com os dados do registro selecionado. -->
        <form action="" method="post">

            <div>
                <label for="loja">Loja:</label>
                <select name="loja" id="loja" required>
                    <?php foreach ($lojas as $loja) { ?>
                    <option value="<?= $loja['id'] ?>"
                    <?= $loja['id'] == $lojaProduto['loja_id']? 'selected': ''?>>
                    <?=$loja['nome']  ?></option>
                    <?php } ?>
                    <!-- As opções serão preenchidas com os registros do banco de dados. -->
                </select>
            </div>

            <div>
                <label for="produto">Produto:</label>
                <select name="produto" id="produto" required>
                     <?php foreach ($produtos as $produto) { ?>
            <option value="<?= $produto['id'] ?>"
                <?= $produto['id'] == $lojaProduto['produto_id'] ? 'selected' : '' ?>>
                <?= $produto['nome_produto'] ?>
            </option>
        <?php } ?>
                </select>
            </div>
            <div>
                <label for="estoque">Estoque:</label>
                <input type="number" name="estoque" id="estoque" value="<?= $lojaProduto['estoque'] ?>" min="0" step="1" required>
            </div>
            <button type="submit">Atualizar</button>
        </form>
        <a href="listar.php">← Voltar</a>
    </main>
</body>

</html>