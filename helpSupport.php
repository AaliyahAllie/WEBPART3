<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <!--title=================================================-->
    <title>Past'd Times</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            width: 80%;
            margin: auto;
            overflow: hidden;
            padding: 20px;
        }
        header {
            background: #333;
            color: #fff;
            padding-top: 30px;
            min-height: 70px;
            border-bottom: #77aaff 3px solid;
        }
        header a {
            color: #fff;
            text-decoration: none;
            text-transform: uppercase;
            font-size: 16px;
        }
        header ul {
            padding: 0;
            list-style: none;
        }
        header li {
            display: inline;
            padding: 0 20px 0 20px;
        }
        .main {
            padding: 20px;
            background: #fff;
            margin-top: 20px;
            box-shadow: 0 1px 1px #ccc;
        }
        .faq {
            margin-bottom: 20px;
        }
        .faq h3 {
            color: #333;
        }
        footer {
            text-align: center;
            padding: 20px;
            background: #333;
            color: #fff;
            margin-top: 20px;
        }
        .contact-form input, .contact-form textarea {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .contact-form button {
            padding: 10px 20px;
            background: #77aaff;
            border: none;
            color: #fff;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <h1>Help and Support</h1>
            <ul>
                <li><a href="#faq">FAQs</a></li>
                <li><a href="#contact">Contact Us</a></li>
            </ul>
        </div>
    </header>

    <div class="container">
        <div class="main">
            <section id="faq" class="faq">
                <h2>Frequently Asked Questions</h2>
                <div>
                    <h3>How do I register to sell items?</h3>
                    <p>To regsiter to sell clothes create an account and login after user verifies your account you have the option to sell clothes on the website under user profile.</p>
                </div>
                <div>
                    <h3>How do I contact customer support?</h3>
                    <p>You can contact our customer support team by filling out the form below or calling our support hotline at 1-800-123-4567.</p>
                </div>
                <div>
                    <h3>Where can I find the user manual?</h3>
                    <p>The user manual can be downloaded from our website's 'Resources' section.</p>
                </div>
            </section>

            <section id="contact" class="contact-form">
                <h2>Contact Us</h2>
                <form action="submit_form.php" method="POST">
                    <div>
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" required>
                    </div>
                    <div>
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div>
                        <label for="message">Message</label>
                        <textarea id="message" name="message" rows="5" required></textarea>
                    </div>
                    <button type="submit">Submit</button>
                </form>
            </section>
        </div>
    </div>

    <footer>
        <p>&copy; 2024 Your Company. All Rights Reserved.</p>
    </footer>
</body>
</html>
