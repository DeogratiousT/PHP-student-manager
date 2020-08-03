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
                <h3>Student Attendance</h3> 

                <?php include('../includes/errors.php'); ?>

                <div class="pull-left" style="width:45%;">
                    <form action="student_sort.php" method="post" style="width:90%"> 

                        <div class="input-group">
                            <label for="date">Date:</label>
                            <input type="date" id="date" name="date">
                        </div>

                        <div class="input-group">
                            <label>Student</label>
                            <select name="student">
                                <option value="student1">Student 1</option>
                                <option value="student2">Student 2</option>
                                <option value="student3">Student 3</option>
                                <option value="student4">Student 4</option>
                                <option value="student5">Student 5</option>
                                <option value="student6">Student 6</option>
                            </select>
                        </div>

                        <br>

                        <input type="submit" value="Find" name="student_sort" class="btn btn-outline-primary">

                    </form>
                </div>

                <div class="pull-right" style="width:45%;">
                    <?php if (count($student_attendance) > 0): ?>    
                        <form style="width:90%">
                            <h3><span style="color:blue;"><?php echo $_SESSION['selected_student']; ?></span>
                            attended the following lessons on 
                            <span style="color:blue;"><?php echo $_SESSION['selected_date']; ?></span></h3>

                            <ol>
                                <?php foreach ($student_attendance as $attendance): ?>
                                    
                                    <li><?php echo $attendance['0']; ?> </li><br>                                      

                                        <div style="text-align:left; margin-left:20px"><?php echo $attendance['1']; ?></div>                              
                                   

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