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
            font-family: "Poppins", Arial, sans-serif;
            background: url('/mnt/data/image.png') no-repeat center center fixed;
            background-size: cover;
            color: white;
        }
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 50px;
            background: rgba(75, 0, 110, 0.8);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        .navbar .logo {
            color: #ff9f43;
            font-size: 22px;
            font-weight: bold;
        }
        .navbar .menu {
            display: flex;
            align-items: center;
        }
        .navbar .menu a {
            color: white;
            text-decoration: none;
            font-size: 16px;
            margin: 0 15px;
            font-weight: bold;
        }
        .navbar .menu a.active {
            text-decoration: underline;
        }
        .container {
            background: rgba(255, 255, 255, 0.9);
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: 400px;
            text-align: center;
            margin: 10vh auto;
        }
        .container h2 {
            margin-bottom: 20px;
            color: black;
        }
        .error {
            color: red;
            margin: 10px 0;
        }
        input {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .btn {
            background: black;
            color: white;
            padding: 12px;
            width: 100%;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        .btn:hover {
            background: #333;
        }
        .btn-google {
            background: white;
            color: black;
            padding: 12px;
            width: 100%;
            border: 1px solid black;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
            font-size: 16px;
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
            font-size: 14px;
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
            <a href="#" class="active">SIGN IN</a>
        </div>
    </div>

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
