<?php
require_once 'config.php';

// Require login to access this page
requireLogin();

// Get user info from session
$username   = htmlspecialchars($_SESSION['username']);
$loginTime  = htmlspecialchars($_SESSION['login_time']);
$email      = htmlspecialchars($_SESSION['email'] ?? '');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - My Website</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f5f5f5;
        }

        /* Top Navigation Bar */
        .navbar {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 12px 25px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 10px rgba(0,0,0,0.2);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .navbar-brand {
            font-size: 20px;
            font-weight: 700;
        }

        .navbar-user {
            display: flex;
            align-items: center;
            gap: 15px;
            font-size: 14px;
        }

        .user-info {
            text-align: right;
        }

        .user-info .name {
            font-weight: 600;
            font-size: 15px;
        }

        .user-info .login-time {
            font-size: 11px;
            opacity: 0.8;
        }

        .btn-logout {
            background: rgba(255,255,255,0.2);
            color: white;
            border: 2px solid rgba(255,255,255,0.5);
            padding: 8px 18px;
            border-radius: 20px;
            cursor: pointer;
            font-size: 14px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s;
        }

        .btn-logout:hover {
            background: rgba(255,255,255,0.35);
            border-color: white;
        }

        /* Main Content - iframe for website.html */
        .main-content {
            width: 100%;
            height: calc(100vh - 57px);
        }

        .main-content iframe {
            width: 100%;
            height: 100%;
            border: none;
        }
    </style>
</head>
<body>

    <!-- Navigation Bar -->
    <nav class="navbar">
        <div class="navbar-brand">
            🌐 MyWebsite
        </div>
        <div class="navbar-user">
            <div class="user-info">
                <div class="name">👤 <?php echo $username; ?></div>
                <div class="login-time">Logged in: <?php echo $loginTime; ?></div>
            </div>
            <a href="logout.php" class="btn-logout">🚪 Logout</a>
        </div>
    </nav>

    <!-- Your website.html loaded inside iframe -->
    <div class="main-content">
        <iframe 
            src="website.html" 
            title="My Website"
            sandbox="allow-scripts allow-same-origin allow-forms allow-popups"
        ></iframe>
    </div>

</body>
</html>