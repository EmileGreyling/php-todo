<?php
require "config/database.php";
require_once "includes/auth.php";

if ($_GET['task_id']) {
    $task_id = $_GET['task_id'];

    $deletingtasks = mysqli_query(
        $db,
        "DELETE FROM task WHERE task_id=$task_id"
    )
        or
        die(mysqli_error($db));

    header("location: index.php");
}
