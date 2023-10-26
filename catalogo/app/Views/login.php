<?php if(session()->getFlashdata('error')): ?>
    <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
<?php endif;?>


<form action="/authenticate" method="post">
    <div class="form-group">
        <label>Email</label>
        <input type="text" name="email" class="form-control" required>
    </div>
    <div class="form-group">
<<<<<<< HEAD
        <label>Senha</label>
        <input type="password" name="senha" class="form-control" required>
=======
        <label>Password</label>
        <input type="password" name="password" class="form-control" required>
>>>>>>> 2ce5089e35335f15da69ac0210cde32a07bdcb45
    </div>
    <button type="submit" class="btn btn-primary">Login</button>
</form>
