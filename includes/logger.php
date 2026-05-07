<?php

function log_activity($username, $action) {
    // absolute folder path
    $logDir = __DIR__ . "/../activity_logs";

    if (!is_dir($logDir)) {
        mkdir($logDir, 0777, true);
    }

    // file name example: nov19.txt
    $fileName = strtolower(date("M")) . date("d") . ".txt";
    $filePath = $logDir . "/" . $fileName;

    // line = username | 2025-11-28 14:20:11 | did something
    $line = $username . " | " . date("Y-m-d H:i:s") . " | " . $action . PHP_EOL;

    file_put_contents($filePath, $line, FILE_APPEND);
}
?>