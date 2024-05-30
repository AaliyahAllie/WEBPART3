<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clothing Catalog</title>
        <!--stylesheet============================================-->
        <link rel="stylesheet" type="text/css" href="css/style.css"/>

<!--fav-icon===============================================-->
<link rel="shortcut icon" href=""/>
<!--this is the tab icon^^^^-->

<!--using-FontAwesome======================================-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<!--Import-Poppins-Font-Family=============================-->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .item-image {
            max-width: 100px;
            max-height: 100px;
        }
        .delete-button, .edit-button {
            background-color: #ff6347;
            color: white;
            border: none;
            padding: 8px 12px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            cursor: pointer;
            border-radius: 4px;
            transition: background-color 0.3s;
        }
        .edit-button {
            background-color: #4CAF50;
        }
        .delete-button:hover, .edit-button:hover {
            background-color: #ff4136;
        }
        .edit-button:hover {
            background-color: #45a049;
        }
        .form-container {
            margin: 20px;
        }
        .form-container input, .form-container textarea {
            display: block;
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            box-sizing: border-box;
        }
    </style>
</head>
<body>
    <!-- Navigation Bar ========================================== -->
<nav class="navigation">
    <!-- Logo -->
    <a href="#" class="logo">past'd times</a>
    <!-- Menu -->
    <ul class= "menu">
        <li><a href="index.php">Home</a></li>
        <li><a href="categories.php">Shop</a></li>
        <li><a href="products.php">Products</a></li>
        <li><a href="aboutUs.php" class="active">About Us</a></li>
    </ul>
    <!-- Right Elements -->
    <div class="right-elements">
        <!-- Search -->
        <a href="#" class="search">
            <i class="fa-solid fa-magnifying-glass"></i>
        </a>
        <!-- Favorites -->
        <a href="favourites.php" class="favourites">
            <i class="fa fa-heart" aria-hidden="true"></i>
        </a>
        <!-- Dropdown To Profile Pages and Logins -->
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
<br><br><br><br><br>
<div class="container mt-5">
    <h1 class="text-center">Clothing Catalog</h1>

    <div class="form-container">
        <h2>Add New Product</h2>
        <form method="post" enctype="multipart/form-data" action="">
            <input type="hidden" name="action" value="add">
            <div class="form-group">
                <input type="text" name="itemName" class="form-control" placeholder="Item Name" required>
            </div>
            <div class="form-group">
                <textarea name="itemDescription" class="form-control" placeholder="Item Description" required></textarea>
            </div>
            <div class="form-group">
                <input type="text" name="itemSize" class="form-control" placeholder="Item Size" required>
            </div>
            <div class="form-group">
                <input type="text" name="itemPrice" class="form-control" placeholder="Item Price" required>
            </div>
            <div class="form-group">
                <input type="file" name="itemImage" class="form-control-file" accept="image/*" required>
            </div>
            <button type="submit" class="btn btn-primary">Add Product</button>
        </form>
    </div>

    <h2 class="text-center">Items in userClothes</h2>
    <table class="table table-striped table-bordered mt-4">
        <thead class="thead-dark">
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Description</th>
                <th>Size</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php

        $servername = "localhost";
        $username = "AaliyahNicol";
        $password = "AaliyahNicol";
        $dbname = "ClothingStore";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['action'])) {
                $action = $_POST['action'];

                if ($action == 'add') {
                    $itemName = $_POST['itemName'];
                    $itemDescription = $_POST['itemDescription'];
                    $itemSize = $_POST['itemSize'];
                    $itemPrice = $_POST['itemPrice'];
                    $itemImage = file_get_contents($_FILES['itemImage']['tmp_name']); // Read the uploaded image

                    $stmt = $conn->prepare("INSERT INTO userClothes (itemName, itemDescription, itemSize, itemPrice, Image) VALUES (?, ?, ?, ?, ?)");
                    $stmt->bind_param("sssss", $itemName, $itemDescription, $itemSize, $itemPrice, $itemImage);
                    $stmt->execute();
                    $stmt->close();
                } elseif ($action == 'delete' && isset($_POST['item_id'])) {
                    $itemId = $_POST['item_id'];
                    $stmt = $conn->prepare("DELETE FROM userClothes WHERE id = ?");
                    $stmt->bind_param("i", $itemId);
                    $stmt->execute();
                    $stmt->close();
                } elseif ($action == 'edit' && isset($_POST['item_id'])) {
                    $itemId = $_POST['item_id'];
                    $itemName = $_POST['itemName'];
                    $itemDescription = $_POST['itemDescription'];
                    $itemSize = $_POST['itemSize'];
                    $itemPrice = $_POST['itemPrice'];

                    // Check if a new image is uploaded
                    if ($_FILES['itemImage']['size'] > 0) {
                        $itemImage = file_get_contents($_FILES['itemImage']['tmp_name']); // Read the uploaded image
                        $stmt = $conn->prepare("UPDATE userClothes SET itemName = ?, itemDescription = ?, itemSize = ?, itemPrice = ?, Image = ? WHERE id = ?");
                        $stmt->bind_param("sssssi", $itemName, $itemDescription, $itemSize, $itemPrice, $itemImage, $itemId);
                    } else {
                        $stmt = $conn->prepare("UPDATE userClothes SET itemName = ?, itemDescription = ?, itemSize = ?, itemPrice = ? WHERE id = ?");
                        $stmt->bind_param("ssssi", $itemName, $itemDescription, $itemSize, $itemPrice, $itemId);
                    }

                    $stmt->execute();
                    $stmt->close();
                }
            }
        }

        $sql = "SELECT * FROM userClothes";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td><img src='data:image/jpeg;base64," . base64_encode($row['Image']) . "' alt='" . $row['itemName'] . "' class='item-image'></td>";
                echo "<td>" . $row['itemName'] . "</td>";
                echo "<td>" . $row['itemDescription'] . "</td>";
                echo "<td>" . $row['itemSize'] . "</td>";
                echo "<td>$" . $row['itemPrice'] . "</td>";
                echo "<td>
                    <form method='post' style='display:inline-block'>
                        <input type='hidden' name='action' value='delete'>
                        <input type='hidden' name='item_id' value='" . $row['id'] . "'>
                        <button type='submit' class='delete-button'>Delete</button>
                    </form>
                    <form method='post' style='display:inline-block' enctype='multipart/form-data'>
                        <input type='hidden' name='action' value='edit'>
                        <input type='hidden' name='item_id' value='" . $row['id'] . "'>
                        <input type='text' name='itemName' class='form-control' value='" . $row['itemName'] . "' required>
                        <textarea name='itemDescription' class='form-control' required>" . $row['itemDescription'] . "</textarea>
                        <input type='text' name='itemSize' class='form-control' value='" . $row['itemSize'] . "' required>
                        <input type='text' name='itemPrice' class='form-control' value='" . $row['itemPrice'] . "' required>
                        <input type='file' name='itemImage' class='form-control-file' accept='image/*'>
                        <button type='submit' class='edit-button btn btn-success mt-2'>Edit</button>
                    </form>
                  </td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>0 results</td></tr>";
        }

        $conn->close();
        ?>
        </tbody>
    </table>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>

