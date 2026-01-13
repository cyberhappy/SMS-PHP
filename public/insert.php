<?php
require "../config/config.php"; // Database connection
require_once "../includes/logger.php"; // include logger
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data securely
    $name  = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $phone = $conn->real_escape_string($_POST['phone']);

    // Insert data
    $sql = "INSERT INTO student_info (name, email, phone) VALUES ('$name', '$email', '$phone')";

    if ($conn->query($sql)) {
        $_SESSION['success'] = "Data inserted successfully"; // for alert.php
        log_activity($_SESSION['username'], "Added student: {$name} (ID={$conn->insert_id})");
    } else {
        $_SESSION['error'] = "Error: " . $conn->error;       // for alert.php
    }

    header("Location: home.php"); // redirect to page where alert.php is included
    exit;
}
?>