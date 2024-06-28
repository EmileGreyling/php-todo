<?php
require "config/database.php";
require_once "includes/auth.php";

$user_id = $_SESSION['user_id'];

if (isset($_POST["add"])) {
    if ($_POST["task"] != "") {
        $task = $_POST["task"];

        $addtasks = mysqli_query(
            $db,
            "INSERT INTO task (user_id, task, status) VALUES($user_id, '$task', 'Pending')"
        )
            or
            die(mysqli_error($db));
        header('location:index.php');
    }
}
