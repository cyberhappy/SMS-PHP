<?php
$page = "exam";  // tells load_data.php to load exam_results
$searchAction = "../public/exam.php";
require '../config/config.php';
require '../includes/load_data.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="../public/asset/css/bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../public/asset/css/bootstrap-icons-1.11.3/font/bootstrap-icons.css">
    <link rel="shortcut icon" href="../public/asset/images/mortarboard.png">
</head>
<body class="d-flex flex-column min-vh-100">

<?php
    require '../includes/header.php';
    require '../models/restoreM.php';
?>

        <div class="container-fluid flex-grow-1">
        <div class="row">
            <div class="col md-12">
                <h2 class="mt-2">Student List 
                    <button class="btn btn-success float-end" data-bs-toggle="modal" data-bs-target="#mymodal">+ Add Student</button>
                </h2>

                <div class="table-responsive rounded-3 ">
                <table class="table table-striped table-bordered table-hover mb-0">
                    <tr class="table-dark text-light">
                        <th>exam id</th>
                        <th>student id</th>
                        <th>course code</th>
                        <th>course name</th>
                        <th>score</th>
                        <th>semester</th>
                        <th>exam date</th>
                        <th>Action</th>
                    </tr>

                    <?php while($row = mysqli_fetch_assoc($result)):?>
                    <tr>
                        <td><?= $row['exam_id']?></td>
                        <td><?= $row['student_id']?></td>
                        <td><?= $row['course_code']?></td>
                        <td><?= $row['course_name']?></td>
                        <td><?= $row['score']?></td>
                        <td><?= $row['semester']?></td>
                        <td><?= $row['exam_date']?></td>
                        <td>
                            <a href="" class="btn btn-warning btn-sm me-2" data-bs-toggle="modal" data-bs-target="#edit">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <a href="" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete">
                                <i class="bi bi-trash"></i>
                            </a>
                        </td>
                    </tr>
                <?php endwhile; ?>
                </table>
                </div>

            </div>

        </div>

    </div>



<?php
    require '../includes/footer.php'
?>


</body>
<script src="../public/asset/js/toggle.js"></script>
<script src="../public/asset/css/bootstrap-5.3.3-dist/js/bootstrap.min.js"></script>
</html>