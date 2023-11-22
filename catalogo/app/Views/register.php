<!DOCTYPE html>
<html>

<head>
    <title>Registrar</title>
    <link rel="stylesheet" href="<?= base_url('css/styles.css') ?>">

    <style>
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 90vh;
            margin: 0;
            background-color: #6f42c1;
            background-image: url("/imgs/LoginRegisterBackground.jpg");
            background-repeat: no-repeat;
            background-size: 100%;

        }

        .form-container {
            background-color: #6f42c1;
            position: absolute;
            right: 0;
            margin: 70px;
            display: flex;
        }
    </style>

</head>

<body>
    <div class="container">
        <div class="header">
            <a class="button" href="<?= site_url('login') ?>">LOGIN</a>
        </div>

        <div class="form-container">

            <?php if (session('errors')) : ?>
                <div class="alert alert-danger"><?= implode('<br>', session('errors')) ?></div>
            <?php endif; ?>

            <form method="POST" action="/create">
                <input type="email" name="email" id="email" placeholder="Email" class="form-control" required>
                <input type="password" name="password" id="password" placeholder="Senha" class="form-control" required>
                <button type="submit" class="button">Criar usuário</button>
            </form>
        </div>
    </div>
</body>

</html>