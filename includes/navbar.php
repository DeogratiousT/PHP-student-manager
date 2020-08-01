<div class="nav">
    <ul>
        <li class="disabled" style="margin-right: 10px">
            <a href="index.php">
                <?php if (isset($_SESSION['role'])): echo strtoupper($_SESSION['role']) ." PORTAL"; endif ?>
            </a>
        </li>
        <li><a href="index.php">Home</a></li>
        <li><a href="group_rollcall.php">Group RollCall</a></li>
        <li class="dropdown">
            <a href="javascript:void(0)" class="dropbtn">Sort By:</a>
            <div class="dropdown-content">
                <a href="module_sort.php">Module</a>
                <a href="class_sort.php">Class</a>
            </div>
        </li>

        <li class="dropdown" style="float:right; margin-right:15px">
            <a href="javascript:void(0)" class="dropbtn">
                <?php if (isset($_SESSION['username'])): echo $_SESSION['username']; endif ?>
                <span>&nabla;</span>
            </a>
            <div class="dropdown-content">
                <a href="../index.php?logout='1'" >Logout</a>           
            </div>
        </li>
    </ul>
</div>