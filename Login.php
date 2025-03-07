<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Optima Bank - Sign In</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(to right, #4b006e, #b04585);
        }
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 50px;
            background: linear-gradient(to right, #4b006e, #b04585);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        .navbar .logo {
            color: #ff9f43;
            font-size: 20px;
            font-weight: bold;
        }
        .navbar .menu a {
            color: white;
            text-decoration: none;
            margin: 0 15px;
            font-size: 14px;
        }
        .navbar .menu a:hover {
            text-decoration: underline;
        }
        .container {
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: 350px;
            text-align: center;
            margin: 100px auto;
        }
        .container h2 {
            margin-bottom: 20px;
        }
        input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .btn {
            background: black;
            color: white;
            padding: 10px;
            width: 100%;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .btn-google {
            background: white;
            color: black;
            padding: 10px;
            width: 100%;
            border: 1px solid black;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
        }
        .btn-google img {
            vertical-align: middle;
            width: 20px;
            margin-right: 5px;
        }
        a {
            text-decoration: none;
            color: #b04585;
            display: block;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <div class="logo">Optima Bank</div>
        <div class="menu">
            <a href="#">ABOUT US</a>
            <a href="#">CONTACT</a>
            <a href="#" style="text-decoration: underline;">SIGN IN</a>
        </div>
    </div>
    <div class="container">
        <h2>Sign in</h2>
        <form action="login.php" method="POST">
            <input type="text" name="email" placeholder="Email ID" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="checkbox" name="remember"> Remember Me
            <a href="#">Forgot Password?</a>
            <button type="submit" class="btn">Sign in</button>
        </form>
        <button class="btn-google">
            <img src="https://upload.wikimedia.org/wikipedia/commons/4/4d/Google_%22G%22_Logo.svg" alt="Google"> Sign in with Google
        </button>
        <a href="#">or Sign up</a>
    </div>
</body>
</html>
