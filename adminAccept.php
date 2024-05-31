<?php

$conn = new mysqli("localhost", "AaliyahNicol", "AaliyahNicol", "clothes_shop");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['accept'])) {
    $request_id = $_POST['request_id'];
    $stmt = $conn->prepare("UPDATE requests SET request_status='accepted' WHERE id=?");
    $stmt->bind_param("i", $request_id);
    $stmt->execute();
    $stmt->close();

    header("Location: adminHomePage.php");
    exit();
}

$result = $conn->query("SELECT * FROM requests WHERE request_status='pending'");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Accept</title>
</head>
<body>
    <h1>Pending Requests</h1>
    <form method="POST" action="adminAccept.php">
        <ul>
            <?php while($row = $result->fetch_assoc()): ?>
                <li>
                    User ID: <?php echo $row['user_id']; ?>
                    <button type="submit" name="accept" value="Accept">Accept</button>
                    <input type="hidden" name="request_id" value="<?php echo $row['id']; ?>">
                </li>
            <?php endwhile; ?>
        </ul>
    </form>
</body>
</html>
<?php $conn->close(); ?>
