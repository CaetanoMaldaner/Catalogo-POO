<?php if( session('errors')): ?>
    <div class="alert alert-danger"><?= implode('<br>',  session('errors')) ?></div>
<?php endif;?>

<form method="POST" action="/createUser">
    <input type="email" name="email" id="email" />
    <input type="password" name="password" id="password" />
    <button type="submit">Criar usuário</button>
</form>