<?php
session_start();
include 'includes/db.php';

// Redirect if not logged in
if (!isset($_SESSION['student_id'])) {
    header("Location: student-login.php");
    exit();
}

if (isset($_POST['change'])) {
    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];
    $student_id = $_SESSION['student_id'];

    if ($new_password !== $confirm_password) {
        $error = "❌ New password and confirm password do not match!";
    } else {
        $stmt = $conn->prepare("SELECT password FROM student WHERE id = ?");
        $stmt->bind_param("i", $student_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        if (password_verify($current_password, $user['password'])) {
            $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
            $update = $conn->prepare("UPDATE student SET password = ? WHERE id = ?");
            $update->bind_param("si", $hashed_password, $student_id);

            if ($update->execute()) {
                $success = "✅ Password changed successfully!";
            } else {
                $error = "❌ Something went wrong!";
            }
        } else {
            $error = "❌ Current password is incorrect!";
        }
    }
}
?>

<?php include 'includes/menu.php'; ?>

<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #008B8B; /* dark cyan */
        margin: 0;
        padding: 0;
    }

    .password-container {
        max-width: 400px;
        background: #ffffff;
        margin: 60px auto;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
    }

    .password-container h2 {
        text-align: center;
        color: darkcyan;
        margin-bottom: 20px;
    }

    .password-container input {
        width: 100%;
        padding: 12px;
        margin: 8px 0 15px 0;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 14px;
    }

    .password-container button {
        width: 100%;
        padding: 12px;
        background-color: darkcyan;
        color: white;
        font-size: 16px;
        font-weight: bold;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: 0.3s;
    }

    .password-container button:hover {
        background-color: #006666;
    }

    .message {
        text-align: center;
        margin-bottom: 10px;
        font-weight: bold;
    }

    .success {
        color: green;
    }

    .error {
        color: red;
    }

    .back-link {
        display: block;
        text-align: center;
        margin-top: 15px;
        text-decoration: none;
        color: darkcyan;
        font-weight: bold;
        transition: 0.3s;
    }

    .back-link:hover {
        text-decoration: underline;
    }
</style>

<div class="password-container">
    <h2>Change Password</h2>

    <?php if (!empty($success)) echo "<p class='message success'>$success</p>"; ?>
    <?php if (!empty($error)) echo "<p class='message error'>$error</p>"; ?>

    <form method="POST">
        <input type="password" name="current_password" placeholder="Current Password" required>
        <input type="password" name="new_password" placeholder="New Password" required>
        <input type="password" name="confirm_password" placeholder="Confirm New Password" required>
        <button type="submit" name="change">Change Password</button>
    </form>

    <a class="back-link" href="index.php">⬅ Back to Dashboard</a>
</div>
