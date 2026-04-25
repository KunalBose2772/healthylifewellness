<?php
$page_title = "User Inquiries";
include 'includes/admin-header.php';
require_once '../includes/config.php';

// Fetch leads
$stmt = $pdo->query("SELECT l.*, s.name as service_name FROM leads l LEFT JOIN services s ON l.service_id = s.id ORDER BY l.created_at DESC");
$leads = $stmt->fetchAll();
?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="fw-bold m-0 text-white d-none">Manage Inquiries</h4>
    <div class="text-muted small"><?php echo count($leads); ?> Total Inquiries</div>
</div>

<div class="admin-card">
    <div class="table-responsive">
        <table class="table align-middle">
            <thead class="text-muted small">
                <tr>
                    <th>User</th>
                    <th>Target Service</th>
                    <th>Message Snippet</th>
                    <th>Received</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($leads as $lead): ?>
                <tr>
                    <td>
                        <div class="fw-bold small"><?php echo $lead['name']; ?></div>
                        <div class="text-muted" style="font-size: 0.75rem;"><i class="fas fa-phone me-1"></i> <?php echo $lead['phone']; ?></div>
                        <?php if($lead['email']): ?><div class="text-muted" style="font-size: 0.75rem;"><i class="fas fa-envelope me-1"></i> <?php echo $lead['email']; ?></div><?php endif; ?>
                    </td>
                    <td><span class="badge bg-light text-dark fw-normal"><?php echo $lead['service_name']; ?></span></td>
                    <td class="small text-muted" style="max-width: 200px;"><?php echo substr($lead['message'], 0, 80) . '...'; ?></td>
                    <td class="small text-muted"><?php echo date('d M, Y H:i', strtotime($lead['created_at'])); ?></td>
                    <td class="text-end">
                        <a href="lead-details.php?id=<?php echo $lead['id']; ?>" class="btn btn-sm btn-light border rounded-circle me-1" title="View Details"><i class="fas fa-eye small"></i></a>
                        <a href="delete-lead.php?id=<?php echo $lead['id']; ?>" class="btn btn-sm btn-light border rounded-circle text-danger" onclick="return confirm('Delete this inquiry?')" title="Delete"><i class="fas fa-trash small"></i></a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include 'includes/admin-footer.php'; ?>
