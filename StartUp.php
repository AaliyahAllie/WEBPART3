<!--first page of website should open on start up-->
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
        <p>Your Destination for Preloved Fashion</p>
        <p>At Past'd Times, we believe that every garment has a past and a future. Our curated collection of preloved clothing brings together the best of vintage charm and contemporary flair, offering you a unique shopping experience unlike any other.</p>
        <p>Whether you're a fashion-forward trendsetter or a vintage enthusiast, you'll find something special in our collection. From timeless classics to one-of-a-kind treasures, there's something for everyone at Past'd Times.</p>
        <p>Ready to start shopping and selling?</p>
        <a href="loading.php" class="btn">Start Shopping and Selling</a>
    </div>
</body>
</html>
