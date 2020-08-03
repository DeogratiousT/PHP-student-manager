<?php include ('../server.php'); ?>
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="../css/app.css">

</head>
<body>
    <?php include ('../includes/navbar.php'); ?>

    <div class="container">
        <?php if (isset($_SESSION['success'])): ?>
            <div class="success">
                <h3>
                    <?php 
                        echo $_SESSION['success'];
                        unset($_SESSION['success'])
                    ?>
                </h3>
            </div>
        <?php endif ?>
        
        <?php if (isset($_SESSION['username'])): ?>
            <div class="jumbotron">
                <p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
                <p>You are a <?php echo $_SESSION['role']; ?></p>
                <p><a href="../index.php?logout='1'" class="btn btn-outline-primarygit">Logout</a></p>
            </div>            
        <?php else : header('location: ../index.php'); endif ?>
    </div>

</body>
</html>