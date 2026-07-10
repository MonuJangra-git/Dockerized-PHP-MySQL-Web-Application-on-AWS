-- Use the database created by Docker
USE myappdb;

-- Create users table
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insert default admin user
-- Password: root
-- Generated using PHP password_hash('root', PASSWORD_DEFAULT)

INSERT INTO users (username, password, email)
VALUES (
    'admin',
    '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9lLC/.og/at2.uheWG/igi',
    'admin@example.com'
)
ON DUPLICATE KEY UPDATE username=username;

-- Confirm setup
SELECT 'Database setup completed successfully' AS Status;
