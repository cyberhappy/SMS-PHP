<?php
session_start();

require '../config/config.php';
require_once '../includes/logger.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $exam_id = intval($_POST['id']);

    try {
        // Prepare delete query
        $stmt = $conn->prepare("DELETE FROM exam_results WHERE exam_id = ?");
        $stmt->bind_param("i", $exam_id);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {

            // Log activity
            log_activity(
                $_SESSION['username'],
                "Deleted exam (Exam ID: {$exam_id})"
            );

            $_SESSION['success'] = "Exam deleted successfully.";
        } else {
            $_SESSION['error'] = "Exam not found or already deleted.";
        }

        $stmt->close();
    } catch (mysqli_sql_exception $e) {
        $_SESSION['error'] = "Failed to delete exam.";
    }

    $conn->close();
    header("Location: exam.php");
    exit();
}
?>
