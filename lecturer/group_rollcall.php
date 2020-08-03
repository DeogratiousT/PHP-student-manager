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
            <div class="jumbotron">
                <h3>Check the Groups Present</h3> 
                <p><b><?php echo date("m.d.Y") ?></b></p>

                 <?php include('../includes/errors.php'); ?>


                <form action="group_rollcall.php" method="post" style="width:90%"> 
                    <div class="pull-left" style="width:45%;">
                        <div class="input-group">
                            <label>Class</label>
                            <select name="class">
                                <option value="class1">Class 1</option>
                                <option value="class2">Class 2</option>
                                <option value="class3">Class 3</option>
                                <option value="class4">Class 4</option>
                                <option value="class5">Class 5</option>
                                <option value="class6">Class 6</option>
                            </select>
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

                    </div>

                    <div class="pull-right" style="width:45%;">
                        <input type="checkbox" id="student1" name="students[]" value="student1">
                        <label for="student1"> Student 1</label><br>

                        <input type="checkbox" id="student2" name="students[]" value="student2">
                        <label for="student2"> Student 2</label><br>

                        <input type="checkbox" id="student3" name="students[]" value="student3">
                        <label for="student3"> Student 3</label><br>
                        
                        <input type="checkbox" id="student4" name="students[]" value="student4">
                        <label for="student4"> Student 4</label><br>
                        
                        <input type="checkbox" id="student5" name="students[]" value="student5">
                        <label for="student5"> Student 5</label><br>
                        
                        <input type="checkbox" id="student6" name="students[]" value="student6">
                        <label for="student6"> Student 6</label><br><br>

                    </div>

                    <input type="submit" value="Submit" name="group_rollcall" class="btn btn-outline-primary pull-right">

                    <div class="clearfix"></div>

                </form>

            </div>         
        <?php else : header('location: ../index.php'); endif ?>
    </div>

</body>
</html>