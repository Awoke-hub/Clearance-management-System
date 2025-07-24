<?php
session_start();
include '../includes/db.php'; // include your DB connection

// Handle login
if (isset($_POST['login'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Select admin by username
    $stmt = $conn->prepare("SELECT * FROM admin WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $admin = $result->fetch_assoc();

        // Verify password
        if (password_verify($password, $admin['password'])) {
            // Store session variables
            $_SESSION['admin_id'] = $admin['id'];
            $_SESSION['admin_username'] = $admin['username'];
            $_SESSION['admin_role'] = $admin['role'];

            // Redirect based on role
            switch (strtolower($admin['role'])) {
                case 'library':
                    header("Location: library-dashboard.php");
                    break;
                case 'department':
                    header("Location: department-dashboard.php");
                    break;
                case 'dormitory':
                    header("Location: dormitory-dashboard.php");
                    break;
                case 'manager':
                    header("Location: cafteria.php");
                    break;
                default:
                    echo "<p style='color:red; text-align:center;'>Invalid role assigned!</p>";
            }
            exit();
        } else {
            $error = "Invalid username or password!";
        }
    } else {
        $error = "Invalid username or password!";
    }
}
?>

<div class="login-container">
    <h2>Admin Login</h2>

    <?php if (!empty($error)) { echo "<p style='color:red;'>$error</p>"; } ?>

    <form method="POST" action="">
        <input type="text" name="username" placeholder="Enter Username" required>
        <input type="password" name="password" placeholder="Enter Password" required>
        <button type="submit" name="login">Login</button>
    </form>
</div>



