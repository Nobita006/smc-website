<?php
session_start();
include('config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM members WHERE email='$email'";
    $result = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($result);

    if ($user) {
        if ($user['login_attempts'] >= 3 && time() - strtotime($user['lock_time']) < 600) {
            echo "<script>
                    alert('Account locked. Try again later.');
                    window.location.href='../login.html';
                  </script>";
        } else {
            if (password_verify($password, $user['password'])) {
                $_SESSION['email'] = $email;
                mysqli_query($conn, "UPDATE members SET login_attempts=0 WHERE email='$email'");
                header("Location: ../home.html");
            } else {
                $attempts = $user['login_attempts'] + 1;
                mysqli_query($conn, "UPDATE members SET login_attempts=$attempts, lock_time=NOW() WHERE email='$email'");
                echo "<script>
                        alert('Incorrect password.');
                        window.location.href='../login.html';
                      </script>";
            }
        }
    } else {
        echo "<script>
                alert('Username does not appear in the database.');
                window.location.href='../login.html';
              </script>";
    }
}
?>
