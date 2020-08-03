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
                <div class="success" style="margin-top:40px;">
                    <h3>
                        <?php 
                            echo $_SESSION['success'];
                            unset($_SESSION['success'])
                        ?>
                    </h3>
                </div>
            <?php endif ?>
            
            <?php if (isset($_SESSION['username'])): ?>
                <h3>Module Sort</h3> 

                <?php include('../includes/errors.php'); ?>

                <div class="pull-left" style="width:45%;">
                    <form action="module_sort.php" method="post" style="width:90%"> 

                        <div class="input-group">
                            <label for="date">Date:</label>
                            <input type="date" id="date" name="date">
                        </div>

                        <div class="input-group">
                            <label>Module</label>
                            <select name="module">
                                <option value="module1">Module 1</option>
                                <option value="module2">Module 2</option>
                                <option value="module3">Module 3</option>
                                <option value="module4">Module 4</option>
                                <option value="module5">Module 5</option>
                                <option value="module6">Module 6</option>
                            </select>
                        </div>

                        <br>

                        <input type="submit" value="Sort" name="module_sort" class="btn btn-outline-primary">

                    </form>
                </div>

                <div class="pull-right" style="width:45%;">
                    <?php if (count($sorted_names) > 0): ?>    
                        <form style="width:90%">
                            <h3>List of Students present on 
                            <span style="color:blue;"><?php echo $_SESSION['selected_date']; ?></span>
                            for 
                            <span style="color:blue;"><?php echo $_SESSION['selected_module']; ?></span>
                             per class</h3>
                            <ol>
                                <?php foreach ($sorted_names as $name): ?>
                                    
                                    <li><?php echo $name['0']; ?> </li><br>
                                        <ol style="list-style-type:lower-alpha">

                                            <?php foreach ($name['1'] as $student): ?>

                                                <li><?php echo $student; ?></li> <br>

                                            <?php endforeach ?>
                                
                                        </ol> 

                                <?php endforeach ?>
                            </ol>
                        </form>                        
                    <?php endif ?>

                </div>

                <div class="clearfix"></div>                      

        </div>         
    <?php else : header('location: ../index.php'); endif ?>
</body>
</html>