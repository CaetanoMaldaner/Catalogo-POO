<!DOCTYPE html>
<html>

<head>
    <title>Editar Produto</title>
</head>

<body>
    <h1>Editar Produto</h1>
    <form action="<?= base_url('produtos/update/' . $produto->id) ?>" method="post" enctype="multipart/form-data">
        <label for="nome">Nome do Produto:</label>
        <input type="text" name="nome" value="<?= $produto->nome ?>" required><br><br>

        <label for="descricao">Descrição:</label>
        <textarea name="descricao" rows="4" required><?= $produto->descricao ?></textarea><br><br>

        <label for="preco">Preço:</label>
        <input type="text" name="preco" value="<?= $produto->preco ?>" required><br><br>

        <!-- Altere o nome do campo de categoria para categoria_id -->
        <label for="categoria_id">Categoria:</label>
        <select name="categoria_id" id="categoria_id">
            <?php foreach ($categorias as $categoria) : ?>
                <option value="<?php echo $categoria->id; ?>" <?= ($categoria->id == $produto->categoria_id) ? 'selected' : '' ?>>
                    <?php echo $categoria->nome; ?>
                </option>
            <?php endforeach; ?>
        </select><br><br>

        <label for="imagem">Imagem do Produto:</label>
        <input type="file" name="imagem"><br><br>

        <input type="submit" value="Atualizar Produto">
    </form>
</body>
</html>
