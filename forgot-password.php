<?php
session_start();
include 'includes/db.php';

$message = "";

if (isset($_POST['submit'])) {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);

    $stmt = $conn->prepare("SELECT id FROM student WHERE name = ? AND email = ?");
    $stmt->bind_param("ss", $name, $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $_SESSION['reset_student_id'] = $user['id'];
        header("Location: reset-password.php");
        exit();
    } else {
        $message = "<p class='error-msg'>❌ No account found with that Name and Email.</p>";
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
    .reset-container .back-link {
        text-align: center;
        margin-top: 10px;
    }
    .reset-container .back-link a {
        color: #008B8B;
        text-decoration: none;
    }
    .reset-container .back-link a:hover {
        text-decoration: underline;
    }
</style>

<div class="reset-container">
    <h2>Forgot Password</h2>
    <?php echo $message; ?>
    <form method="POST">
        <label><strong>Name:</strong></label>
        <input type="text" name="name" placeholder="Enter you Name" required>

        <label><strong>Email:</strong></label>
        <input type="email" name="email" placeholder="Enter you Email" required>

        <button type="submit" name="submit">Verify</button>
        <div class="back-link">
            <a href="login.php">⬅ Back to Login</a>
        </div>
    </form>
</div>

<?php include 'includes/footer.php'; ?>
