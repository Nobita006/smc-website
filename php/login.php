<?php
session_start();
include('config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM members WHERE email='$email'";
    $result = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($result);

    date_default_timezone_set('Asia/Kolkata');
    // $current_time = time();
    // echo "Current Unix timestamp: " . $current_time . "<br>";
    // echo "Formatted current time: " . date('Y-m-d H:i:s', $current_time) . "<br>";

    if ($user) {
        // Check if the account is locked
        if ($user['login_attempts'] >= 3) {
            $lock_time = strtotime($user['lock_time']);
            $current_time = time();

            // Debugging output
            echo "Stored Lock Time (from database): " . date('Y-m-d H:i:s', $lock_time) . "<br>";
            echo "Current time: " . date('Y-m-d H:i:s', $current_time) . "<br>";
            echo "Time difference: " . ($current_time - $lock_time) . " seconds<br>";

            if ($current_time - $lock_time < 600 && $lock_time > 0) { // 10 minutes = 600 seconds
                echo "<script>
                        alert('Account locked. Try again later.');
                        window.location.href='../login.html';
                      </script>";
                exit;
            } else {
                // Reset login attempts after 10 minutes
                mysqli_query($conn, "UPDATE members SET login_attempts=0 WHERE email='$email'");
            }
        }

        // Verify the password
        if (password_verify($password, $user['password'])) {
            $_SESSION['email'] = $email;
            mysqli_query($conn, "UPDATE members SET login_attempts=0 WHERE email='$email'");
            header("Location: ../home.html"); // Redirect to home page
            exit;
        } else {
            // Increment login attempts
            $attempts = $user['login_attempts'] + 1;

            // Lock the account if 3 attempts are reached
            if ($attempts >= 3) {
                mysqli_query($conn, "UPDATE members SET login_attempts=$attempts, lock_time=NOW() WHERE email='$email'");
                echo "<script>
                        alert('Account locked due to multiple failed login attempts. Try again in 10 minutes.');
                        window.location.href='../login.html';
                      </script>";
            } else {
                mysqli_query($conn, "UPDATE members SET login_attempts=$attempts WHERE email='$email'");
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
