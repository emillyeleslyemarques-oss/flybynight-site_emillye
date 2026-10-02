<?php
require_once "../src/lojas_crud.php";

if($_SERVER['REQUEST_METHOD'] === "POST"){
    $nome = $_POST ['nome'];
    inserirLoja($conexao, $nome);

    // apos inserir, redirecionamos para listar.php
    header("location:listar.php");

    // E paramos qualquer outro possivel script
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar loja - Fly By Night</title>
    <link rel="stylesheet" href="../css/estilos.css">
</head>

<body>
    <?php
    $caminhoBase = '../';
    $secaoAtual = 'lojas';
    require '../componentes/cabecalho.php';
    ?>
    <main>
        <h2>Cadastrar loja</h2>
        <!-- Modelo visual: os campos não são enviados nem persistidos. -->
        <form action="" method="post">
            <div>
                <label for="nome">Nome:</label>
                <input type="text" name="nome" id="nome" maxlength="100" required>
            </div>
            <button type="submit">Salvar</button>
        </form>
        <a href="listar.php">← Voltar</a>
    </main>
</body>

</html>