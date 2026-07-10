<?php
// Load environment variables from .env if available
$envFile = __DIR__ . '/.env';
if (file_exists($envFile)) {
    $lines = file($envFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    if ($lines !== false) {
        foreach ($lines as $line) {
            $line = trim($line);
            if ($line === '' || strpos($line, '#') === 0) {
                continue;
            }

            $parts = explode('=', $line, 2);
            if (count($parts) !== 2) {
                continue;
            }

            $name = trim($parts[0]);
            $value = trim($parts[1]);

            if ($name !== '' && !array_key_exists($name, $_SERVER) && !array_key_exists($name, $_ENV)) {
                putenv(sprintf('%s=%s', $name, $value));
                $_ENV[$name] = $value;
                $_SERVER[$name] = $value;
            }
        }
    }
}

function getEnvValue($key, $default = null) {
    $value = getenv($key);
    if ($value === false || $value === '') {
        return $default;
    }
    return $value;
}

// Database Configuration
define('DB_HOST', getEnvValue('DB_HOST', 'mysqldb'));
define('DB_PORT', getEnvValue('DB_PORT', '3306'));
define('DB_USER', getEnvValue('DB_USERNAME', getEnvValue('DB_USER', 'app_user')));
define('DB_PASS', getEnvValue('DB_PASSWORD', getEnvValue('DB_PASS', 'app_password')));
define('DB_NAME', getEnvValue('DB_DATABASE', getEnvValue('DB_NAME', 'example_app_db')));

// Session Configuration
define('SESSION_TIMEOUT', 1800); // 30 minutes

// Create Database Connection
function getDBConnection() {
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME, (int) DB_PORT);
    
    if ($conn->connect_error) {
        error_log("Database connection failed: " . $conn->connect_error);
        die(json_encode([
            'success' => false, 
            'message' => 'Database connection failed. Please try again later.'
        ]));
    }
    
    $conn->set_charset("utf8mb4");
    return $conn;
}

// Check if user is logged in
function isLoggedIn() {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    
    // Check session timeout
    if (isset($_SESSION['last_activity'])) {
        if (time() - $_SESSION['last_activity'] > SESSION_TIMEOUT) {
            session_destroy();
            return false;
        }
    }
    
    // Update last activity time
    if (isset($_SESSION['user_id'])) {
        $_SESSION['last_activity'] = time();
        return true;
    }
    
    return false;
}

// Redirect if not logged in
function requireLogin() {
    if (!isLoggedIn()) {
        header('Location: index.php?error=session_expired');
        exit();
    }
}
?>
