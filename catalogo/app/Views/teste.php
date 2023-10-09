<?php if(session('errors')): ?>
    <div class="alert alert-danger"><?= implode('<br>', session('errors')) ?></div>
<?php endif; ?>

<form method="POST" action="/teste">
    <?= csrf_field() ?>

    
</form>
