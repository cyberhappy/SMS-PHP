<?php
require_once '../config/config.php';

// Users count
$result = mysqli_query($conn, "SELECT COUNT(*) AS total FROM users");
$row = mysqli_fetch_assoc($result);
$totalUsers = $row['total'];

// Students count
$result = mysqli_query($conn, "SELECT COUNT(*) AS total FROM student_info");
$row = mysqli_fetch_assoc($result);
$totalStudents = $row['total'];

// Exams count
$result = mysqli_query($conn, "SELECT COUNT(*) AS total FROM exam_results");
$row = mysqli_fetch_assoc($result);
$totalExams = $row['total'];

// Simple Server Health Check

$serverHealth = "Online";   // default

if (!$conn) {
    $serverHealth = "Database Error";
}


/* ---------- LOAD LOG FILES ---------- */
$logDir = "../activity_logs";
$recentLogs = [];

$files = glob($logDir . "/*.txt");
rsort($files); // newest file first

foreach ($files as $file) {

    $lines = file($file, FILE_IGNORE_NEW_LINES);
    $lines = array_reverse($lines); // newest line first

    foreach ($lines as $line) {

        $parts = explode(" | ", $line);

        $recentLogs[] = [
            "username" => $parts[0] ?? "",
            "date"     => $parts[1] ?? "",
            "action"   => $parts[2] ?? ""
        ];
    }
}