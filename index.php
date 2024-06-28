<?php require "includes/header.php" ?>

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
        require 'config/database.php';

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

<?php require "includes/footer.php" ?>
