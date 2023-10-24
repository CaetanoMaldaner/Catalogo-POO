<?php if(session('errors')): ?>
    <div class="alert alert-danger"><?= implode('<br>', session('errors')) ?></div>
<?php endif; ?>

<form method="POST" action="/teste">
    <?= csrf_field() ?>

    
</form>

<!DOCTYPE html>
<html>
<head>
    <title>Lista de Usuários</title>
</head>
<body>
    <h2>Lista de Usuários</h2>



