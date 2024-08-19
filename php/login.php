<?php
include('config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM members WHERE email='$email'";
    $result = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($result);

    if ($user) {
        if ($user['login_attempts'] >= 3 && time() - strtotime($user['lock_time']) < 600) {
            echo "Account locked. Try again later.";
        } else {
            if (password_verify($password, $user['password'])) {
                echo "Login successful!";
                mysqli_query($conn, "UPDATE members SET login_attempts=0 WHERE email='$email'");
            } else {
                $attempts = $user['login_attempts'] + 1;
                mysqli_query($conn, "UPDATE members SET login_attempts=$attempts, lock_time=NOW() WHERE email='$email'");
                echo "Incorrect password.";
            }
        }
    } else {
        echo "No account found with that email.";
    }
}
?>
