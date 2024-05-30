<?php
session_start();
include('DBConn.php');

if (isset($_POST['verify_user'])) {
    $userId = $_POST['user_id'];

    // Update the verified status in the database
    $stmt = $conn->prepare("UPDATE tblUser SET verified = 1 WHERE id = ?");
    $stmt->bind_param("i", $userId);
    if (!$stmt->execute()) {
        die('Error updating record: ' . $conn->error);
    }
    $stmt->close();

    // Redirect back to the verification page after updating the database
    header("Location: verifyUserRequests.php");
    exit();
}
?>
