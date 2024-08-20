<?php
// Include the database configuration file
include('config.php');

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the form data
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);

    // Insert the data into the database
    $query = "INSERT INTO contacts (name, email, message) VALUES ('$name', '$email', '$message')";

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>
                alert('Invalid email address.');
                window.location.href='../contact.html';
              </script>";
        exit();
    }
    

    if (mysqli_query($conn, $query)) {
        // Redirect to a thank you page or show a success message
        echo "<script>
                alert('Thank you for getting in touch!');
                window.location.href='../contact.html';
              </script>";
    } else {
        // Handle the error if the query fails
        echo "<script>
                alert('There was an error submitting your message. Please try again.');
                window.location.href='../contact.html';
              </script>";
    }
}
?>
