<?php 
session_start();
include 'includes/db.php';

// Redirect if not logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$message = "";
$selected_option = "";

// Step 1: Select clearance type
if (isset($_POST['select_option'])) {
    $selected_option = $_POST['clearance_type'];
}

// Step 2: Submit request to the correct table
if (isset($_POST['submit_request'])) {
    $name = trim($_POST['name']);
    $last_name = trim($_POST['last_name']);
    $department = trim($_POST['department']);
    $reason = trim($_POST['reason']);
    $student_id = $_SESSION['student_id']; 
    $clearance_type = trim($_POST['clearance_type']);

    // Map clearance type to its table
    $tables = [
        'Library' => 'library_clearance',
        'Cafeteria' => 'cafeteria_clearance',
        'Dormitory' => 'dormitory_clearance',
        'Department' => 'department_clearance',
        'Academic Staff' => 'academicstaff_clearance'
    ];

    $table = $tables[$clearance_type];

    $stmt = $conn->prepare("INSERT INTO $table (student_id, name, last_name, department, reason) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("issss", $student_id, $name, $last_name, $department, $reason);

    if ($stmt->execute()) {
        $message = "<p style='color:green;'>Clearance request for <strong>$clearance_type</strong> submitted successfully!</p>";
        $selected_option = "";
    } else {
        $message = "<p style='color:red;'>Error submitting request. Please try again.</p>";
    }
}
?>

<?php include 'includes/menu.php'; ?>

<div style="max-width:500px; margin:40px auto; background:#f8f8f8; padding:25px; border-radius:8px; color:#333;">
    <h2 style="text-align:center; color:#008B8B;">Clearance Request</h2>
    <?php echo $message; ?>

    <!-- Select Clearance Type -->
    <?php if (empty($selected_option)): ?>
        <form method="POST">
            <label>Select Clearance Type:</label>
            <select name="clearance_type" required style="width:100%; padding:10px; margin:8px 0;">
                <option value="">-- Select Option --</option>
                <option value="Library">Library</option>
                <option value="Cafeteria">Cafeteria</option>
                <option value="Dormitory">Dormitory</option>
                <option value="Department">Department</option>
                <option value="Academic Staff">Academic Staff</option>
            </select>
            <button type="submit" name="select_option" style="background:#008B8B; color:white; padding:10px 20px; border:none; border-radius:5px;">Next</button>
        </form>
    <?php endif; ?>

    <!-- Request Form -->
    <?php if (!empty($selected_option)): ?>
        <h3 style="text-align:center; color:#004d4d;">Request for <?php echo htmlspecialchars($selected_option); ?></h3>
        <form method="POST">
            <input type="hidden" name="clearance_type" value="<?php echo htmlspecialchars($selected_option); ?>">

            <label>First Name:</label>
            <input type="text" name="name" required style="width:100%; padding:10px; margin:8px 0;">

            <label>Last Name:</label>
            <input type="text" name="last_name" required style="width:100%; padding:10px; margin:8px 0;">

            <label>Department:</label>
            <input type="text" name="department" required style="width:100%; padding:10px; margin:8px 0;">

            <label>Reason:</label>
            <textarea name="reason" rows="4" required style="width:100%; padding:10px; margin:8px 0;"></textarea>

            <button type="submit" name="submit_request" style="background:#008B8B; color:white; padding:10px 20px; border:none; border-radius:5px;">Submit Request</button>
        </form>
    <?php endif; ?>
</div>

<?php include 'includes/footer.php'; ?>
