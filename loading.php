<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Past'd Times</title>
    <style>
      html {
          height: 100%;
      }
      body {
          font-family: Arial, sans-serif;
          text-align: center;
          margin: 0;
          background: linear-gradient(135deg, #6c5ce7, #fd79a8);
          height: 100%;
          display: flex;
          justify-content: center;
          align-items: center;
      }
      .container {
          padding: 20px;
          background: linear-gradient(135deg, #6c5ce7, #fd79a8);/* Optional: Add a semi-transparent white background to improve readability */
          border-radius: 10px; /* Optional: Add rounded corners to the container */
      }
      h1 {
          color: #333; /* Change text color for better contrast */
      }
      .btn {
          display: inline-block;
          padding: 10px 20px;
          background-color: white;
          color:  linear-gradient(135deg, #6c5ce7, #fd79a8);;
          text-decoration: none;
          border: none;
          border-radius: 5px;
          cursor: pointer;
      }
      .btn:hover {
          background-color:black;
      }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome to Past'd Times</h1>
        <p>ARE YOU AN ADMIN OR  A USER?</p>
        <a href="adminLogin.php" class="btn">ADMIN</a>
        <a href="userLogin.php" class="btn">USER</a>
    </div>
</body>
</html>
