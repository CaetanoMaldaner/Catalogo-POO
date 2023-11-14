<!DOCTYPE html>
<html>

<head>
    <title>Criar Nova Categoria</title>
    <link rel="stylesheet" href="<?= base_url('css/styles.css') ?>">
</head>

<body style="color: #fff;">
    <h1>Criar Nova Categoria</h1>

    <form action="<?= base_url('categorias/store') ?>" method="post">
        <label for="nome" style="color: #fff;">Nome da Categoria:</label>
        <input type="text" name="nome" required><br><br>
        <input type="submit" value="Criar Categoria">
        <a href="<?= base_url('produtos') ?>" class="button" style="color: #fff;">RETORNAR PARA O CATALOGO</a>
    </form>
</body>

</html>
