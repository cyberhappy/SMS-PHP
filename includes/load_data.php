<?php
require '../config/config.php';

if ($page === "student") {
    $query = "SELECT * FROM student_info";

    if (!empty($_GET["searchBox"])) {
        $search = $_GET["searchBox"];
        $query .= " WHERE name LIKE '%$search%' 
                    OR email LIKE '%$search%' 
                    OR phone LIKE '%$search%'";
    }

} elseif ($page === "exam") {
    $query = "SELECT * FROM exam_results";

    if (!empty($_GET["searchBox"])) {
        $search = $_GET["searchBox"];
        $query .= " WHERE course_name LIKE '%$search%' 
                    OR course_code LIKE '%$search%' 
                    OR student_id LIKE '%$search%'";
    }
}

$result = mysqli_query($conn, $query);

if (!$result) {
    die("Error: " . mysqli_error($conn));
}
?>