<?php
// Get the raw POST data
$data = json_decode(file_get_contents('php://input'), true);

// Check if the data was received properly
if (isset($data['goalsData'])) {
    $goalsData = $data['goalsData'];

    $mobileNumber = '';
    session_start();
    if (isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in'] === true) {
        $mobileNumber = $_SESSION['phone_number'];
    }

    $userId = !empty($goalsData) ? $goalsData[0]['userId'] : 0;  // Set or retrieve the actual user ID dynamically

    // Database connection details
    try {
        $pdo = new PDO('mysql:host=localhost;dbname=algo_alchemists', 'root', 'root');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Start a transaction to handle the batch update and delete operation
        $pdo->beginTransaction();

        // Prepare an SQL statement for deleting goals that are not in the new list
        $goalNames = array_map(function ($goal) {
            return $goal['goalName'];
        }, $goalsData);

        // If there are any goals to delete
        if (!empty($goalNames)) {
            $placeholders = str_repeat('?,', count($goalNames) - 1) . '?';
            $stmtDelete = $pdo->prepare("DELETE FROM goals WHERE user_id = ? AND goal_name NOT IN ($placeholders)");
            $stmtDelete->execute(array_merge([$userId], $goalNames));
        }

        // Prepare SQL statements
        $stmtCheckGoalExists = $pdo->prepare("SELECT COUNT(*) FROM goals WHERE user_id = ? AND goal_name = ?");
        $stmtInsert = $pdo->prepare("INSERT INTO goals (user_id, goal_name, status, frequency) VALUES (?, ?, ?, ?)");
        $stmtUpdate = $pdo->prepare("UPDATE goals SET status = ?, frequency = ? WHERE user_id = ? AND goal_name = ?");

        // Loop through the goals data
        foreach ($goalsData as $goal) {
            // Check if the goal already exists
            $stmtCheckGoalExists->execute([$userId, $goal['goalName']]);
            $goalExists = $stmtCheckGoalExists->fetchColumn();

            if ($goalExists) {
                // Update existing goal if it exists
                $stmtUpdate->execute([$goal['status'], $goal['frequency'], $userId, $goal['goalName']]);
            } else {
                // Insert a new goal if it doesn't exist
                $stmtInsert->execute([$userId, $goal['goalName'], $goal['status'], $goal['frequency']]);
            }
        }

        // Commit the transaction
        $pdo->commit();

        // Send a success response
        echo json_encode(['status' => 'success']);
    } catch (PDOException $e) {
        // Rollback the transaction in case of error
        $pdo->rollBack();

        // Send an error response
        echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
    }
} else {
    // If the data wasn't properly received
    echo json_encode(['status' => 'error', 'message' => 'Invalid data received']);
}
?>
