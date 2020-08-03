<?php include ('server.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="css/app.css">
</head>
<body>
    <div class="header">
        <h2>Password Reset</h2>
    </div> 

    <form method="post" action="forgot.php">
        <?php include('includes/errors.php'); ?>

        <div class="input-group">
            <label>Email</label>
            <input type="text" name="email" value="<?php echo $email; ?>">
        </div>

        <div class="input-group">
            <button type="submit" name="forgot" class="btn btn-success">Submit</button>
        </div>

    </form>
</body>
</html>