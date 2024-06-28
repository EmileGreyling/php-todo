<?php
require "config.php";

if (isset($_POST["add"])) {
    if ($_POST["task"] != "") {
        $task = $_POST["task"];

        if ($db->query("INSERT INTO task (task, status) VALUES('$task', 'Pending')") === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $db->error;
        }
        header('location:index.php');
    }
}
