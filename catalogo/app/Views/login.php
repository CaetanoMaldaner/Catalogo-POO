<?php if(session()->getFlashdata('error')): ?>
    <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
<?php endif;?>


<form action="/authenticate" method="post">
    <div class="form-group">
        <label>Username0</label>
        <input type="text" name="email" class="form-control" required>
    </div>
    <div class="form-group">
        <label>Password</label>
        <input type="password" name="senha" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Login</button>
</form>
