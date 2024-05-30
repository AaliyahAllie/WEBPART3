<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customizable Alerts</title>
    <style>
        /* Basic styling for the form */
        form {
            max-width: 400px;
            margin: 0 auto;
        }
        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
        }
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Customizable Alerts</h1>
    <form id="alertForm">
        <label for="brand">Brand:</label>
        <input type="text" id="brand" name="brand">
        <label for="size">Size:</label>
        <input type="text" id="size" name="size">
        <label for="style">Style:</label>
        <input type="text" id="style" name="style">
        <input type="submit" value="Set Alert">
    </form>

    <script>
        // Function to handle form submission
        document.getElementById("alertForm").addEventListener("submit", function(event) {
            event.preventDefault(); // Prevent the form from submitting normally
            
            // Get user input values
            var brand = document.getElementById("brand").value;
            var size = document.getElementById("size").value;
            var style = document.getElementById("style").value;
            
            // Here you can implement the logic to store the alert criteria or send it to a server
            // For demonstration purposes, let's just log the criteria
            console.log("Alert set for brand: " + brand + ", size: " + size + ", style: " + style);
            
            // You can also display a confirmation message to the user
            alert("Alert set successfully!");
        });
    </script>
</body>
</html>
