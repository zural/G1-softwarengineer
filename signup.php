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
            width: 100%;
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
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
            width: 280px;
            margin-top: 60px;
        }
        input {
            width: 100%;
            padding: 8px;
            margin: 8px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
        }
        .btn {
            background: #190032;
            color: white;
            padding: 8px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
        }
        .error { color: red; }
        .success { color: green; }
    </style>
</head>
<body>
    <div class="navbar">
        <div>Optima Bank</div>
        <div>
            <a href="#">ABOUT US</a>
            <a href="#">CONTACT</a>
            <a href="#" style="text-decoration: underline;">SIGN UP</a>
        </div>
    </div>
    <div class="container">
        <h2>Sign Up</h2>
        <?php if (!empty($error)) echo "<p class='error'>$error</p>"; ?>
        <?php if (!empty($success)) echo "<p class='success'>$success</p>"; ?>
        <form method="post">
            <input type="text" name="username" placeholder="Username" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="text" name="phone" placeholder="Phone Number" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="password" name="confirm_password" placeholder="Confirm Password" required>
            <button type="submit" class="btn">Sign Up</button>
        </form>
    </div>
</body>
</html>
