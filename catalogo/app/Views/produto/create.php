<!DOCTYPE html>
<html>
<head>
    <title>Cadastrar Produto</title>
</head>
<body>
    <h1>Cadastrar Produto</h1>
    <form action="<?= base_url('produtos/store') ?>" method="post" >
        <label for="nome">Nome do Produto:</label>
        <input type="text" name="nome" required><br><br>

        <label for="descricao">Descrição:</label>
        <textarea name="descricao" rows="4" required></textarea><br><br>

        <label for="preco">Preço:</label>
        <input type="text" name="preco" required><br><br>

        <label for="categoria">Categoria:</label>
        <select name="categoria" id="categoria">
            <?php foreach ($categorias as $categoria) : ?>
                <option value="<?php echo $categoria->id; ?>"><?php echo $categoria->nome; ?></option>
            <?php endforeach; ?>
        </select><br><br>

        <input type="submit" value="Cadastrar Produto">
    </form>
</body>
</html>
