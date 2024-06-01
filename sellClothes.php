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

// Check if email is verified
$email_verified = 0; // Default to not verified
$email_message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve email from the form
    $email = $_POST['email'];
    
    // Check if email already exists in the database
    $sql_check = "SELECT verified FROM tblrequests WHERE email = '$email'";
    $result_check = $conn->query($sql_check);
    
    if ($result_check->num_rows > 0) {
        // Email already exists, update verification status
        $row = $result_check->fetch_assoc();
        $email_verified = $row['verified'];
        if ($email_verified == 0) {
            // If not verified, update verification status
            $sql_update = "UPDATE tblrequests SET verified = 1 WHERE email = '$email'";
            
            if ($conn->query($sql_update) === TRUE) {
                $email_message = 'Email verification status updated successfully.';
            } else {
                $email_message = 'Error updating email verification status: ' . $conn->error;
            }
        }
    } else {
        // Email does not exist, insert new record with verified = 0
        $sql_insert = "INSERT INTO tblrequests (email, verified) VALUES ('$email', 0)";
        
        if ($conn->query($sql_insert) === TRUE) {
            $email_message = 'Email uploaded successfully for verification.';
        } else {
            $email_message = 'Error uploading email: ' . $conn->error;
        }
    }
}

// Redirect if verification is 1
if ($email_verified == 1) {
    header("Location: sellOptions.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Email Verification</title>
</head>
<body>
    <h2>Enter your email to verify:</h2>
    <p><?php echo $email_message; ?></p>
    <form action="" method="post"> <!-- Changed action to empty -->
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <input type="submit" value="Verify">
    </form>
</body>
</html>
