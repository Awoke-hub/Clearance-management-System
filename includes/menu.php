<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Debre Berhan University-online student clearance</title>
    <link rel="stylesheet" type="text/css" href="Css/style.css">
     <link rel="icon" href="images/logo.png" type="image/png">
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #008B8B; /* darkcyan */
            color: white;
        }

        header {
            background: #004d4d;
            padding: 15px 40px;
            display: flex;
            justify-content: space-between; /* ✅ space between left menu & right section */
            align-items: center;
            box-shadow: 0px 3px 8px rgba(0,0,0,0.3);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .logo img {
            height: 70px;
            margin-right: 30px;
        }

        .nav-left {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .nav-left ul {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
            gap: 15px;
        }

        .nav-left ul li {
            display: inline;
        }

        .nav-left ul li a {
            text-decoration: none;
            color: white;
            font-weight: bold;
            padding: 8px 15px;
            border-radius: 5px;
            transition: 0.3s;
        }

        .nav-left ul li a:hover,
        .nav-left ul li.active a {
            background: #00b3b3;
            color: #fff;
        }

        /* ✅ Right section (Welcome + Change Password + Logout) */
        .nav-right {
            font-size: 14px;
            color: white;
        }

        .nav-right span {
            font-weight: bold;
        }

        .nav-right a {
            color: #00ffcc;
            text-decoration: none;
            margin-left: 10px;
            font-size: 14px;
        }

        .nav-right a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
<header>
    <!-- LEFT SECTION -->
    <div class="nav-left">
        <div class="logo">
            <img src="/clearance-management/images/logo.png" alt="University Logo">
        </div>
        <ul>
            <li class="active"><a href="index.php">HOME</a></li>
            <?php if (isset($_SESSION['username'])): ?>
                <li><a href="clearance.php">CLEARANCE</a></li>
                <li><a href="my-requests.php">MY-REQUEST</a></li>
            <?php else: ?>
                <li><a href="login.php">LOGIN</a></li>
            <?php endif; ?>
            <li><a href="contact_us.php">CONTACT</a></li>
            <li><a href="about.php">ABOUT</a></li>
        </ul>
    </div>

    <!-- ✅ RIGHT SECTION -->
    <?php if (isset($_SESSION['full_name'])): ?>
        <div class="nav-right">
            Welcome, <span><?php echo htmlspecialchars($_SESSION['full_name']); ?></span>
            <a href="change-password.php">Change Password</a>
            <a href="logout.php">LOGOUT</a>
        </div>
    <?php endif; ?>
</header>
