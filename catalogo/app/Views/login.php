<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <link rel="stylesheet" href="<?= base_url('css/styles.css') ?>">
    <style>
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
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

        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <a href="/register" class="button">REGISTER</a>
        </div>


        <?php if (session()->getFlashdata('error')) : ?>
            <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
        <?php endif; ?>
        
        <div class="form-container">
            <form action="/authenticate" method="post">
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" name="email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Senha</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
            </form>
        </div>
    </div>
</body>

</html>