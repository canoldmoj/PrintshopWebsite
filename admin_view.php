<?php
// Include the database connection file
include 'db_connect.php';

// Handle marking an order as completed
if (isset($_POST['complete_order'])) {
    $order_id = intval($_POST['order_id']);
    
    // Update the order status to 'completed'
    $update_sql = "UPDATE products SET status='completed' WHERE id=?";
    $stmt = $conn->prepare($update_sql);
    $stmt->bind_param("i", $order_id);
    $stmt->execute();
    $stmt->close();
}

// Fetch all products
$sql = "SELECT * FROM products";
$result = $conn->query($sql);

// Start HTML output
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Orders</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css"> <!-- Custom styles if needed -->
</head>
<body>

<div class="container mt-5">
    <h2 class="text-center mb-4">Product Orders</h2>

    <!-- Display pending orders -->
    <h3 class="text-center">Pending Orders</h3>
    <table class='table table-striped table-bordered'>
        <thead class='thead-dark'>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Comments</th>
                <th>Attachment</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()) {
                if (isset($row['status']) && $row['status'] === 'pending') { ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row["id"]); ?></td>
                        <td><?php echo htmlspecialchars($row["name"]); ?></td>
                        <td><?php echo htmlspecialchars($row["email"]); ?></td>
                        <td><?php echo htmlspecialchars($row["comments"]); ?></td>
                        <td><a href="<?php echo htmlspecialchars($row["attachment"]); ?>" target="_blank" class="btn btn-info btn-sm">View Attachment</a></td>
                        <td>
                            <form method='POST' style='display:inline;'>
                                <input type='hidden' name='order_id' value='<?php echo htmlspecialchars($row["id"]); ?>'>
                                <button type='submit' name='complete_order' class='btn btn-success btn-sm'>Complete Order</button>
                            </form>
                        </td>
                    </tr>
                <?php }
            } ?>
        </tbody>
    </table>

    <!-- Display completed orders -->
    <h3 class="text-center mt-5">Completed Orders</h3>
    <table class='table table-striped table-bordered'>
        <thead class='thead-dark'>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Comments</th>
                <th>Attachment</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            // Reset result pointer to fetch completed orders
            $result->data_seek(0); 
            while ($row = $result->fetch_assoc()) {
                if (isset($row['status']) && $row['status'] === 'completed') { ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row["id"]); ?></td>
                        <td><?php echo htmlspecialchars($row["name"]); ?></td>
                        <td><?php echo htmlspecialchars($row["email"]); ?></td>
                        <td><?php echo htmlspecialchars($row["comments"]); ?></td>
                        <td><a href="<?php echo htmlspecialchars($row["attachment"]); ?>" target="_blank" class="btn btn-info btn-sm">View Attachment</a></td>
                    </tr>
                <?php }
            } ?>
        </tbody>
    </table>

</div> <!-- Close container -->

<script src="assets/js/bootstrap.bundle.min.js"></script> <!-- Include Bootstrap JS -->
</body>
</html>

<?php
$conn->close();
?>