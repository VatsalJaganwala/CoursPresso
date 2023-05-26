<?php

if (isset($_GET['courseId'])) {
    session_start();
    $courseId = $_GET['courseId'];
    $url = $_GET['url'];
    $studentId = $_SESSION['StudentId'];
    $sql = '';
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "vatsal";
    try {
        $conn = mysqli_connect($servername, $username, $password, $database);
        error_log("Connection established");
    } catch (Exception $e) {
        error_log("Error connecting to database: " . $e->getMessage);
        // echo "<br>";

    }
    $conn->query("DELETE FROM userhistory WHERE courseId = '$courseId' AND studentId = '$studentId'");
    $conn->query("INSERT INTO userhistory (courseId, studentId, time) VALUES ('$courseId', '$studentId', CURRENT_TIMESTAMP)");
    echo "<script>setTimeout(function() {window.location.href = '$url';});</script>";


}
?>