<?php
// fornecedores editar.php

// importando
require_once "../src/fornecedor_crud.php";

// Acessar a url e pegar o valor do parâmetro (id) existente nela
// ATENÇAO ao nome dado dp parametro que voce criou no link
//deve ser o mesmo do GET
$id = $_GET['id'];

//1: Chamamos a função passamos o id para ela 
//2: Ao termino, a função DEVOLVE (retorna) um array com os dados do fornecedor 
$fornecedor = buscarFornecedorPorID($conexao, $id);


if($_SERVER['REQUEST_METHOD'] === 'POST'){

    // capturamos o nome digiado no formulario
    $nome = $_POST['nome'];

    // chamamos a função de UPDATE (passando os dados para ela)
    atualizarFornecedor($conexao, $id, $nome);

    // redirecionamos para a pagina que mostra todos os fornecedores
    header('location:listar.php');

    // encerramos qualquer outro processo
    // SEMPRE use exit apos o redirecionamento com header()
    exit;
}

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar fornecedor - Fly By Night</title>
    <link rel="stylesheet" href="../css/estilos.css">
</head>

<body>
    <?php
    $caminhoBase = '../';
    $secaoAtual = 'fornecedores';
    require '../componentes/cabecalho.php';
    ?>
    <main>
        <h2>Editar fornecedor</h2>
        <!-- Modelo visual: os campos não são enviados nem persistidos. -->
        <!-- Os campos serão preenchidos com os dados do registro selecionado. -->
        <form action="" method="post">
            <!-- Usamos um campo oculto (input hidden) para garantir que o 
             formulario tambem possui o id do fornecedor -->
            <input type="hidden" name="id" value="<?= $fornecedor['id'] ?>">
            <div>
                <label for="nome">Nome:</label>
                <input value="<?= $fornecedor['nome'] ?>" type="text" name="nome" id="nome" maxlength="100" required>
            </div>
            <button type="submit">Atualizar</button>
        </form>
        <a href="listar.php">← Voltar</a>
    </main>
</body>

</html>