<?php
require_once('db_connection.php');
require_once('header.php');
require_once('menu.php');

//session_start();

// Generate CSRF token if it doesn't exist
if (!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

// Check if the user is logged in
if ($_SESSION['user_logged_in'] !== true) {
    header("Location: index.php");
    exit();
}

// Initialize variables
$activities = [];

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate CSRF token
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die("Invalid CSRF token. Please try again.");
    }

    // Prevent duplicate submissions
    if (isset($_SESSION['last_submission']) && $_SESSION['last_submission'] === $_POST) {
        echo "<script>alert('This form was already submitted.');</script>";
    } else {
        // Save the current submission
        $_SESSION['last_submission'] = $_POST;

        $record_ids = $_POST['record_id'];
        $activity_names = $_POST['activity_name'];
        $activity_dates = $_POST['activity_date'];
        $statuses = $_POST['status'];
        $delete_flags = $_POST['delete'] ?? [];

        foreach ($activity_names as $index => $activity_name) {
            $record_id = intval($record_ids[$index]);
            $activity_date = $activity_dates[$index];
            $status = $statuses[$index];

            if (in_array($record_id, $delete_flags)) {
                // Delete record
                $sql = "DELETE FROM user_activities WHERE id = :record_id";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':record_id', $record_id, PDO::PARAM_INT);
            } elseif ($record_id > 0) {
                // Update existing record
                $sql = "UPDATE user_activities 
                        SET activity_name = :activity_name, activity_date = :activity_date, status = :status
                        WHERE id = :record_id";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':activity_name', $activity_name);
                $stmt->bindParam(':activity_date', $activity_date);
                $stmt->bindParam(':status', $status);
                $stmt->bindParam(':record_id', $record_id, PDO::PARAM_INT);
            } else {
                // Insert new record
                $sql = "INSERT INTO user_activities (activity_name, activity_date, status)
                        VALUES (:activity_name, :activity_date, :status)";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':activity_name', $activity_name);
                $stmt->bindParam(':activity_date', $activity_date);
                $stmt->bindParam(':status', $status);
            }

            if (!$stmt->execute()) {
                echo "<script>alert('Error: " . implode(', ', $stmt->errorInfo()) . "');</script>";
                break;
            }
        }
        echo "<script>alert('Changes saved successfully.');</script>";
    }
}

// Fetch existing activities
$sql = "SELECT * FROM user_activities";
$stmt = $pdo->query($sql);
if ($stmt) {
    $activities = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Fetch calendar data
$calendarData = [];
$sql = "SELECT activity_date, activity_name, status FROM user_activities";
$stmt = $pdo->query($sql);
if ($stmt) {
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $calendarData[] = [
            'title' => $row['activity_name'] . ' (' . ucfirst($row['status']) . ')',
            'start' => $row['activity_date'],
            'color' => $row['status'] === 'completed' ? 'green' : 'red'
        ];
    }
}
?>

<section>
    <div class="container mt-5">
        <h1 class="mb-4">Monthly Goal Tracker</h1>

        <!-- Form to Add or Edit Activities -->
        <form method="POST" class="mb-4" id="activitiesForm">
            <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">
            <div id="activitiesContainer">
                <?php
                if (empty($activities)) {
                    $activities = [[
                        'id' => '',
                        'activity_name' => '',
                        'activity_date' => '',
                        'status' => ''
                    ]];
                }

                foreach ($activities as $activity) {
                ?>
                    <div class="row g-3 activity-row">
                        <input type="hidden" name="record_id[]" value="<?= htmlspecialchars($activity['id']) ?>">
                        <div class="col-md-3">
                            <label class="form-label">Activity Name</label>
                            <input type="text" name="activity_name[]" class="form-control" value="<?= htmlspecialchars($activity['activity_name']) ?>" required>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Activity Date</label>
                            <input type="date" name="activity_date[]" class="form-control" min="<?= date('Y-m-d') ?>" value="<?= htmlspecialchars($activity['activity_date']) ?>" required>
                        </div>
                        <div class="col-md-2">
                            <label class="form-label">Status</label>
                            <select name="status[]" class="form-select" required>
                                <option value="completed" <?= $activity['status'] === 'completed' ? 'selected' : '' ?>>Completed</option>
                                <option value="skipped" <?= $activity['status'] === 'skipped' ? 'selected' : '' ?>>Skipped</option>
                            </select>
                        </div>
                        <div class="col-md-1 d-flex align-items-end">
                            <input type="checkbox" name="delete[]" value="<?= htmlspecialchars($activity['id']) ?>" class="form-check-input">
                            <label class="form-check-label ms-2">Delete</label>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
            <div class="mt-3">
                <button type="button" class="btn btn-secondary" id="addActivity">Add More</button>
                <button type="submit" class="btn btn-primary">Save Changes</button>
            </div>
        </form>

        <!-- Calendar -->
        <div id="calendar"></div>
    </div>
</section>
<style>
    :root {
        --background-color: #ffffff;
        --default-color: #444444;
        --heading-color: #2a2c39;
        --accent-color: #ef6603;
        --surface-color: #ffffff;
        --contrast-color: #ffffff;
    }
 
    body {
        background-color: var(--background-color);
        color: var(--default-color);
    }
 
    h1, h2, h3, h4, h5, h6 {
        color: var(--heading-color);
    }
 
    .btn-primary {
        background-color: var(--accent-color);
        border-color: var(--accent-color);
    }
 
    .btn-primary:hover {
        background-color: #d45500;
        border-color: #d45500;
    }
 
    .form-control, .form-select {
        background-color: var(--surface-color);
    }
 
    .form-label {
        color: var(--default-color);
    }
 
    #calendar {
        background-color: var(--surface-color);
        padding: 20px;
        border-radius: 8px;
    }
    .header{
        background: #000;
    }
</style>
 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Initialize FullCalendar
        const calendarEl = document.getElementById('calendar');
        const calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            events: <?= json_encode($calendarData); ?>
        });
        calendar.render();
 
        // Add more activity rows
        document.getElementById('addActivity').addEventListener('click', function () {
            const activityRow = document.querySelector('.activity-row').cloneNode(true);
            activityRow.querySelectorAll('input, select').forEach(input => {
                if (input.type !== 'hidden') input.value = '';
                if (input.type === 'checkbox') input.checked = false;
            });
            activityRow.querySelector('input[name="record_id[]"]').value = '';
            document.getElementById('activitiesContainer').appendChild(activityRow);
        });
    });
</script>
 
<?php
require_once('footer.php');
// Close the PDO connection
$pdo = null;
?>