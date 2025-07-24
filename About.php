<?php 
session_start();
include 'includes/menu.php'; 
?>

<style>
    .about-container {
        max-width: 900px;
        margin: 40px auto;
        background: #ffffff;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.2);
        font-family: Arial, sans-serif;
        color: #333;
        line-height: 1.6;
    }
    .about-container h2 {
        text-align: center;
        color: #008B8B;
        margin-bottom: 20px;
        font-size: 28px;
    }
    .about-container p {
        font-size: 16px;
        margin-bottom: 15px;
    }
    .about-highlight {
        background: #f0fafa;
        padding: 15px;
        border-left: 5px solid #008B8B;
        border-radius: 5px;
        margin-top: 20px;
    }
    .about-container ul {
        margin: 15px 0 0 20px;
    }
    .about-container ul li {
        margin-bottom: 8px;
    }
</style>

<div class="about-container">
    <h2>About the University Clearance Management System</h2>
    <p>
        The <strong>University Clearance Management System</strong> is designed to streamline and digitize the student clearance process.
        Instead of physically visiting multiple offices, students can now request clearance online and track their approval status in real time.
    </p>
    <p>
        This system ensures **faster processing**, **greater transparency**, and **accurate record-keeping**, benefiting both students and staff.
    </p>

    <div class="about-highlight">
        <h3 style="color:#006666;">Key Features:</h3>
        <ul>
            <li>✔ Online clearance requests (Library, Cafeteria, Dormitory, etc.)</li>
            <li>✔ Real-time status tracking of each clearance request</li>
            <li>✔ Secure student authentication & password reset</li>
            <li>✔ Ability for staff to approve or reject requests with reasons</li>
        </ul>
    </div>

    <p style="margin-top:20px;">
        <strong>Our Mission:</strong> To simplify the clearance process, save time, and make the experience more convenient for every student.
    </p>
</div>

<?php include 'includes/footer.php'; ?>
