<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="<?= base_url('css/styles.css') ?>">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil do Usuário</title>

    <style>
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            color: #fff;
        }

        form {
            text-align: center;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #fff;
        }

        input {
            margin-bottom: 8px;
        }

        .button {
            display: inline-block;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            color: #fff;
            background-color: #845fda56;
            border-radius: 5px;
            margin-bottom: 8px;
        }
    </style>

</head>

<body>
    <h1>Perfil do Usuário</h1>
    <form action="<?= base_url('perfil/update') ?>" method="post">
        <label for="email">Email:</label>
        <input type="text" name="email" value="<?= $user->email ?>" required><br><br>

        <label for="current_password">Senha Atual:</label>
        <input type="password" name="current_password" required><br><br>

        <label for="password">Nova Senha:</label>
        <input type="password" name="password"><br><br>

        <input type="submit" class="button" value="ATUALIZAR PERFIL">


    </form>
    <br>
    <a href="/logout" class="button">PAGINA INICIAL</a>
    <a href="/produtos" class="button">VOLTAR</a>
    <a href="<?= base_url('perfil/delete') ?>" class="button" onclick="return confirm('Tem certeza que deseja excluir sua conta?')">EXCLUIR CONTA</a>


</body>

</html>