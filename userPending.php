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

$stmt = $conn->prepare("SELECT request_status FROM requests WHERE user_id=? AND request_status='accepted'");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    $stmt->close();
    $conn->close();
    header("Location: profile.php");
    exit();
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Pending Request</title>
    <meta http-equiv="refresh" content="10"> <!-- Refresh the page every 10 seconds -->
</head>
<body>
    <h1>Your request is pending approval</h1>
    <p>Please wait while the admin reviews your request.</p>
</body>
</html>
