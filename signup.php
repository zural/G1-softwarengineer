<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    
    if ($password !== $confirm_password) {
        $error = "Passwords do not match!";
    } else {
        // Here you can add database connection and insert data logic
        $success = "Signup successful!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - Optima Bank</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(to right, #3d1050, #c65591);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
        .navbar {
            width: 96%;
            padding: 10px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: linear-gradient(to right, #3d1050, #c65591);
            color: white;
            position: absolute;
            top: 0;
            left: 0;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            font-size: 14px;
        }
        .navbar a {
            color: white;
            text-decoration: none;
            margin: 0 10px;
            font-weight: bold;
        }
        .navbar a:hover {
            text-decoration: underline;
        }
        .container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
            width: 350px;
            margin-top: 80px;
        }
        h2 {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }
        input {
            width: calc(100% - 10px);
            padding: 10px;
            margin: 10px 0;
            border: none;
            border-bottom: 2px solid #3d1050;
            border-radius: 0;
            font-size: 14px;
            outline: none;
        }
        .password-container {
            display: flex;
            justify-content: space-between;
            gap: 10px;
        }
        .password-container input {
            width: 48%;
        }
        .btn {
            background: #190032;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
            margin-top: 10px;
        }
        .btn:hover {
            background: #29004d;
        }
        .login-link {
            margin-top: 10px;
            font-size: 14px;
        }
        .login-link a {
            color: #3d1050;
            text-decoration: none;
            font-weight: bold;
        }
        .background-layer {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.1); /* Slightly visible */
            backdrop-filter: blur(10px); /* Soft blur effect */
            z-index: -1; /* Keeps it behind other elements */
        }

    </style>
</head>
<body>
    <div class="navbar">
        <div style="color: orange;">Optima Bank</div>
        <div>
            <a href="#">ABOUT US</a>
            <a href="#">CONTACT</a>
            <a href="#" style="text-decoration: underline;">SIGN UP</a>
        </div>
    </div>
    <div class="background-layer"></div>
    <div class="container">
        <h2>Sign up</h2>
        <?php if (!empty($error)) echo "<p class='error'>$error</p>"; ?>
        <?php if (!empty($success)) echo "<p class='success'>$success</p>"; ?>
        <form method="post">
            <input type="text" name="username" placeholder="Username" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="text" name="phone" placeholder="Phone Number" required>
            <div class="password-container">
                <input type="password" name="password" placeholder="Password" required>
                <input type="password" name="confirm_password" placeholder="Confirm Password" required>
            </div>
            <button type="submit" class="btn">Sign Up</button>
        </form>
        <div class="login-link">or <a href="#">Log in</a></div>
    </div>
</body>
</html>