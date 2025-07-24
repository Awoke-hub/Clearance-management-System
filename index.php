<?php include 'includes/menu.php'; ?>

<style>
    body {
        margin: 0;
        font-family: Arial, sans-serif;
        background-color: #008B8B; /* darkcyan */
        color: white;
    }

    .hero-section {
        text-align: center;
        padding: 70px 20px;
        background: linear-gradient(to right, #006666, #009999);
        color: white;
    }

    .hero-section h1 {
        font-size: 36px;
        margin-bottom: 15px;
        letter-spacing: 1px;
    }

    .hero-section p {
        max-width: 700px;
        margin: auto;
        font-size: 18px;
        line-height: 1.8;
        opacity: 0.9;
    }

    .features-section {
        display: flex;
        justify-content: center;
        gap: 20px;
        flex-wrap: wrap;
        padding: 50px 20px;
    }

    .feature-card {
        background: white;
        color: #333;
        padding: 20px;
        border-radius: 10px;
        width: 250px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        text-align: center;
        transition: 0.3s;
    }

    .feature-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 12px rgba(0,0,0,0.3);
    }

    .feature-card h3 {
        color: darkcyan;
        font-size: 20px;
        margin-bottom: 10px;
    }

    .feature-card p {
        font-size: 14px;
        line-height: 1.6;
    }

    .cta-section {
        text-align: center;
        padding: 40px;
        background: #004d4d;
    }

    .cta-section a {
        display: inline-block;
        background: #00b3b3;
        color: white;
        text-decoration: none;
        padding: 12px 25px;
        border-radius: 5px;
        font-size: 16px;
        font-weight: bold;
        transition: 0.3s;
    }

    .cta-section a:hover {
        background: #009999;
    }
</style>

<div class="hero-section">
    <h1>Welcome to Debre Berhan  University Online Clearance  System</h1>
    <p>
        This system simplifies the clearance process for students and staff.  
        Submit clearance requests, track application status, and complete all steps online  
        for a faster and more efficient experience.
    </p>
</div>

<div class="features-section">
    <div class="feature-card">
        <h3>📌 Easy Requests</h3>
        <p>Students can easily request clearance from different university departments online.</p>
    </div>
    <div class="feature-card">
        <h3>📊 Track Status</h3>
        <p>Monitor your clearance progress in real-time and receive instant updates.</p>
    </div>
    <div class="feature-card">
        <h3>✅ Fast Processing</h3>
        <p>Reduce paperwork and delays by processing everything digitally.</p>
    </div>
</div>

<div class="cta-section">
    <?php if (!isset($_SESSION['username'])): ?>
        <a href="login.php">🔑 Login to Get Started</a>
    <?php else: ?>
        <a href="clearance.php">✅ Go to Clearance Portal</a>
    <?php endif; ?>
</div>

<?php include 'includes/footer.php'; ?>
