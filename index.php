<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>PHP Todo List</title>
</head>

<body>
    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid justify-content-center">
            <span class="navbar-brand mb-0 h1">PHP TASKS</span>
        </div>
    </nav>
    <div class="container mt-4">
        <form method="post" action="add_task.php">
            <div class="row">
                <div class="mb-3 col-sm-10">
                    <input type="text" class="form-control" name="task" placeholder="What do you want to do?">
                </div>
                <div class="col-sm-2">
                    <button type="submit" class="btn btn-primary px-5" name="add">Add Task</button>
                </div>
            </div>
        </form>

        <table class="table">
            <thead>
                <tr class="text-center">
                    <th scope="col">#</th>
                    <th scope="col">Tasks</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require 'config.php';

                $tasks = $db->query("SELECT * FROM task");
                ?>

                <?php foreach ($tasks as $row) : array_map('htmlentities', $row); ?>
                    <tr class="text-center">
                        <th scope="row"><?php echo implode('</td><td>', $row); ?></th>
                        <td colspan="2" class="action">
                            <?php
                            if ($row['status'] != "Done") {
                                echo
                                '<a href="update_task.php?task_id=' . $row['task_id'] . '"class="btn p-0">✅</a>';
                            }
                            ?>
                            <a href="delete_task.php?task_id=<?php echo $row['task_id'] ?>" class="btn p-0">
                                ❌
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>