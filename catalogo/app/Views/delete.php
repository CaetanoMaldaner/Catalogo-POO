<!-- delete.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete User</title>
</head>
<body>
    <h2>Delete User</h2>
    <p>Are you sure you want to delete this user?</p>
    <form method="post" action="delete<?php echo $user['id']; ?>">
        <input type="submit" value="Delete" />
    </form>
</body>
</html>
