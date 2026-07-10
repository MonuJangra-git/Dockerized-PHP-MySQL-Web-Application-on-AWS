<?php
require_once 'config.php';

// Start session
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Only accept POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit();
}

// Get and sanitize input
$username = trim($_POST['username'] ?? '');
$password = $_POST['password'] ?? '';

// Validate inputs
if (empty($username) || empty($password)) {
    header('Location: index.php?error=empty_fields');
    exit();
}

// Basic input validation
if (strlen($username) > 50 || strlen($password) > 100) {
    header('Location: index.php?error=invalid_credentials');
    exit();
}

// Connect to database
$conn = getDBConnection();

// Use prepared statement to prevent SQL injection
$stmt = $conn->prepare("SELECT id, username, password, email FROM users WHERE username = ? LIMIT 1");

if (!$stmt) {
    error_log("Prepare failed: " . $conn->error);
    header('Location: index.php?error=server_error');
    exit();
}

$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();
    
    // Verify password using password_verify (works with password_hash)
    if (password_verify($password, $user['password'])) {
        // Password is correct - Create session
        
        // Regenerate session ID to prevent session fixation
        session_regenerate_id(true);
        
        // Store user info in session
        $_SESSION['user_id']       = $user['id'];
        $_SESSION['username']      = $user['username'];
        $_SESSION['email']         = $user['email'];
        $_SESSION['last_activity'] = time();
        $_SESSION['login_time']    = date('Y-m-d H:i:s');
        
        // Generate CSRF token for future requests
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        
        $stmt->close();
        $conn->close();
        
        // Redirect to dashboard
        header('Location: dashboard.php');
        exit();
        
    } else {
        // Wrong password
        $stmt->close();
        $conn->close();
        
        // Add small delay to prevent brute force
        sleep(1);
        
        header('Location: index.php?error=invalid_credentials');
        exit();
    }
} else {
    // User not found
    $stmt->close();
    $conn->close();
    
    sleep(1);
    
    header('Location: index.php?error=invalid_credentials');
    exit();
}
?>