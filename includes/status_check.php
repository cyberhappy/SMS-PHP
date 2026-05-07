<?php
require_once __DIR__ . '/logger.php';

function check_user_status($user) {

    if ($user['status'] === 'disabled') {

        // ✅ Log blocked user attempt
        log_activity(
            $user['username'],
            "Attempted login while account is disabled"
        );

        $_SESSION['error'] = "⚠️ You have been blocked for malicious activity.";
        header("Location: index.php");
        exit;
    }
}