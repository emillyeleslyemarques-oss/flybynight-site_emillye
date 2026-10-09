<?php
// produtos/editar.php
/* Exercicios */
// Parte 1
// 1) Importar os arquivos de função de fornecedores e produtos
require_once "../src/fornecedor_crud.php";
require_once "../src/produto_crud.php";

// 2) Capturar e guardar o id do produto que será carregado/atualizado
$id = $_GET['id'];

// 3) Chamar a função buscarFornecedores e receber a lista de fornecedores (guarde em um varaiavel chamada $fornecedores)
$fornecedores = buscarFornecedores($conexao);
// 4) Chamar a função buscarProdutoId e receber os dados do produto (guarde em uma variavel chamada $produto)
$produto = buscarProdutoPorId($conexao, $id);

//PARTE 2

//1) detectar o acionamento do formulario de atualização
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];
    $quantidade = $_POST['quantidade'];
    $fornecedor_id = $_POST['fornecedor'];

    atualizarProduto($conexao, $id, $nome, $descricao, $preco, $quantidade, $fornecedor_id);

    header("location:listar.php");
  exit;
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar produto - Fly By Night</title>
    <link rel="stylesheet" href="../css/estilos.css">
</head>

<body>
    <?php
    $caminhoBase = '../';
    $secaoAtual = 'produtos';
    require '../componentes/cabecalho.php';
    ?>
    <main>
        <h2>Editar produto</h2>
        <!-- PARTE 1  -->
        <!-- 5) Exibir os dados do produto em cada campo do formulario
          no caso dos campos input, uso o atributo value.
          No caso do campo textarea, coloque o valor dentro da tag. -->
        <form action="" method="post">
            <input type="hidden" name="id" value="<?= $produto['id'] ?>">
            <div>
                <label for="nome">Nome:</label>
                <input type="text" name="nome" id="nome" maxlength="100" value="<?= $produto['nome'] ?>" required>
            </div>
            <div>
                <label for="descricao">Descrição:</label>
                <textarea name="descricao" id="descricao" rows="5"><?= $produto['descricao'] ?></textarea>
            </div>
            <div>
                <label for="preco">Preço:</label>
                <input type="number" name="preco" id="preco" min="0" step="0.01" value="<?= $produto['preco'] ?>" required>
            </div>
            <div>
                <label for="quantidade">Quantidade:</label>
                <input type="number" name="quantidade" id="quantidade" min="0" step="1" value="<?= $produto['quantidade'] ?>" required>
            </div>
            <div>
                <label for="fornecedor">Fornecedor:</label>
                <select name="fornecedor" id="fornecedor" required>
                    <option value=""></option>
                    <!--PARTE 1  -->
                    <!-- 6) DESAFIO
                    6.1) Usando foreach, acessa os $fornecedores e mostre na tag <option>
                    os nomes de cada forncedor. No atributo value, coloque id de cada fornecedor.
                   
                    6.2)O fornecedor daquele produto que esta sendo exibido ja DEVE IR SELECIONADO.
                    programe os recursos para isso acontecer.-->
                    <?php foreach ($fornecedores as $fornecedor): ?>
                        <!-- A condicional abaixo (feita dentro da tag do option)
                         faz com que o fornecedor do produto que esta sendo editado
                         ja venha selecionado, a logica geral é:
                              se o id do fornecedor (que vem de $fornecedor['id']) for o mesmo
                              do que esta registrado no produto (que vem de ($produto['fornecedor_id']),
                              entao aplique o atributo "selected". caso contrario nao faça nada -->
                        <option value="<?= $fornecedor['id'] ?>"
                            <?= $fornecedor['id'] == $produto['fornecedor_id'] ? 'selected' : '' ?>>
                            <?= $fornecedor['nome'] ?>
                        </option>
                    <?php endforeach; ?>


                </select>
            </div>
            <button type="submit">Atualizar</button>
        </form>
        <a href="listar.php">← Voltar</a>
    </main>
</body>