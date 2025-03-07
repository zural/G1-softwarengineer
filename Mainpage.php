<?php
// Start session to manage points
session_start();
if (!isset($_SESSION['points'])) {
    $_SESSION['points'] = 750;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Optima Bank</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background: linear-gradient(to right, #4b006e, #d472a3);
            color: white;
        }
        .navbar {
            background: linear-gradient(to right, #4b006e, #d472a3);
        }
        .voucher-card {
            background: white;
            color: black;
            padding: 15px;
            border-radius: 10px;
            text-align: center;
        }
        .redeem-btn {
            background-color: #d63384;
            color: white;
            border: none;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand" href="#">Optima Bank</a>
        <div class="ml-auto">
            <span class="mr-3">Point Balance: <?php echo $_SESSION['points']; ?></span>
            <a href="#" class="text-white">Profile</a>
        </div>
    </nav>
    
    <div class="container mt-4">
        <h2 class="text-center">Latest Vouchers</h2>
        <div class="row">
            <div class="col-md-4">
                <div class="voucher-card">
                    <img src="hotel.jpg" alt="D'Wharf Hotel" class="img-fluid">
                    <h5>D'Wharf Hotel - RM50 Off</h5>
                    <button class="btn redeem-btn">Redeem</button>
                    <button class="btn btn-outline-dark">Add to Cart</button>
                </div>
            </div>
            <div class="col-md-4">
                <div class="voucher-card">
                    <img src="trip.jpg" alt="Trip.Com" class="img-fluid">
                    <h5>Trip.Com - 10% Off</h5>
                    <button class="btn redeem-btn">Redeem</button>
                    <button class="btn btn-outline-dark">Add to Cart</button>
                </div>
            </div>
            <div class="col-md-4">
                <div class="voucher-card">
                    <img src="uniqlo.jpg" alt="Uniqlo" class="img-fluid">
                    <h5>Uniqlo - 30% Off</h5>
                    <button class="btn redeem-btn">Redeem</button>
                    <button class="btn btn-outline-dark">Add to Cart</button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>