<?php
require "config/database.php";
require_once "includes/auth.php";


if ($_GET['task_id']) {
    $task_id = $_GET['task_id'];

    $updatingtasks =
        mysqli_query(
            $db,
            "UPDATE task SET status='Done' WHERE task_id=$task_id"
        )
        or
        die(mysqli_error($db));
    header('location: index.php');
}
