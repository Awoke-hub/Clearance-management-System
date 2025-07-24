<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UNIVERSITY CLEARANCE</title>
    <link rel="stylesheet" type="text/css" href="Css/style.css">
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
            justify-content: flex-start;
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

        ul {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
            gap: 15px;
        }

        ul li {
            display: inline;
        }

        ul li a {
            text-decoration: none;
            color: white;
            font-weight: bold;
            padding: 8px 15px;
            border-radius: 5px;
            transition: 0.3s;
        }

        ul li a:hover, 
        ul li.active a {
            background: #00b3b3;
            color: #fff;
        }
    </style>
</head>
<body>

<header>
    <div class="logo">
        <img src="../images/logo.png" alt="University Logo">
    </div>
    <ul>
        <li class="active"><a href="index.php">HOME</a></li>

        <!-- Show CLEARANCE only if logged in -->
        <?php if (isset($_SESSION['username'])): ?>
            <li><a href="clearance.php">CLEARANCE</a></li>
            <li><a href="logout.php">LOGOUT</a></li>
            <li><a href="my-requests.php">MY-REQUEST</a></li>
        <?php else: ?>
            <li><a href="login.php">LOGIN</a></li>
        <?php endif; ?>

        <li><a href="contact_us.php">CONTACT</a></li>
        <li><a href="about.php">ABOUT</a></li>
    </ul>
</header>
