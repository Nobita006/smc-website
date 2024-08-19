<?php
session_start();
include('config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $first_name = $_POST['first_name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Check if the email already exists
    $check_query = "SELECT * FROM members WHERE email='$email'";
    $check_result = mysqli_query($conn, $check_query);

    if (mysqli_num_rows($check_result) > 0) {
        // Email already exists
        echo "<script>
                alert('Email already registered. Please use a different email.');
                window.location.href='../register.html';
              </script>";
    } else {
        // Insert the new user into the database
        $query = "INSERT INTO members (first_name, surname, email, password) VALUES ('$first_name', '$surname', '$email', '$password')";
        if (mysqli_query($conn, $query)) {
            echo "<script>
                    alert('Registration successful! Please login.');
                    window.location.href='../login.html';
                  </script>";
        } else {
            echo "<script>
                    alert('Error: Unable to register. Please try again.');
                    window.location.href='../register.html';
                  </script>";
        }
    }
}
?>
