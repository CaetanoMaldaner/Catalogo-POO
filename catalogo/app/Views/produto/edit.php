<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Produto</title>
</head>

<body>
    <h1>Editar Produto</h1>
    <form action="<?= base_url('produtos/update/' . $produto->id) ?>" method="post" enctype="multipart/form-data">
        <!-- Campos do formulário preenchidos com os dados atuais do produto -->
        <label for="nome">Nome:</label>
        <input type="text" name="nome" value="<?= $produto->nome ?>" required><br><br>

        <label for="descricao">Descrição:</label>
        <textarea name="descricao" required><?= $produto->descricao ?></textarea><br><br>

        <label for="preco">Preço:</label>
        <input type="text" name="preco" value="<?= $produto->preco ?>" required><br><br>

        <label for="categoria_id">Categoria:</label>
        <select name="categoria_id">
            <?php foreach ($categorias as $categoria) : ?>
                <option value="<?= $categoria->id ?>" <?= ($produto->categoria_id == $categoria->id) ? 'selected' : '' ?>>
                    <?= $categoria->nome ?>
                </option>
            <?php endforeach; ?>
        </select><br><br>

        <label for="imagem">Imagem:</label>
        <input type="file" name="imagem"><br><br>

        <input type="submit" value="Atualizar Produto">
    </form>
</body>

</html>