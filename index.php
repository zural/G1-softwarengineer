<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Optima Bank</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: "Poppins", Arial, sans-serif;
            background: linear-gradient(to right, #4b006e, #d472a3);
            color: white;
            line-height: 1.6;
        }

        /* Navbar */
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 20px;
            background: linear-gradient(to right, #4b006e, #d472a3);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand {
            color: orange;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 20px;
            background: linear-gradient(to right, #4b006e, #d472a3);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .logo {
            font-size: 24px;
            font-weight: bold;
        }

        .menu {
            display: flex;
            gap: 15px;
        }

        .menu a {
            color: white;
            text-decoration: none;
            font-size: 16px;
            transition: color 0.3s ease-in-out;
        }

        .menu a:hover {
            color: #ffcc00;
        }

        /* Banner */
        .banner {
            text-align: center;
            padding: 30px 20px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 10px;
            margin: 20px auto;
            width: 60%;
        }

        .banner h1 {
            font-size: 32px;
        }

        .banner p {
            font-size: 16px;
            margin-top: 10px;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            background: black;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 10px;
        }

        /* Optima Section */
        .optima-section {
            padding: 30px 20px;
            text-align: center;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 10px;
            margin: 20px auto;
            width: 60%;
        }

        .optima-section h2 {
            color: white;
            font-size: 24px;
        }

        .optima-section p {
            max-width: 800px;
            margin: 0 auto;
            line-height: 1.6;
            font-size: 16px;
        }

        /* Responsive Design */
        @media screen and (max-width: 768px) {
            .navbar {
                flex-direction: column;
                text-align: center;
            }

            .menu {
                flex-direction: column;
                gap: 10px;
                margin-top: 10px;
            }

            .banner, .optima-section {
                width: 90%;
            }
        }
    </style>
</head>
<body>
    <div class="navbar">
        <div class="navbar-brand">Optima Bank</div>
        <div class="menu">
            <a href="Login.php">Login</a>
            <a href="signup.php">Sign Up</a>
            <!-- <a href="Mainpage.php">Main Page</a> -->
        </div>
    </div>
    
    <div class="banner">
        <h1>Welcome to Optima Bank</h1>
        <p>Your trusted partner in financial success</p>
        <a href="signup.php" class="btn">Join Now</a>
    </div>

    <div class="optima-section">
        <h2>About Optima Bank</h2>
        <p>Optima Bank is a leading financial institution committed to providing innovative banking solutions tailored to meet the needs of individuals and businesses. With a customer-first approach, we offer seamless banking experiences through digital innovation and personalized services.</p>
        <br>
        <h2>Why Choose Optima Bank?</h2>
        <p>Optima Bank stands out for its secure and efficient banking services, competitive interest rates, and 24/7 customer support. Our cutting-edge technology ensures that your banking experience is smooth and hassle-free. Choose Optima Bank for reliability, trust, and excellence in financial services.</p>
    </div>
</body>
</html>
