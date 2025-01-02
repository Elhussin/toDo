<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <!-- Logo -->
        <a class="navbar-brand" href="../admin/admin.php">
            <img src="../img/logo.png" alt="Logo" style="height: 40px;">
        </a>

        <!-- Toggler Button -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar Items -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <!-- Left Aligned Links -->
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="../admin/admin.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../admin/todo.php">To Do</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../admin/profial.php">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../admin/users.php">Users</a>
                </li>
            </ul>

            <!-- Right Aligned Logout Button -->
            <form method="GET" action="" class="d-flex">
                <button class="btn btn-outline-danger" type="submit" name="logout">Sign Out</button>
            </form>
        </div>
    </div>
</nav>
