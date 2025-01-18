<?php
// Include the database connection file
require_once '../header.php';
require_once '../menu.php'; 
require_once '../db_connection.php';
// Start session
//session_start();

// Check if the user is already logged in, if so, redirect to dashboard or another page
if (isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in'] === true) {
    header("Location: ../index.php");  // Redirect to the dashboard if logged in
    exit();
}

// Define variables
$phone_number = '';
$otp = '';
$error_message = '';
$name = '';

// Step 1: Handle OTP sending when phone number is entered
if (isset($_POST['send_otp'])) {
    // Get phone number from the form
    $phone_number = $_POST['phone_number'];

    // Generate a 6-digit OTP
    $otp = rand(100000, 999999);

    // Store phone number in session for future use
    $_SESSION['phone_number'] = $phone_number;

    // Insert OTP into the database (we'll store the OTP temporarily in the otp_requests table)
    try {
        $stmt = $pdo->prepare("INSERT INTO otp_requests (phone_number, otp) VALUES (?, ?)");
        $stmt->execute([$phone_number, $otp]);

        // For now, simulate OTP sending
        echo "OTP sent to your phone number (simulated).";

        // Redirect to OTP verification form
        header("Location: /algo-alchemists/forms/otpLogin.php?verify=true");
        exit();
    } catch (PDOException $e) {
        $error_message = 'Error sending OTP: ' . $e->getMessage();
    }
}

// Step 2: Handle OTP verification when OTP is entered
if (isset($_POST['verify_otp'])) {
    // Get OTP from the form
    $otp = $_POST['otp'];

    // Retrieve the phone number from session
    if (isset($_SESSION['phone_number'])) {
        $phone_number = $_SESSION['phone_number'];

        // Verify OTP from the database
        try {
            $stmt = $pdo->prepare("SELECT * FROM otp_requests WHERE phone_number = ? ORDER BY created_at DESC LIMIT 1");
            $stmt->execute([$phone_number]);
            $otpRecord = $stmt->fetch();

            if ($otpRecord && $otpRecord['otp'] == $otp) {
                // OTP matches, proceed with user creation

                // Check if the user already exists
                $checkUserStmt = $pdo->prepare("SELECT * FROM users WHERE phone_number = ?");
                $checkUserStmt->execute([$phone_number]);
                $user = $checkUserStmt->fetch();

                if (!$user) {
                    // User does not exist, insert into users table
                    // Request user name and store it in the 'name' field
                    if (isset($_POST['name']) && !empty($_POST['name'])) {
                        $name = $_POST['name'];
                    } else {
                        // If no name is provided, you can display an error or set a default value.
                        $error_message = "Please enter your name.";
                    }

                    if (empty($error_message)) {
                        $insertUserStmt = $pdo->prepare("INSERT INTO users (phone_number, name) VALUES (?, ?)");
                        $insertUserStmt->execute([$phone_number, $name]);
                    }
                } else {
                    // User exists, retrieve the user's name
                    $name = $user['name'];
                }

                // Step 3: Set session variables for logged-in user
                $_SESSION['user_logged_in'] = true;
                $_SESSION['phone_number'] = $phone_number;
                $_SESSION['name'] = $name;  // Store the user's name in the session

                // Redirect to a protected page after successful login
                header("Location: ../index.php");
                exit();
            } else {
                $error_message = "Invalid OTP or OTP expired.";
            }
        } catch (PDOException $e) {
            $error_message = 'Error verifying OTP: ' . $e->getMessage();
        }
    } else {
        $error_message = "Phone number is missing from session.";
    }
}
?>
<div class="main otplogin">
<section>
<div class="container">
    <h2>Login with OTP</h2>

    <!-- Error message display -->
    <?php if ($error_message): ?>
        <div class="error-message"><?= $error_message ?></div>
    <?php endif; ?>

    <?php if (!isset($_GET['verify'])): ?>
        <!-- Step 1: Phone number input form -->
        <div class="form-container">
            <form method="post" action="">
                <div class="form-group">
                    <label for="phone_number">Enter your phone number</label>
                    <input type="text" name="phone_number" id="phone_number" class="form-control" placeholder="Enter phone number" required>
                </div>
                <button type="submit" name="send_otp" class="btn btn-primary btn-block">Send OTP</button>
            </form>
        </div>
    <?php else: ?>
        <!-- Step 2: OTP input form (for OTP verification) -->
        <div class="form-container">
            <form method="post" action="">
                <div class="form-group">
                    <label for="otp">Enter OTP</label>
                    <input type="number" name="otp" id="otp" class="form-control" placeholder="Enter OTP" required>
                </div>
                <div class="form-group">
                    <label for="name">Enter your name</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Enter your name" required>
                </div>
                <button type="submit" name="verify_otp" class="btn btn-success btn-block">Verify OTP</button>
            </form>
        </div>
    <?php endif; ?>

</div>
</section>
</div>
<style type="text/css">
    .header {
        background: #000;
    }
</style>
<?php require_once '../footer.php'; ?>
