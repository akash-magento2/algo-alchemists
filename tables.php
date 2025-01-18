<?php 
require_once 'db_connection.php';
// Create users table
    $create_users_table = "
        CREATE TABLE IF NOT EXISTS users (
            id INT(11) AUTO_INCREMENT PRIMARY KEY,
            phone_number VARCHAR(15) NOT NULL UNIQUE,
            name VARCHAR(255) NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )
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


    // Create goal table
    $create_goal_table = "
        CREATE TABLE IF NOT EXISTS goals (
            goal_id INT AUTO_INCREMENT PRIMARY KEY,
            user_id INT NOT NULL,
            goal_name VARCHAR(255) NOT NULL,
            status VARCHAR(10) NOT NULL,
            frequency VARCHAR(255) NOT NULL,
            UNIQUE KEY user_goal (user_id, goal_name),
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )

    ";
    $pdo->exec($create_goal_table);

    // Create tracker table
    $create_useractivity_table = "
    CREATE TABLE user_activities (
        id INT AUTO_INCREMENT PRIMARY KEY,
        user_id INT NOT NULL,
        activity_date DATE NOT NULL,
        activity_name VARCHAR(255) NOT NULL,
        status ENUM('completed', 'skipped') NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";
    $pdo->exec($create_useractivity_table);

?>