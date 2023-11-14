<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil do Usuário</title>
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

        <input type="submit" value="Atualizar Perfil">
    </form>

    <a href="<?= base_url('perfil/delete') ?>" onclick="return confirm('Tem certeza que deseja excluir sua conta?')">Excluir Conta</a>
</body>

</html>