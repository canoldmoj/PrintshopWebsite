<?php
// Include the database connection file
include 'db_connect.php';

// Initialize variables
$name = $email = $message = "";
$errors = [];

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate name
    if (empty($_POST['name'])) {
        $errors[] = "Name is required.";
    } else {
        $name = htmlspecialchars(trim($_POST['name']));
    }

    // Validate email
    if (empty($_POST['email'])) {
        $errors[] = "Email is required.";
    } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    } else {
        $email = htmlspecialchars(trim($_POST['email']));
    }

    // Validate message
    if (empty($_POST['message'])) {
        $errors[] = "Message is required.";
    } else {
        $message = htmlspecialchars(trim($_POST['message']));
    }

    // If no errors, prepare to insert into the database
    if (empty($errors)) {
        // Prepare and bind
        $stmt = $conn->prepare("INSERT INTO contacts (name, email, message) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $email, $message);

        // Execute the statement
        if ($stmt->execute()) {
            echo "New contact submitted successfully.";
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close the statement and connection
        $stmt->close();
    } else {
        // Display errors
        foreach ($errors as $error) {
            echo "<p style='color:red;'>$error</p>";
        }
    }
}

// Close the database connection
$conn->close();
?>

