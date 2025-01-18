<?php
// Database connection parameters
$host = 'localhost';         // Database host
$username = 'root';          // Database username
$password = 'root';              // Database password
$database = 'algo_alchemists';  // Database name

try {
    // Establish connection to MySQL server (without selecting a database yet)
    $pdo = new PDO("mysql:host=$host", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  // Error handling mode

    // Check if the database exists or create it
    $db_check_query = "CREATE DATABASE IF NOT EXISTS `$database`";
    $pdo->exec($db_check_query);  // Use exec() for queries that don't return results (like CREATE DATABASE)
    
    // Switch to the newly created or existing database
    $pdo->exec("USE `$database`");
} catch (PDOException $e) {
    echo false;
    // Handle error (e.g., connection failure)
    die("Connection failed: " . $e->getMessage());
}
?>