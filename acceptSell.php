<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: userLogin.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sell Accepted</title>
</head>
<body>
    <h1>Your request to sell clothes has been accepted!</h1>
    <p>You can now proceed with the selling process.</p>
</body>
</html>
