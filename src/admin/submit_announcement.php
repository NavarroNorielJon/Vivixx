<?php
    include '../utilities/db.php';

    $subject = $_POST["subject"];
    $date = $_POST["date"];
    $body = $_POST["body"];

    $sql = ""