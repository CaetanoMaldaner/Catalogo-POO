<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Produto</title>
    <link rel="stylesheet" href="<?= base_url('css/styles.css') ?>">
    <style>
        body {
            color: #fff;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        h1 {
            margin-bottom: 20px;
        }

        form {
            text-align: center;
            max-width: 400px;
            width: 100%;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"],
        textarea,
        select {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            display: inline-block;
            padding: 10px 20px;
            text-decoration: none;
            background-color: #845fda56;
            color: #fff;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #a172ee;
        }
    </style>
</head>

<body>
    <h1>Cadastrar Produto</h1>
    <form action="<?= base_url('produtos/store') ?>" method="post" enctype="multipart/form-data">
        <label for="nome">Nome do Produto:</label>
        <input type="text" name="nome" required><br><br>

        <label for="descricao">Descrição:</label>
        <textarea name="descricao" rows="4" required></textarea><br><br>

        <label for="preco">Preço:</label>
        <input type="text" name="preco" required><br><br>

        <label for="categoria_id">Categoria:</label>
        <select name="categoria_id" id="categoria_id">
            <?php foreach ($categorias as $categoria) : ?>
                <option value="<?php echo $categoria->id; ?>"><?php echo $categoria->nome; ?></option>
            <?php endforeach; ?>
        </select><br><br>

        <label for="imagem">Imagem do Produto:</label>
        <input type="file" name="imagem"><br><br>

        <input type="submit" value="Cadastrar Produto">
    </form>
</body>

</html>
