<?php
session_start();
include 'includes/db.php';

if (!isset($_SESSION['reset_student_id'])) {
    header("Location: forgot-password.php");
    exit();
}

$message = "";

if (isset($_POST['reset'])) {
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    if ($new_password === $confirm_password) {
        $hashed = password_hash($new_password, PASSWORD_DEFAULT);
        $student_id = $_SESSION['reset_student_id'];

        $stmt = $conn->prepare("UPDATE student SET password=? WHERE id=?");
        $stmt->bind_param("si", $hashed, $student_id);

        if ($stmt->execute()) {
            $message = "<p class='success-msg'>✅ Password reset successfully! <a href='login.php'>Login now</a></p>";
            unset($_SESSION['reset_student_id']);
        } else {
            $message = "<p class='error-msg'>❌ Something went wrong. Try again.</p>";
        }
    } else {
        $message = "<p class='error-msg'>❌ Passwords do not match!</p>";
    }
}
?>

<?php include 'includes/menu.php'; ?>

<style>
    .reset-container {
        max-width: 400px;
        margin: 50px auto;
        background: #ffffff;
        padding: 25px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        color: #333;
        font-family: Arial, sans-serif;
    }
    .reset-container h2 {
        text-align: center;
        color: #008B8B;
        margin-bottom: 15px;
    }
    .reset-container input {
        width: 100%;
        padding: 10px;
        margin: 8px 0;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 14px;
    }
    .reset-container button {
        width: 100%;
        padding: 10px;
        background: #008B8B;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-weight: bold;
        transition: 0.3s;
    }
    .reset-container button:hover {
        background: #006666;
    }
    .reset-container .error-msg {
        color: red;
        font-weight: bold;
        text-align: center;
    }
    .reset-container .success-msg {
        color: green;
        font-weight: bold;
        text-align: center;
    }
</style>

<div class="reset-container">
    <h2>Reset Password</h2>
    <?php echo $message; ?>
    <form method="POST">
        <label><strong>New Password:</strong></label>
        <input type="password" name="new_password" required>

        <label><strong>Confirm New Password:</strong></label>
        <input type="password" name="confirm_password" required>

        <button type="submit" name="reset">Reset Password</button>
    </form>
</div>

<?php include 'includes/footer.php'; ?>
