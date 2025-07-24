<?php include 'includes/menu.php'; ?>

<div class="contact-container">
    <h2>Contact Us</h2>
    <p>If you have any questions regarding the clearance process, feel free to reach out to us.</p>

    <div class="contact-box">
        <form method="POST" action="">
            <input type="text" name="name" placeholder="Your Name" required>
            <input type="email" name="email" placeholder="Your Email" required>
            <textarea name="message" placeholder="Your Message" required></textarea>
            <button type="submit" name="send">Send Message</button>
        </form>
    </div>

    <div class="contact-info">
        <h3>Our Contact Information</h3>
        <p><strong>Address:</strong> University IT Department, Main Campus</p>
        <p><strong>Email:</strong> clearance@university.edu</p>
        <p><strong>Phone:</strong> +251-900-000-000</p>
    </div>
</div>

<?php include 'includes/footer.php'; ?>

<?php
// Simple message handling (you can connect to DB or send email later)
if (isset($_POST['send'])) {
    echo "<script>alert('Thank you for contacting us! We will get back to you soon.');</script>";
}
?>
