<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: userLogin.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$conn = new mysqli("localhost", "AaliyahNicol", "AaliyahNicol", "clothes_shop");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the user has an accepted request
$stmt = $conn->prepare("SELECT request_status FROM requests WHERE user_id=? AND request_status='accepted'");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    // User has an accepted request, allow them to sell items
    $stmt->close();
    $conn->close();
    header("Location: sellOptions.php"); // Redirect to a page where they can sell items
    exit();
}

$stmt->close();
$conn->close();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['sell'] == 'yes') {
        $conn = new mysqli("localhost", "AaliyahNicol", "AaliyahNicol", "clothes_shop");

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $stmt = $conn->prepare("INSERT INTO requests (user_id, request_status) VALUES (?, 'pending')");
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $stmt->close();
        $conn->close();

        header("Location: userPending.php");
        exit();
    } else {
        header("Location: userLogin.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sell Clothes</title>
</head>
<body>
    <form method="POST" action="sellClothes.php">
        <p>Do you want to sell clothes?</p>
        <button type="submit" name="sell" value="yes">Yes</button>
        <button type="submit" name="sell" value="no">No</button>
    </form>
</body>
</html>
