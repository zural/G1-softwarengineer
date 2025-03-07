<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Optima Bank</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(to right, #4b006e, #d472a3);
            color: white;
        }
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px;
            background: linear-gradient(to right, #4b006e, #d472a3);
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .navbar .logo {
            font-size: 24px;
            font-weight: bold;
            color: white;
        }
        .navbar .search-bar {
            flex: 1;
            margin: 0 20px;
        }
        .navbar input {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .navbar .menu {
            display: flex;
            gap: 15px;
        }
        .banner {
            background: rgba(255, 255, 255, 0.2);
            text-align: center;
            padding: 50px 20px;
            border-radius: 10px;
            margin: 20px;
        }
        .banner h1 {
            margin: 0;
            font-size: 36px;
        }
        .banner p {
            font-size: 18px;
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
        .optima-section {
            padding: 40px 20px;
            text-align: center;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 10px;
            margin: 20px;
        }
        .optima-section h2 {
            color: white;
        }
        .optima-section p {
            max-width: 800px;
            margin: 0 auto;
            line-height: 1.6;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <div class="logo">FreshCart</div>
        <div class="search-bar">
            <input type="text" placeholder="Search for products">
        </div>
        <div class="menu">
            <a href="Login.php" style="color: white;">Login</a>
            <a href="signup.php" style="color: white;">Sign Up</a>
            <a href="Mainpage.php" style="color: white;">Main Page</a>
        </div>
    </div>
    
    
    
    <div class="optima-section">
        <h2>About Optima Bank</h2>
        <p>Optima Bank is a leading financial institution committed to providing innovative banking solutions tailored to meet the needs of individuals and businesses. With a customer-first approach, we offer seamless banking experiences through digital innovation and personalized services.</p>
        <h2>Why Choose Optima Bank?</h2>
        <p>Optima Bank stands out for its secure and efficient banking services, competitive interest rates, and 24/7 customer support. Our cutting-edge technology ensures that your banking experience is smooth and hassle-free. Choose Optima Bank for reliability, trust, and excellence in financial services.</p>
    </div>
</body>
</html>


