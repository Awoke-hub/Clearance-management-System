<?php
session_start();
include '../includes/db.php';

if (isset($_GET['action']) && isset($_GET['id'])) {
    $status = ($_GET['action'] == 'approve') ? 'approved' : 'rejected';
    $id = intval($_GET['id']);

    $stmt = $conn->prepare("UPDATE dormitory_clearance SET status=? WHERE id=?");
    $stmt->bind_param("si", $status, $id);
    $stmt->execute();
    header("Location: manage-dormitory.php");
    exit();
}

$result = $conn->query("SELECT * FROM dormitory_clearance ORDER BY id DESC");
?>

<?php include 'includes/menu.php'; ?>

<div style="max-width:900px; margin:40px auto; background:#f8f8f8; padding:20px; border-radius:8px; color:#333;">
    <h2 style="text-align:center; color:#008B8B;">Manage Dormitory Clearance</h2>
    <table border="1" width="100%" cellpadding="8" style="border-collapse:collapse; text-align:center;">
        <tr style="background:#008B8B; color:white;">
            <th>ID</th>
            <th>Name</th>
            <th>Last Name</th>
            <th>Department</th>
            <th>Reason</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo htmlspecialchars($row['name']); ?></td>
            <td><?php echo htmlspecialchars($row['last_name']); ?></td>
            <td><?php echo htmlspecialchars($row['department']); ?></td>
            <td><?php echo htmlspecialchars($row['reason']); ?></td>
            <td style="font-weight:bold; color:<?php echo ($row['status'] == 'pending')?'orange':(($row['status'] == 'approved')?'green':'red'); ?>">
                <?php echo ucfirst($row['status']); ?>
            </td>
            <td>
                <?php if ($row['status'] == 'pending'): ?>
                    <a href="?action=approve&id=<?php echo $row['id']; ?>" style="color:green; font-weight:bold;">Approve</a> |
                    <a href="?action=reject&id=<?php echo $row['id']; ?>" style="color:red; font-weight:bold;">Reject</a>
                <?php else: ?> -
                <?php endif; ?>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</div>

<?php include 'includes/footer.php'; ?>
