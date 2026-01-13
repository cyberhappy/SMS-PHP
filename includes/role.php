<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function getRole() {
    if (isset($_SESSION['role'])) {
        return $_SESSION['role'];
    }
    return 'viewer';
}

function isAdmin()  { return getRole() === 'admin'; }
function isTeacher(){ return getRole() === 'teacher'; }
function isViewer() { return getRole() === 'viewer'; }

function canAdd()    { return isAdmin() || isTeacher(); }
function canUpdate() { return isAdmin() || isTeacher(); }
function canDelete() { return isAdmin(); }
function canBackup() { return isAdmin(); }
function canRestore(){ return isAdmin(); }
?>
