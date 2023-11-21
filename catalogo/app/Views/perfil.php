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
            background-color: #6f42c1;
            background-image: url("/imgs/PerfilBackground.jpg");

            background-repeat: no-repeat;
            background-size: 120%;

        }


        form {
            text-align: center;
        }

        label {
            display: block;
            margin-bottom: 10px;
            color: #fff;
        }

        input {
            margin-bottom: 15px;
        }

        .button {
            display: inline-block;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            color: #fff;
            background-color: #845fda56;
            border-radius: 5px;
            margin-bottom: 5px;
        }

        .form-container {


            background-color: #4b209b;
            /* Fundo branco para o formulário */


            padding: 20px;
            border-radius: 20px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            /* Sombra suave */
            text-align: center;
        }
    </style>

</head>

<body>
    <div class="form-container">
        <h1>Perfil do Usuário</h1>
        <form action="<?= base_url('perfil/update') ?>" method="post">
            <label for="email">Email:</label>
            <input type="text" name="email" value="<?= $user->email ?>" required><br><br>

            <label for="current_password">Senha Atual:</label>
            <input type="password" name="current_password" required><br><br>

            <label for="password">Nova Senha:</label>
            <input type="password" name="password"><br><br>

            <input type="submit" class="button" value="ATUALIZAR PERFIL">
            <a href="<?= base_url('perfil/delete') ?>" class="button" onclick="return confirm('Tem certeza que deseja excluir sua conta?')">EXCLUIR CONTA</a>
            <br>
            <a href="/logout" class="button">PAGINA INICIAL</a>
            <a href="/produtos" class="button">VOLTAR</a>
    </div>

    </form>

    <br>




</body>

</html>