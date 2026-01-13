<?php
session_start();

require '../config/config.php';
require_once '../includes/logger.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Collect form data
    $student_id  = intval($_POST['student_id']);
    $course_code = trim($_POST['course_code']);
    $course_name = trim($_POST['course_name']);
    $score       = intval($_POST['score']);
    $semester    = trim($_POST['semester']);
    $exam_date   = $_POST['exam_date'];


    // Check if exam already exists for this student & course
    $checkSql = "SELECT exam_id FROM exam_results 
                WHERE student_id = ? AND course_code = ?";

    $checkStmt = $conn->prepare($checkSql);
    $checkStmt->bind_param("is", $student_id, $course_code);
    $checkStmt->execute();
    $checkStmt->store_result();

    if ($checkStmt->num_rows > 0) {
        $_SESSION['error'] = "❌ This student is already registered for this course.";
        header("Location: exam.php");
        exit();
    }

    $checkStmt->close();

    // Insert exam result
    $sql = "INSERT INTO exam_results 
            (student_id, course_code, course_name, score, semester, exam_date)
            VALUES (?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param(
        "ississ",
        $student_id,
        $course_code,
        $course_name,
        $score,
        $semester,
        $exam_date
    );

    if ($stmt->execute()) {

        // Log activity
        log_activity(
            $_SESSION['username'],
            "Added exam: {$course_code} for student ID {$student_id}"
        );

        $_SESSION['success'] = "Exam added successfully.";
    } else {
        $_SESSION['error'] = "Failed to add exam.";
    }

    $stmt->close();
    $conn->close();

    header("Location: exam.php");
    exit();
}
?>