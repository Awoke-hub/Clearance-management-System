<?php include 'includes/menu.php'; ?>

<div class="login-container">
    <h2>Forgot Password</h2>
    <form method="POST" action="">
        <input type="email" name="email" placeholder="Enter your registered email" required>
        <button type="submit" name="submit">Submit</button>
        <p class="back-login"><a href="login.php">Back to Login</a></p>
    </form>
    <?php
    if (isset($_POST['submit'])) {
        $email = $_POST['email'];
        // For now, just a success message (you can later connect with DB)
        echo "<p style='color:lightgreen; margin-top:10px;'>If this email exists, you will receive reset instructions.</p>";
    }
    ?>
</div>

