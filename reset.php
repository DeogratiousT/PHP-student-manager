<?php include ('server.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="app.css">
</head>
<body>
    <div class="header">
        <h2>Password Reset</h2>
    </div> 

    <form method="post" action="reset.php">
        <?php include('errors.php'); ?>

        <div class="input-group">
            <label>New Password</label>
            <input type="password" name="password1">
        </div>
        <div class="input-group">
            <label>Confirm Password</label>
            <input type="password" name="password2">
        </div>

        <div class="input-group">
            <button type="submit" name="login" class="btn btn-success">Submit</button>
        </div>

    </form>
</body>
</html>