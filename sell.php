<?php
// Establish database connection
$servername = "localhost";
$username = "AaliyahNicol";
$password = "AaliyahNicol";
$database = "ClothingStore";

$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL to create tblClothes table
$sql_create_table = "
CREATE TABLE IF NOT EXISTS tblClothes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    itemName VARCHAR(255) NOT NULL,
    itemDescription TEXT NOT NULL,
    itemSize VARCHAR(50) NOT NULL,
    itemPrice DECIMAL(10, 2) NOT NULL,
    Image VARCHAR(255) NOT NULL
)";

// Executes create table query
if ($conn->query($sql_create_table) === TRUE) {
    echo "Table tblClothes created successfully<br>";
} else {
    echo "Error creating table: " . $conn->error . "<br>";
}

// Handles form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape user inputs for security
    $itemName = $conn->real_escape_string($_POST['itemName']);
    $itemDescription = $conn->real_escape_string($_POST['description']);
    $itemSize = $conn->real_escape_string($_POST['size']);
    $itemPrice = $conn->real_escape_string($_POST['price']);
    $image = $_FILES['image']['name'];

    // Uploads image file to server
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

    // Insert data into tblClothes
    $sql_insert = "INSERT INTO tblClothes (itemName, itemDescription, itemSize, itemPrice, Image)
            VALUES ('$itemName', '$itemDescription', '$itemSize', '$itemPrice', '$image')";

    if ($conn->query($sql_insert) === TRUE) {
        echo "New record created successfully<br>";

        // Check if uploaded item matches any alert criteria
        // Retrieve alert criteria from the form
        $brand = $_POST['brand'];
        $size = $_POST['size'];
        $style = $_POST['style'];

        // Query to check if any alert matches the uploaded item
        $sql_alert = "SELECT * FROM tblAlerts WHERE brand = '$brand' AND size = '$size' AND style = '$style'";
        $result = $conn->query($sql_alert);

        if ($result->num_rows > 0) {
            // Alert criteria match found, display notification
            echo "<script>alert('New item added that matches your alert criteria!');</script>";
        }
    } else {
        echo "Error: " . $sql_insert . "<br>" . $conn->error . "<br>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Past'd Times - Sell Item</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
</head>
<body>

<nav class="navigation">
    <a href="#" class="logo">past'd times</a>
    <ul class="menu">
        <li><a href="index.php">Home</a></li>
        <li><a href="categories.php">Shop</a></li>
        <li><a href="products.php">Products</a></li>
        <li><a href="aboutUs.php">About Us</a></li>
    </ul>
    <div class="right-elements">
        <a href="#" class="search"><i class="fa-solid fa-magnifying-glass"></i></a>
        <a href="cart.php" class="cart"><i class="fas fa-shopping-bag"></i></a>
        <a href="favourites.php" class="favourites"><i class="fa fa-heart" aria-hidden="true"></i></a>
        <div class="dropdown">
            <button class="dropbtn">
                <i class="fas fa-user"></i> 
                <i class="fas fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
                <a href="profile.php">Profile</a>
                <a href="adminRegister.php">Sign Up as Admin</a>
                <a href="adminLogin.php">Login as Admin</a>
                <a href="adminHomePage.php">Admin Controls</a>
                <a href="userRegister.php">Sign Up as User</a>
                <a href="userLogin.php">Login as User</a>
                <a href="verifyUsers.php">Verify Users</a>
            </div>
        </div>
    </div>
</nav>

<br><br><br><br>
<div class="container mt-5">
    <h2>Sell Item</h2>
    <!-- Form for selling an item -->
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
        <!-- Input fields for selling an item -->
        <input class="form-control mt-4" type="text" name="itemName" id="" placeholder="Enter Item Name">
        <input class="form-control mt-4" type="text" name="description" id="" placeholder="Enter Item Description">
        <input class="form-control mt-4" type="text" name="size" id="" placeholder="Enter Size">
        <input class="form-control mt-4" type="text" name="price" id="" placeholder="Enter Price">
        <input class="form-control mt-4" type="file" name="image" id="">
        
        <!-- New input fields for alert criteria -->
        <input class="form-control mt-4" type="text" name="brand" id="" placeholder="Enter Brand for Alert">
        <input class="form-control mt-4" type="text" name="size" id="" placeholder="Enter Size for Alert">
        <input class="form-control mt-4" type="text" name="style" id="" placeholder="Enter Style for Alert">
        
        <!-- Submit button-->
        <input class="btn btn-primary mt-4" type="submit" value="Upload" name="submit">
    </form>
    <!-- Display upload message -->
    <div><?php echo $uploadMessage; ?></div>
</div>

</body>
</html>
