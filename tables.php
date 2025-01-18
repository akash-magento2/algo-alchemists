<?php
require_once 'db_connection.php';
// Create users table
    $create_users_table = "
        CREATE TABLE IF NOT EXISTS users (
            id INT(11) AUTO_INCREMENT PRIMARY KEY,
            phone_number VARCHAR(15) NOT NULL UNIQUE,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        );
        ALTER TABLE users
		ADD COLUMN name VARCHAR(255) NOT NULL AFTER phone_number;
    ";
    $pdo->exec($create_users_table);

    // Create otp_requests table
    $create_otp_requests_table = "
        CREATE TABLE IF NOT EXISTS otp_requests (
            id INT(11) AUTO_INCREMENT PRIMARY KEY,
            phone_number VARCHAR(15) NOT NULL,
            otp VARCHAR(6) NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )
    ";
    $pdo->exec($create_otp_requests_table);
?>