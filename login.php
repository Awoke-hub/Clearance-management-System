<?php
session_start();
include 'includes/db.php'; 

if (isset($_POST['login'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Fetch user by username
    $stmt = $conn->prepare("SELECT * FROM student WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Verify hashed password
        if (password_verify($password, $user['password'])) {
            $_SESSION['username'] = $user['username'];
            $_SESSION['student_id'] = $user['id'];

            // ✅ Store full name (adjust column names if needed)
            $_SESSION['full_name'] = $user['name'] . " " . $user['last_name'];

            header("Location: index.php");
            exit();
        } else {
            $error = "Invalid username or password!";
        }
    } else {
        $error = "Invalid username or password!";
    }
}
?>

<?php include 'includes/menu.php'; ?>

<div class="login-container">
    <h2>Student Login</h2>

    <?php if (!empty($error)) { echo "<p style='color:red;'>$error</p>"; } ?>

    <form method="POST" action="">
        <input type="text" name="username" placeholder="Enter Username" required>
        <input type="password" name="password" placeholder="Enter Password" required>
        <button type="submit" name="login">Login</button>
        <p class="forgot"><a href="forgot-password.php">Forgot Password?</a></p>
    </form>
</div>

<?php include 'includes/footer.php'; ?>
