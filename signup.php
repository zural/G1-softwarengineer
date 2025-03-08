<?php
// Include your database connection file
require 'db_connection.php';
session_start();

if (isset($_SESSION['user_id'])) {
    // User is not logged in; redirect to login page
    header('Location: Mainpage.php');
    exit;
}
$error   = '';
$success = '';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Gather form data (trim to remove any extra whitespace)
    $username         = trim($_POST['username'] ?? '');
    $email            = trim($_POST['email'] ?? '');
    $phone            = trim($_POST['phone'] ?? '');
    $password         = $_POST['password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';

    // Basic validations
    if (empty($username) || empty($email) || empty($phone) || empty($password) || empty($confirm_password)) {
        $error = 'All fields are required.';
    } elseif ($password !== $confirm_password) {
        $error = 'Passwords do not match.';
    }

    if (empty($error)) {
        // Hash password before saving to DB
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Check if email is already registered
        $stmt = $conn->prepare("SELECT COUNT(*) FROM User WHERE Email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->bind_result($count);
        $stmt->fetch();
        $stmt->close();

        if ($count > 0) {
            $error = 'That email is already registered.';
        } else {
            // Insert new user; adjust column names if necessary
            $stmt = $conn->prepare("
                INSERT INTO User (Email, Username, Phone_number, Password, Is_active, Points) 
                VALUES (?, ?, ?, ?, 1, 0)
            ");
            $stmt->bind_param("ssss", $email, $username, $phone, $hashedPassword);

            if ($stmt->execute()) {
                $success = 'Registration successful! You can now log in.';
            } else {
                $error = 'Error registering. Please try again.';
            }

            $stmt->close();
        }
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
            width: 95%;
            padding: 20px 45px;
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
            width: calc(94%);
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
            background: rgba(255, 255, 255, 0.1); /* Light overlay */
            backdrop-filter: blur(10px); /* Soft blur effect */
            z-index: -1; /* Keeps it behind everything */
            background-image: url('Bg.jpg'); /* Replace this later */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
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
        <div style="color: orange;">Optima Bank</div>
        <div>
            <a href="#">ABOUT US</a>
            <a href="#">CONTACT</a>
            <a href="#">SIGN UP</a>
        </div>
    </div>
    <div class="background-layer"></div>

    <div class="container">
        <h2>Sign up</h2>
        <?php if (!empty($error)) : ?>
            <p class="error"><?php echo $error; ?></p>
        <?php endif; ?>
        <?php if (!empty($success)) : ?>
            <p class="success"><?php echo $success; ?></p>
        <?php endif; ?>

        <form method="post" action="">
            <input type="text" name="username" placeholder="Username" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="text" name="phone" placeholder="Phone Number" required>
            <div class="password-container">
                <input type="password" name="password" placeholder="Password" required>
                <input type="password" name="confirm_password" placeholder="Confirm Password" required>
            </div>
            <button type="submit" class="btn">Sign Up</button>
        </form>
        <div class="login-link">or <a href="Login.php">Log in</a></div>
    </div>
</body>
</html>