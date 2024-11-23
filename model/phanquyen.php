<?php
function checkAdmin() {
    if (!isset($_SESSION['user']) || $_SESSION['user']['role'] != 1) {
        header("Location: ../index.php");
        exit();
    }
}
?>