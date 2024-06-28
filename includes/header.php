<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>PHP Todo List</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand">PHP TODO</a>
            <div class="ml-auto d-flex gap-2">
                <?php if (isset($_SESSION['user_id'])) : ?>
                    <a class="btn btn-danger" href="logout.php">Logout</a>
                <?php else : ?>
                    <a class="btn btn-primary" href="login.php">Login</a>
                    <a class="btn btn-success" href="register.php">Register</a>
                <?php endif; ?>
            </div>
        </div>
        </div>
    </nav>
    <div class="container mt-4">