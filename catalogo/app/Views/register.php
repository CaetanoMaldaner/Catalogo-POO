<!DOCTYPE html>
<html>

<head>
    <title>Registrar</title>
    <link rel="stylesheet" href="<?= base_url('css/styles.css') ?>">
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