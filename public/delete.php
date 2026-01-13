<?php
require '../config/config.php';
require_once '../includes/logger.php';
session_start();

// Delete data from the database
if($_SERVER['REQUEST_METHOD'] == 'POST'){
// get student id and escape it
$id = intval($_POST['id']);

$sql = "DELETE FROM student_info WHERE id = $id";

if($conn->query($sql) === true) {
    $_SESSION['success'] = 'Student Deleted successfully';
    log_activity($_SESSION['username'], "Deleted student: {$name} (ID={$id})");
    header('Location: home.php');
    exit;
}

else{
    echo "error:" . $sql . "<br>" . $conn->error;
    
}
}



?>