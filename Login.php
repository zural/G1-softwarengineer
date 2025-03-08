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
        <div class="logo">Optima Bank</div>
        <div class="menu">
            <a href="#">ABOUT US</a>
            <a href="#">CONTACT</a>
            <a href="#">SIGN IN</a>
        </div>
    </div>
    <div class="background-layer"></div>
    <div class="container">
        <h2>Sign in</h2>
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

