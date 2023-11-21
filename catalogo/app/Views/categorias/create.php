<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Nova Categoria</title>
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
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border-radius: 8px;
        }

        input[type="submit"],
        a.button {
            display: inline-block;
            padding: 10px 20px;
            text-decoration: none;
            background-color: #845fda56;
            color: #fff;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover,
        a.button:hover {
            background-color: #a172ee;
        }
    </style>
</head>

<body>
    <h1>Criar Nova Categoria</h1>

    <form action="<?= base_url('categorias/store') ?>" method="post">
        <label for="nome">Nome da Categoria:</label>
        <input type="text" name="nome" required><br><br>
        <input type="submit" value="Criar Categoria">
        <a href="<?= base_url('produtos') ?>" class="button">VOLTAR </a>
       
    </form>
</body>

</html>
