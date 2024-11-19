

<?php
session_start(); // Start session to access user data
include 'db_connect.php'; // Include your database connection file

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php"); // Redirect to login if not logged in
}

$user_id = $_SESSION['user_id'];

// Fetch user's purchase history from the database (assuming you have an orders table)
$sql = "SELECT * FROM orders WHERE user_id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Purchase History</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>
<body>

<div class='container mt-5'>
<h2>Your Purchase History</h2>

<table class='table table-striped'>
<thead><tr><th>Order ID</th><th>Product Name</th><th>Order Date</th><th>Status</th></tr></thead><tbody>

<?php while ($row = $result->fetch_assoc()) { ?>
<tr><td><?php echo htmlspecialchars($row["order_id"]); ?></td><td><?php echo htmlspecialchars($row["product_name"]); ?></td><td><?php echo htmlspecialchars($row["order_date"]); ?></td><td><?php echo htmlspecialchars($row["status"]); ?></td></tr>

<?php } ?>
</tbody></table>

<a href='logout.php' class='btn btn-danger'>Logout</a>

</div>

<script src='assets/js/bootstrap.bundle.min.js'></script>

</body></html>

<?php 
$stmt->close();
$conn->close(); 
?>

