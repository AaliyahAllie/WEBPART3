<?php
// Establish database connection
$servername = "localhost";//host name
$username = "AaliyahNicol"; //username
$password = "AaliyahNicol"; //password
$database = "ClothingStore";//database name

$conn = new mysqli($servername, $username, $password, $database);//creates connection

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
    } else {
        echo "Error: " . $sql_insert . "<br>" . $conn->error . "<br>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"> <!-- Set character encoding for the document -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Set the viewport for responsive design -->
    <title>Past'd Times - Sell Item</title> <!-- Set the title of the webpage -->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> <!-- Link to Bootstrap CSS -->
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="css/style.css"> <!-- Link to custom CSS -->
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer"> <!-- Link to Font Awesome icons -->
    <!-- Google Fonts - Poppins -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet"> <!-- Link to Google Fonts -->
</head>
<body>


<!-- Navigation -->
<nav class="navigation"> <!-- Navigation section -->
    <!-- Logo -->
    <a href="#" class="logo">past'd times</a> <!-- Website logo -->
    
    <!-- Menu -->
    <ul class="menu"> <!-- Menu items -->
        <li><a href="index.php">Home</a></li> <!-- Home link -->
        <li><a href="categories.php">Shop</a></li> <!-- Shop link -->
        <li><a href="products.php">Products</a></li> <!-- Products link -->
        <li><a href="aboutUs.php">About Us</a></li> <!-- About Us link -->
    </ul>

    <!-- Right Elements -->
    <div class="right-elements"> <!-- Right side elements -->
        <a href="#" class="search"><i class="fa-solid fa-magnifying-glass"></i></a> <!-- Search icon -->
        <a href="cart.php" class="cart"><i class="fas fa-shopping-bag"></i></a> <!-- Shopping cart icon -->
        <a href="favourites.php" class="favourites"><i class="fa fa-heart" aria-hidden="true"></i></a> <!-- Favourites icon -->
        <div class="dropdown"> <!-- Dropdown menu -->
            <button class="dropbtn"> <!-- Dropdown button -->
                <i class="fas fa-user"></i> 
                <i class="fas fa-caret-down"></i>
            </button>

            <div class="dropdown-content"> <!-- Dropdown content -->
                <a href="profile.php">Profile</a> <!-- Profile link -->
                <a href="adminRegister.php">Sign Up as Admin</a> <!-- Admin registration link -->
                <a href="adminLogin.php">Login as Admin</a> <!-- Admin login link -->
                <a href="adminHomePage.php">Admin Controls</a> <!-- Admin controls link -->
                <a href="userRegister.php">Sign Up as User</a> <!-- User registration link -->
                <a href="userLogin.php">Login as User</a> <!-- User login link -->
                <a href="verifyUsers.php">Verify Users</a> <!-- Verify users link -->

            </div>
        </div>
    </div>
</nav>


<!-- Navigation end -->
<br><br><br><br>
<div class="container mt-5"> <!-- Container for main content -->
    <h2>Sell Item</h2> <!-- Heading -->
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data"> <!-- Form for selling an item -->
        <input class="form-control mt-4" type="text" name="itemName" id="" placeholder="Enter Item Name"> <!-- Input field for item name -->
        <input class="form-control mt-4" type="text" name="description" id="" placeholder="Enter Item Description"> <!-- Input field for item description -->
        <input class="form-control mt-4" type="text" name="size" id="" placeholder="Enter Size"> <!-- Input field for item size -->
        <input class="form-control mt-4" type="text" name="price" id="" placeholder="Enter Price"> <!-- Input field for item price -->
        <input class="form-control mt-4" type="file" name="image" id=""> <!-- File input for item image -->
        <input class="btn btn-primary mt-4" type="submit" value="Upload" name="submit"> <!-- Submit button -->
    </form>
    <!-- Display upload message -->
    <div><?php echo $uploadMessage; ?></div> <!-- Display upload message -->
</div>

</body>
</html>