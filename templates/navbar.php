<nav class="d-none navbar navbar-expand-sm bg-secondary navbar-dark">
        <p class="float-right">
            <a href="logout.php" class="btn btn-danger"><i class='fas fa-sign-out-alt'></i> Logout</a>

            <?php  if($_SESSION['role'] == 1) { ?>
                <a href="index.php" class="btn btn-warning"><i class='fas fa-user'></i>Users</a>
            <?php } ?>
        </p>
    </nav>