<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page - Optima Bank</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Breul+Grotesk:wght@400;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Breul Grotesk', sans-serif;
        }

        body {
            background: linear-gradient(135deg, #5a0f6e, #d06494);
            color: #333;
        }

        /* Navbar */
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 5%;
            color: white;
            font-size: 16px;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            margin: 0 15px;
            font-weight: 500;
        }

        .navbar a.active {
            text-decoration: underline;
        }

        .point-balance {
            text-align: right;
            padding-right: 5%;
            font-size: 18px;
            font-weight: bold;
            color: white;
        }

        /* Profile Section */
        .profile-container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            width: 80%;
            max-width: 800px;
            margin: 40px auto;
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.2);
        }

        .profile-header {
            font-weight: bold;
            font-size: 22px;
            color: #ff7b00;
            margin-bottom: 20px;
        }

        .profile-picture {
            text-align: center;
        }

        .profile-picture img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            border: 3px solid #ff7b00;
        }

        .edit-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100px;
            margin: 10px auto;
            background: #000;
            color: white;
            border: none;
            padding: 5px;
            border-radius: 5px;
            cursor: pointer;
        }

        .form-group {
            position: relative;
            margin-bottom: 15px;
        }

        .form-group label {
            font-weight: bold;
            font-size: 14px;
            display: block;
        }

        .form-control {
            width: 100%;
            border: none;
            border-bottom: 2px solid #ddd;
            padding: 5px 35px 5px 5px;
            font-size: 16px;
            background: transparent;
            outline: none;
        }

        .edit-icon {
            position: absolute;
            right: 10px;
            top: 65%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #ff7b00;
        }

        /* Footer */
        .footer {
            text-align: center;
            padding: 10px;
            color: white;
            font-size: 14px;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .navbar {
                flex-direction: column;
                text-align: center;
            }
            
            .profile-container {
                width: 90%;
            }

            .point-balance {
                text-align: center;
                padding: 10px 0;
            }
        }
    </style>
</head>
<body>

    <!-- Navigation Bar -->
    <nav class="navbar">
        <div>
            <span class="fs-4 fw-bold">Optima Bank</span>
        </div>
        <div>
            <a href="#" class="active">PROFILE</a>
            <a href="#">ABOUT US</a>
            <a href="#">CONTACT</a>
            <a href="#">HOME</a>
            <a href="#">SIGN OUT</a>
        </div>
    </nav>

    <div class="point-balance">
        Point Balance: 750
    </div>

    <!-- Profile Section -->
    <div class="profile-container">
        <h3 class="profile-header">My Profile</h3>
        <div class="row">
            <div class="profile-picture">
                <img src="https://via.placeholder.com/100" alt="Profile Picture">
                <button class="edit-btn"><i class="fa fa-edit"></i> Edit</button>
            </div>
            <div>
                <div class="form-group">
                    <label>Full Name</label>
                    <input type="text" class="form-control" placeholder="Type here">
                    <i class="fa fa-edit edit-icon"></i>
                </div>
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control" placeholder="Type here">
                    <i class="fa fa-edit edit-icon"></i>
                </div>
                <div class="form-group">
                    <label>Phone Number</label>
                    <input type="text" class="form-control" placeholder="Type here">
                    <i class="fa fa-edit edit-icon"></i>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" placeholder="name@email.com">
                    <i class="fa fa-edit edit-icon"></i>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" placeholder="**********">
                    <i class="fa fa-edit edit-icon"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer">
        ABOUT US | CONTACT
    </div>

</body>
</html>
