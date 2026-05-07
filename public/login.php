<?php
session_start();
require '../config/config.php';
require '../includes/logger.php';
require '../includes/status_check.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare(
        "SELECT id, username, password, role, status, failed_attempts 
         FROM users WHERE username = ?"
    );
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $user = $stmt->get_result()->fetch_assoc();

    if (!$user) {
        $_SESSION['error'] = "Invalid username or password.";
        header("Location: index.php");
        exit;
    }

    // 🔐 Check if account is disabled
    check_user_status($user);

    // ✅ Password correct
    if ($password === $user['password']) {

        // Reset failed attempts
        $reset = $conn->prepare(
            "UPDATE users SET failed_attempts = 0 WHERE username = ?"
        );
        $reset->bind_param("s", $username);
        $reset->execute();

        $_SESSION['authenticated'] = true;
        $_SESSION['username'] = $username;
        $_SESSION['role'] = $user['role'];

        log_activity($username, "Logged in successfully");
        header("Location: dashboard.php");
        exit;

    } else {

        // ❌ Wrong password → increase attempts
        $attempts = $user['failed_attempts'] + 1;

        if ($attempts >= 5) {
            $block = $conn->prepare(
                "UPDATE users SET failed_attempts = ?, status = 'disabled' WHERE username = ?"
            );
            $block->bind_param("is", $attempts, $username);
            $block->execute();

            log_activity($username, "Account disabled due to multiple failed logins");

            $_SESSION['error'] = "⚠️ Your account has been blocked for malicious activity.";
        } else {
            $update = $conn->prepare(
                "UPDATE users SET failed_attempts = ? WHERE username = ?"
            );
            $update->bind_param("is", $attempts, $username);
            $update->execute();

            $_SESSION['error'] = "Invalid username or password.";
        }

        header("Location: index.php");
        exit;
    }
}

?>
