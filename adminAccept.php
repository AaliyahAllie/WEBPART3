<!--this page allows admin to accept a users request to sell products-->
<?php
// Database connection
$servername = "localhost";//servername connection
$username = "AaliyahNicol"; //username connection
$password = "AaliyahNicol"; //password connection
$database = "ClothingStore"; //  database name cinnection

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
    <!--table layout-->
    <table border="1">
        <tr>
            <!--table headings-->
            <th>Email</th>
            <th>Verified</th>
            <th>Action</th>
        </tr>
        <!--fetches results from tabele for admin to accept or reject-->
        <?php
        if ($result !== false && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                ?>
                <tr>
                    <!--fetches the data and displays it-->
                    <td><?php echo $row["email"]; ?></td>
                    <td><?php echo $row["verified"]; ?></td>
                    <td>
                        <form action="" method="post">
                            <!--displays request information stored and accepts or denies and updates in table-->
                            <input type="hidden" name="request_id" value="<?php echo $row["id"]; ?>">
                            <!--allows admin to accept request-->
                            <button type="submit" name="action" value="1">Accept</button>
                            <!--allows admin to reject request-->
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
