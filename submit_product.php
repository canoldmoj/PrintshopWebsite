<?php
include 'db_connect.php'; // Include the database connection file

// Handle file upload
$target_dir = "uploads/";
if (!is_dir($target_dir)) {
    mkdir($target_dir, 0777, true);
}
$target_file = $target_dir . basename($_FILES["attachment"]["name"]);
$upload_success = move_uploaded_file($_FILES["attachment"]["tmp_name"], $target_file);

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO products (unit_size_options, quantity, name, email, comments, attachment) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sissss", $unit_size_options, $quantity, $name, $email, $comments, $attachment);

// Set parameters
$unit_size_options = implode(", ", $_POST['unit_size_options'] ?? []);
$quantity = $_POST['quantity'];
$name = $_POST['name'];
$email = $_POST['email'];
$comments = $_POST['comments'];
$attachment = $upload_success ? $target_file : "";

if ($stmt->execute()) {
    echo "New product specification submitted successfully";
} else {
    echo "Error: " . $stmt->error;
}

// Close connections
$stmt->close();
$conn->close();
?>

