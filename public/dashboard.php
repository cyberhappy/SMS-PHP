<?php
session_start();
require '../config/config.php';
require '../includes/auth_check.php';
require '../includes/dashboard_stats.php';
$username = $_SESSION['username'];
$role = $_SESSION['role'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../public/assets/css/bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../public/assets/css/bootstrap-icons-1.11.3/font/bootstrap-icons.css">
    <link rel="shortcut icon" href="../public/assets/images/mortarboard.png">
    <link rel="stylesheet" href="../public/assets/css/dashboard.css">
</head>
<body>

    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-3 col-lg-2 d-md-block bg-dark sidebar">
                <div>
                    <h3>Dashboard</h3>
                    <a href="" class="active">
                        <i class="bi bi-speedometer2"></i>
                        Dashboard
                    </a>
                    <a href="../public/home.php">
                        <i class="bi bi-house-fill"></i>
                        Home
                    </a>
                    <a href="../public/exam.php">
                        <i class="bi bi-file-text"></i>
                        Examinations
                    </a>
                    <a href="">
                       <i class="bi bi-calendar-check"></i>
                        Attandance
                    </a>
                    <a href="">
                        <i class="bi bi-gear"></i>
                        Settings
                    </a>
                    <a href="../public/logout.php">
                        <i><i class="bi bi-box-arrow-right"></i></i>
                        Logout
                    </a>
                </div>
            </nav>
              <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
                <h1 class="mb-4 fw-bold">
                Welcome back, <span class="text-primary"><?php echo ($username); ?></span>
                </h1>
                <div class="row g-4 mb-4">
                    <div class="col-sm-6 col-lg-3 d-flex">
                        <div class="card shadow-sm h-100 w-100">
                            <div class="card-body">
                                <h6 class="text-muted">Users</h6>
                                <h3 class="fw-semibold"><?php echo $totalUsers; ?></h3>
                                <span class="badge bg-primary">
                                    <i class="bi bi-person"></i>
                                    Total users you have
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3 d-flex">
                        <div class="card shadow-sm h-100 w-100">
                            <div class="card-body">
                                <h6 class="text-muted">Students</h6>
                                <h3 class="fw-semibold"><?php echo $totalStudents; ?></h3>
                                <span class="badge bg-success">
                                    <i class="bi bi-mortarboard"></i>
                                    Total student You have
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3 d-flex">
                        <div class="card shadow-sm h-100 w-100">
                            <div class="card-body">
                                <h6 class="text-muted">Exams</h6>
                                <h3 class="fw-semibold"><?php echo $totalExams; ?></h3>
                                <span class="badge bg-primary">
                                   <i class="bi bi-pencil-square"></i>
                                    Total exams you have
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3 d-flex">
                        <div class="card shadow-sm h-100 w-100">
                            <div class="card-body">
                                <h6 class="text-muted">Server Health</h6>
                                <h3 class="fw-semibold text-success"> <?php echo $serverHealth; ?></h3>
                                <span class="badge bg-success">
                                    <i class="bi bi-arrow-up-right-circle me-1"></i>
                                    Server Status
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <h2 class="mb-3 fw-semibold">Recent Log Activity</h2>
                <div class="table-responsive rounded-3" style="max-height: 600px; overflow-y: auto;">
                <table class="table table-striped table-bordered table-hover mb-0">
                    <tr class="table-dark text-light sticky-top">
                        <th>Username</th>
                        <th>Date</th>
                        <th>Action</th>
                        <?php if (!empty($recentLogs)) : ?>
                            <?php foreach ($recentLogs as $log) : ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($log['username']); ?></td>
                                    <td><?php echo htmlspecialchars($log['date']); ?></td>
                                    <td><?php echo htmlspecialchars($log['action']); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="3" class="text-center">No activity found</td>
                            </tr>
                        <?php endif; ?>
                    </tr>
                    

                </table>
            </main>
                </div>
            </div>
    
  
    
</body>
<script src="../public/assets/css/bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
</html>