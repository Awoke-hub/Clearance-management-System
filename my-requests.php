<?php
include 'includes/menu.php'; 
include 'includes/db.php';

if (!isset($_SESSION['student_id'])) {
    header("Location: login.php");
    exit();
}

$student_id = $_SESSION['student_id'];
$tables = [
    'Library' => 'library_clearance',
    'Cafeteria' => 'cafeteria_clearance',
    'Dormitory' => 'dormitory_clearance',
    'Department' => 'department_clearance',
    'Academic Staff' => 'academicstaff_clearance'
];
?>


<div style="max-width:900px; margin:40px auto; background:#f8f8f8; padding:20px; border-radius:8px; color:#333;">
    <h2 style="text-align:center; color:#008B8B;">My Clearance Requests</h2>
    <table border="1" width="100%" cellpadding="8" style="border-collapse:collapse; text-align:center;">
        <tr style="background:#008B8B; color:white;">
            <th>Clearance Type</th>
            <th>Department</th>
            <th>Reason</th>
            <th>Status</th>
        </tr>
        <?php 
        foreach ($tables as $type => $table) {
            $stmt = $conn->prepare("SELECT * FROM $table WHERE student_id=? ORDER BY id DESC");
            $stmt->bind_param("i", $student_id);
            $stmt->execute();
            $res = $stmt->get_result();
            
            while ($row = $res->fetch_assoc()):
        ?>
        <tr style="background:white; color:black;">
            <td><?php echo htmlspecialchars($type); ?></td>
            <td><?php echo htmlspecialchars($row['department']); ?></td>
            <td><?php echo htmlspecialchars($row['reason']); ?></td>
            <td style="font-weight:bold; 
                       color:<?php echo ($row['status'] == 'pending') ? 'orange' : 
                                     (($row['status'] == 'approved') ? 'green' : 'red'); ?>">
                <?php echo ucfirst($row['status']); ?>
            </td>
        </tr>
        <?php endwhile; } ?>
    </table>
</div>

<?php include 'includes/footer.php'; ?>
