<?php require_once 'includes/auth.php' ?> <!-- Check if user is logged in first -->
<?php require_once "includes/header.php" ?>

<h1>Your Tasks</h1>

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
        <tr>
            <th scope="col">Tasks</th>
            <th scope="col">Status</th>
            <th scope="col" class="text-center">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        require 'config/database.php';
        $user_id = $_SESSION['user_id'];

        $tasks = $db->query("SELECT * FROM task WHERE user_id = $user_id");
        ?>
        <?php while ($task = $tasks->fetch_assoc()) : ?>
            <tr>
                <th><?php echo htmlspecialchars($task['task']); ?></th>
                <th><?php echo $task["status"] ?></th>
                <td colspan="2" class="text-center">
                    <?php
                    if ($task['status'] != "Done") {
                        echo
                        '<a href="update_task.php?task_id=' . $task['task_id'] . '"class="btn p-0">✅</a>';
                    }
                    ?>
                    <a href="delete_task.php?task_id=<?php echo $task['task_id'] ?>" class="btn p-0">
                        ❌
                    </a>
                </td>
            </tr>
        <?php endwhile; ?>
    </tbody>
</table>

<?php require "includes/footer.php" ?>