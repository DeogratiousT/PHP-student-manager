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
        <h2>Register</h2>
    </div> 

    <form method="post" action="register.php">
        <?php include('errors.php'); ?>

        <div class="input-group">
            <label>Username</label>
            <input type="text" name="username">
        </div>
        <div class="input-group">
            <label>Email</label>
            <input type="text" name="email">
        </div>
        <div class="input-group">
            <label>Password</label>
            <input type="password" name="password1">
        </div>
        <div class="input-group">
            <label>Confirm Password</label>
            <input type="password" name="password2">
        </div>
        <div class="input-group">
                <label>Role</label>
                <select name="role">
                    <option value="student">Student</option>
                    <option value="lecturer">Lecturer</option>
                    <option value="manager">Manager</option>
                </select>
            </div>
        <div class="input-group">
            <button type="submit" name="register" class="btn btn-success">Register</button>
        </div>
        <hr>
        <p>Already have an account? <a href="index.php">Sign in</a></p>
    </form>
</body>
</html>