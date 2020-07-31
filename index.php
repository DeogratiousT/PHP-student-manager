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
        <h2>Login</h2>
    </div> 

    <form method="post" action="index.php">
    <?php if (isset($_SESSION['reset-message'])): ?>
            <div class="success">
                <h3>
                    <?php 
                        echo $_SESSION['reset-message'];
                        unset($_SESSION['reset-message']);
                    ?>
                </h3>
            </div>
        <?php endif ?>
        <?php include('errors.php'); ?>

        <div class="input-group">
            <label>Email</label>
            <input type="email" name="email" value="<?php if (isset($_SESSION['reset-email'])): echo $_SESSION['reset-email']; unset($_SESSION['reset-email']); endif ?>">
        </div>
        
        <div class="input-group">
            <label>Password</label>
            <input type="password" name="password">
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
            <button type="submit" name="login" class="btn btn-success">Login</button>
            <span class="pull-right"><a href="forgot.php">Forgot Password?</a></span>
        </div>
        <br><hr>
        <p>Don't have an account yet? <a href="register.php">Sign up</a></p>
    </form>
</body>
</html>