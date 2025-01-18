<?php
require_once 'db_connection.php';  // Include the database connection file

try {
    // Query to fetch all goals
    $stmt = $pdo->prepare("SELECT * FROM goals ORDER BY goal_id");
    $stmt->execute();  // Don't forget to execute the prepared statement
    $goals = $stmt->fetchAll(PDO::FETCH_ASSOC);  // Fetch the results as an associative array

    // Return the data as a JSON response
    echo json_encode(['status' => 'success', 'goals' => $goals]);

} catch (PDOException $e) {
    // Handle any errors
    echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
}
?>