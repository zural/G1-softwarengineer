<?php
session_start();

if (isset($_SESSION['user_id'])) {
    // User is not logged in; redirect to login page
    header('Location: Mainpage.php');
    exit;
}


// Include your existing database connection
require 'db_connection.php';

$error = '';

// Process the form after submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email    = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    // Basic validations
    if (empty($email) || empty($password)) {
        $error = 'All fields are required.';
    } else {
        // Prepare a statement to check for the user by email
        $stmt = $conn->prepare("SELECT Id, Password, Is_active FROM User WHERE Email = ?");
        if (!$stmt) {
            die('Prepare failed: ' . $conn->error); 
        }
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        // Check if we got exactly one matching row
        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();

            // Verify the password using password_verify()
            if (password_verify($password, $row['Password'])) {
                // Optionally check if the account is active
                if ((int)$row['Is_active'] !== 1) {
                    $error = 'Your account is not active. Please contact support.';
                } else {
                    // Login success: store the user's ID (or other info) in session
                    $_SESSION['user_id'] = $row['Id'];

                    // Redirect to a logged-in area (e.g., dashboard)
                    header('Location: Mainpage.php');
                    exit;
                }
            } else {
                $error = 'Invalid email or password.';
            }
        } else {
            $error = 'Invalid email or password.';
        }

        $stmt->close();
    }
}
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

        .navbar .menu {
            display: flex;
            align-items: center;
        }

        .navbar .menu a {
            color: white;
            text-decoration: none;
            font-size: 14px;
            margin: 0 10px;
            font-weight: bold;
        }

        .navbar .menu span {
            color: white;
            font-size: 14px;
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
        .error {
            color: red;
            margin: 10px 0;
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
    </style>
</head>
<body>
    <!-- Top Nav -->
    <div class="navbar">
        <div class="logo">Optima Bank</div>
        <div class="menu">
            <a href="#">ABOUT US</a>
            <a href="#">CONTACT</a>
            <a href="#" style="text-decoration: underline;">SIGN IN</a>
        </div>
    </div>

    <div class="background-layer"></div>

    <!-- Login Container -->
    <div class="container">
        <h2>Sign in</h2>

        <!-- Display error messages if any -->
        <?php if (!empty($error)) : ?>
            <p class="error"><?php echo $error; ?></p>
        <?php endif; ?>

        <form action="" method="POST">
            <input type="text" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" class="btn">Sign in</button>
        </form>

        <button class="btn-google">
            <img src="google.png" alt="Google"> 
            Sign in with Google
        </button>
        <a href="signup.php">or Sign up</a>
    </div>
</body>
</html>
