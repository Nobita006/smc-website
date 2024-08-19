<?php
session_start();

if (isset($_SESSION['email'])) {
    // User is logged in, redirect to home.html
    header("Location: home.html");
} else {
    // User is not logged in, redirect to login.html
    header("Location: login.html");
}
exit();
?>
