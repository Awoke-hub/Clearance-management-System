<?php 
session_start();
include 'includes/db.php';

// Redirect if not logged in
if (!isset($_SESSION['student_id'])) {
    header("Location: login.php");
    exit();
}

// ✅ Fetch logged-in student details
$student_id = $_SESSION['student_id'];
$stmt = $conn->prepare("SELECT name, last_name, department FROM student WHERE id = ?");
$stmt->bind_param("i", $student_id);
$stmt->execute();
$result = $stmt->get_result();
$student = $result->fetch_assoc();

$message = "";
$selected_option = "";

// Step 1: Select clearance type
if (isset($_POST['select_option'])) {
    $selected_option = $_POST['clearance_type'];
}

// Step 2: Submit request to the correct table (with duplicate check)
if (isset($_POST['submit_request'])) {
    $reason = trim($_POST['reason']);
    $clearance_type = trim($_POST['clearance_type']);

    $tables = [
        'Library' => 'library_clearance',
        'Cafeteria' => 'cafeteria_clearance',
        'Dormitory' => 'dormitory_clearance',
        'Department' => 'department_clearance',
        'Academic Staff' => 'academicstaff_clearance'
    ];

    $table = $tables[$clearance_type];

    // ✅ Check if student already submitted a request for this office
    $check = $conn->prepare("SELECT id FROM $table WHERE student_id = ?");
    $check->bind_param("i", $student_id);
    $check->execute();
    $check_result = $check->get_result();

    if ($check_result->num_rows > 0) {
        $message = "<p style='color:red; font-weight:bold;'>❌ You have already submitted a clearance request for <strong>$clearance_type</strong>.</p>";
    } else {
        // ✅ Insert new request
        $stmt = $conn->prepare("INSERT INTO $table (student_id, name, last_name, department, reason) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("issss", $student_id, $student['name'], $student['last_name'], $student['department'], $reason);

        if ($stmt->execute()) {
            $message = "<p style='color:green; font-weight:bold;'>✅ Clearance request for <strong>$clearance_type</strong> submitted successfully!</p>";
            $selected_option = "";
        } else {
            $message = "<p style='color:red;'>❌ Error submitting request. Please try again.</p>";
        }
    }
}
?>

<?php include 'includes/menu.php'; ?>

<style>
    .clearance-container {
        max-width: 500px;
        margin: 40px auto;
        background: #ffffff;
        padding: 25px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        color: #333;
    }

    .clearance-container h2 {
        text-align: center;
        color: #008B8B;
        margin-bottom: 15px;
    }

    .clearance-container input, 
    .clearance-container select, 
    .clearance-container textarea {
        width: 100%;
        padding: 10px;
        margin: 8px 0;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 14px;
    }

    .clearance-container input[readonly] {
        background: #f0f0f0;
        font-weight: bold;
    }

    .clearance-container button {
        background: #008B8B;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-weight: bold;
        width: 100%;
        transition: 0.3s;
    }

    .clearance-container button:hover {
        background: #006666;
    }
</style>

<div class="clearance-container">
    <h2>Clearance Request</h2>
    <?php echo $message; ?>

    <!-- Step 1: Select Clearance Type -->
    <?php if (empty($selected_option)): ?>
        <form method="POST">
            <label><strong>Select Clearance Type:</strong></label>
            <select name="clearance_type" required>
                <option value="">-- Select Option --</option>
                <option value="Library">Library</option>
                <option value="Cafeteria">Cafeteria</option>
                <option value="Dormitory">Dormitory</option>
                <option value="Department">Department</option>
                <option value="Academic Staff">Academic Staff</option>
            </select>
            <button type="submit" name="select_option">Next</button>
        </form>
    <?php endif; ?>

    <!-- Step 2: Request Form -->
    <?php if (!empty($selected_option)): ?>
        <h3 style="text-align:center; color:#004d4d;">Request for <?php echo htmlspecialchars($selected_option); ?></h3>
        <form method="POST">
            <input type="hidden" name="clearance_type" value="<?php echo htmlspecialchars($selected_option); ?>">

            <label>First Name:</label>
            <input type="text" value="<?php echo htmlspecialchars($student['name']); ?>" readonly>

            <label>Last Name:</label>
            <input type="text" value="<?php echo htmlspecialchars($student['last_name']); ?>" readonly>

            <label>Department:</label>
            <input type="text" value="<?php echo htmlspecialchars($student['department']); ?>" readonly>

            <label>Reason:</label>
            <textarea name="reason" rows="4" required placeholder="Enter your reason for clearance..."></textarea>

            <button type="submit" name="submit_request">Submit Request</button>
        </form>
    <?php endif; ?>
</div>

<?php include 'includes/footer.php'; ?>
