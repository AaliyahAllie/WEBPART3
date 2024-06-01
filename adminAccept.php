<?php
// Database connection
$servername = "localhost";
$username = "AaliyahNicol"; // Replace with your MySQL username
$password = "AaliyahNicol"; // Replace with your MySQL password
$database = "ClothingStore"; // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $request_id = $_POST['request_id'];
    $action = $_POST['action'];
    
    // Update request status
    $sql_update = "UPDATE tblRequests SET verified = $action WHERE id = $request_id";
    if ($conn->query($sql_update) === TRUE) {
        echo "Request updated successfully.";
    } else {
        echo "Error updating request: " . $conn->error;
    }
}

// Fetch data from the database
$sql_select = "SELECT * FROM tblRequests";
$result = $conn->query($sql_select);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Accept</title>
</head>
<body>
    <h2>Requests</h2>
    <table border="1">
        <tr>
            <th>Email</th>
            <th>Verified</th>
            <th>Action</th>
        </tr>
        <?php
        if ($result !== false && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                ?>
                <tr>
                    <td><?php echo $row["email"]; ?></td>
                    <td><?php echo $row["verified"]; ?></td>
                    <td>
                        <form action="" method="post">
                            <input type="hidden" name="request_id" value="<?php echo $row["id"]; ?>">
                            <button type="submit" name="action" value="1">Accept</button>
                            <button type="submit" name="action" value="0">Reject</button>
                        </form>
                    </td>
                </tr>
                <?php
            }
        } else {
            echo "<tr><td colspan='3'>No requests found</td></tr>";
        }
        ?>
    </table>
</body>
</html>

<?php
// Close connection
$conn->close();
?>
