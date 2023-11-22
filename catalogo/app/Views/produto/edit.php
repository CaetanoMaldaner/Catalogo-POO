<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('css/styles.css') ?>">
    <title>Editar Produto</title>

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
            margin-bottom: 5px;
            
        }

        input[type="text"],
        textarea,
        select {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border-radius: 10px;
        }

        input[type="submit"] {
            display: inline-block;
            padding: 10px 20px;
            text-decoration: none;
            background-color: #845fda56;
            color: #fff;
            border-radius: 20px;
            transition: background-color 0.3s ease;
      
        }

        input[type="submit"]:hover {
            background-color: #a172ee;
            border-radius: 5px;
        }
    </style>
    
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