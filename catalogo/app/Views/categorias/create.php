<!DOCTYPE html>
<html>

<head>
    <title>Criar Nova Categoria</title>
</head>

<body>
    <h1>Criar Nova Categoria</h1>
    <form action="<?= base_url('categorias/store') ?>" method="post">
        <label for="nome">Nome da Categoria:</label>
        <input type="text" name="nome" required><br><br>
        <input type="submit" value="Criar Categoria">
        <a href="<?= base_url('produtos') ?>" class="button">Retornar para o Catálogo</a>
    </form>
</body>

</html>