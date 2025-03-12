<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page - Optima Bank</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #5a0f6e, #d06494);
            color: #333;
            font-family: Arial, sans-serif;
        }
        .navbar {
            background: transparent;
            color: white;
        }
        .navbar a {
            color: white;
            text-decoration: none;
            margin-right: 15px;
        }
        .profile-container {
            background: white;
            padding: 20px;
            border-radius: 10px;
            width: 70%;
            margin: 40px auto;
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.2);
        }
        .profile-header {
            font-weight: bold;
            font-size: 20px;
            color: #ff7b00;
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
            display: block;
            width: 100px;
            margin: 10px auto;
            background: #000;
            color: white;
            border: none;
            padding: 5px;
            border-radius: 5px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-control {
            border: none;
            border-bottom: 2px solid #ddd;
            border-radius: 0;
            background: transparent;
            outline: none;
            box-shadow: none;
        }
        .edit-icon {
            cursor: pointer;
            color: #ff7b00;
        }
        .point-balance {
            text-align: right;
            font-weight: bold;
            color: white;
        }
        .footer {
            text-align: center;
            padding: 10px;
            color: white;
        }
    </style>
</head>
<body>

    <!-- Navigation Bar -->
    <nav class="navbar p-3">
        <div class="container-fluid">
            <span class="fs-4 fw-bold text-white">Optima Bank</span>
            <div>
                <a href="#">PROFILE</a>
                <a href="#">ABOUT US</a>
                <a href="#">CONTACT</a>
                <a href="#">HOME</a>
                <a href="#">SIGN OUT</a>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="point-balance">
            Point Balance: 750
        </div>
    </div>

    <!-- Profile Section -->
    <div class="profile-container">
        <h3 class="profile-header">My Profile</h3>
        <div class="row">
            <div class="col-md-4 profile-picture">
                <img src="https://via.placeholder.com/100" alt="Profile Picture">
                <button class="edit-btn"><i class="fa fa-edit"></i> Edit</button>
            </div>
            <div class="col-md-8">
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
