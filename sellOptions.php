// sellOptions.php
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
    <title>Sell Options</title>
</head>
<body>
    <h1>Sell Options Page</h1>
</body>
</html>
