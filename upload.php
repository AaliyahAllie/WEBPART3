<?php
$servername = "localhost"; //  MySQL server hostname
$username = "root"; //  MySQL username
$password = ""; //  MySQL password
$dbname = "ClothingStore"; //  MySQL database name

$uploadMessage = ""; // Initialize upload message variable

try {
    // Create a new PDO instance connecting to the MySQL database using provided servername, username, password, and database name
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Set PDO error mode to exception to handle errors gracefully
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully"; // Output message indicating successful connection
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage(); // Output message indicating connection failure along with error message
}

// Check if the form has been submitted
if (isset($_POST["submit"])) {
    // Retrieve form data
    $item_name = $_POST["itemName"];
    $item_description = $_POST["description"];
    $item_size = $_POST["size"];
    $item_price = $_POST["price"];
    $item_image = $_FILES["image"]["name"];
    $ext = pathinfo($item_image, PATHINFO_EXTENSION);
    $allowedTypes = array("jpg", "jpeg", "png", "gif"); // Define allowed image file extensions
    $tempName = $_FILES["image"]["tmp_name"]; // Retrieve temporary file name of the uploaded image
    $targetPath = "image/".$item_image; // Define the target path to store the uploaded image

    // Check if the uploaded file extension is in the list of allowed types
    if (in_array($ext, $allowedTypes)) {
        // Attempt to move the uploaded file to the target directory
        if(move_uploaded_file($tempName, $targetPath)) {
            // Construct SQL query to insert data into the database
            $query = "INSERT INTO tbClothes (itemName, itemDescription, itemSize, itemPrice, itemFile) VALUES ('$item_name','$item_description','$item_size','$item_price','$item_image')";
            try {
                // Execute the SQL query to insert data into the database
                $conn->exec($query);
                $uploadMessage = "Your image is loaded"; // Set upload message if successful
            } catch(PDOException $e) {
                echo "Something went wrong: " . $e->getMessage(); // Output message if an error occurs during database operation
            }
        } else {
            echo "Image not uploaded"; // Output message if file upload fails
        }
    }
}
?>