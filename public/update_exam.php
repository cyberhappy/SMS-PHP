<?php
session_start();

require '../config/config.php';
require_once '../includes/logger.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: exam.php");
    exit();
}

// ✅ Collect data
$exam_id     = intval($_POST['exam_id']);   // <-- PRIMARY KEY
$student_id  = intval($_POST['student_id']);
$course_code = trim($_POST['course_code']);
$course_name = trim($_POST['course_name']);
$score       = intval($_POST['score']);
$semester    = trim($_POST['semester']);
$exam_date   = $_POST['exam_date'];


// 🔒 Prevent duplicate exams (EXCLUDE current exam_id)
$check = $conn->prepare("
    SELECT exam_id FROM exam_results
    WHERE student_id = ?
      AND course_code = ?
      AND semester = ?
      AND exam_id != ?
");
$check->bind_param("issi", $student_id, $course_code, $semester, $exam_id);
$check->execute();
$check->store_result();

if ($check->num_rows > 0) {
    $_SESSION['error'] = "This exam already exists for this student in the selected semester.";
    header("Location: exam.php");
    exit();
}
$check->close();


// ✅ Update exam using exam_id
$sql = "
    UPDATE exam_results
    SET student_id = ?, 
        course_code = ?, 
        course_name = ?, 
        score = ?, 
        semester = ?, 
        exam_date = ?
    WHERE exam_id = ?
";

$stmt = $conn->prepare($sql);
$stmt->bind_param(
    "ississi",
    $student_id,
    $course_code,
    $course_name,
    $score,
    $semester,
    $exam_date,
    $exam_id
);

try {

    if ($stmt->execute()) {

        log_activity(
            $_SESSION['username'],
            "Updated exam: {$course_code} (Student ID {$student_id})"
        );

        $_SESSION['success'] = "Exam updated successfully.";
    }

} catch (mysqli_sql_exception $e) {

    // 🔴 Duplicate entry error
    if ($e->getCode() == 1062) {
        $_SESSION['error'] = "This exam already exists for this student in the selected semester.";
    } else {
        $_SESSION['error'] = "Database error occurred while updating exam.";
    }

}

$stmt->close();
$conn->close();

header("Location: exam.php");
exit();

