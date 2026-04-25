<?php
$page_title = "Overview Dashboard";
include 'includes/admin-header.php';
require_once '../includes/config.php';

// Stats
$post_count = $pdo->query("SELECT COUNT(*) FROM posts")->fetchColumn();
$cat_count = $pdo->query("SELECT COUNT(*) FROM categories")->fetchColumn();
$service_count = $pdo->query("SELECT COUNT(*) FROM services")->fetchColumn();
$lead_count = $pdo->query("SELECT COUNT(*) FROM leads")->fetchColumn();

// Recent Leads
$recent_leads = $pdo->query("SELECT l.*, s.name as service_name FROM leads l LEFT JOIN services s ON l.service_id = s.id ORDER BY l.created_at DESC LIMIT 5")->fetchAll();
?>

<div class="row g-3 g-md-4 mb-4">
    <div class="col-6 col-md-3">
        <div class="admin-card text-center py-4">
            <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 50px; height: 50px;">
                <i class="fas fa-file-alt"></i>
            </div>
            <h3 class="fw-bold m-0"><?php echo $post_count; ?></h3>
            <span class="small text-muted">Articles</span>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="admin-card text-center py-4">
            <div class="bg-info text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 50px; height: 50px;">
                <i class="fas fa-list"></i>
            </div>
            <h3 class="fw-bold m-0"><?php echo $cat_count; ?></h3>
            <span class="small text-muted">Clusters</span>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="admin-card text-center py-4">
            <div class="bg-purple text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 50px; height: 50px; background-color: #9b59b6;">
                <i class="fas fa-user-md"></i>
            </div>
            <h3 class="fw-bold m-0"><?php echo $service_count; ?></h3>
            <span class="small text-muted">Partners</span>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="admin-card text-center py-4">
            <div class="bg-warning text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 50px; height: 50px;">
                <i class="fas fa-headset"></i>
            </div>
            <h3 class="fw-bold m-0"><?php echo $lead_count; ?></h3>
            <span class="small text-muted">Leads</span>
        </div>
    </div>
</div>

<div class="row g-4">
    <div class="col-12 col-xl-8">
        <div class="admin-card">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h5 class="fw-bold m-0">Recent User Inquiries</h5>
                <a href="leads.php" class="btn btn-sm btn-light border rounded-pill px-3 small">View All</a>
            </div>
            <div class="table-responsive">
                <table class="table align-middle">
                    <thead class="text-muted small">
                        <tr>
                            <th>User</th>
                            <th>Service</th>
                            <th class="text-end">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($recent_leads as $lead): ?>
                        <tr>
                            <td>
                                <div class="fw-bold small"><?php echo $lead['name']; ?></div>
                                <div class="text-muted" style="font-size: 0.7rem;"><?php echo $lead['phone']; ?></div>
                            </td>
                            <td><span class="badge bg-light text-dark fw-normal small"><?php echo $lead['service_name']; ?></span></td>
                            <td class="text-end">
                                <a href="lead-details.php?id=<?php echo $lead['id']; ?>" class="btn btn-sm btn-light rounded-circle"><i class="fas fa-eye"></i></a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="col-12 col-xl-4">
        <div class="admin-card h-100">
            <h5 class="fw-bold mb-4">Quick Management</h5>
            <div class="d-grid gap-2">
                <a href="add-post.php" class="btn btn-light text-start py-2 border rounded-3 small">
                    <i class="fas fa-plus-circle me-2 text-primary"></i> Create Post
                </a>
                <a href="add-service.php" class="btn btn-light text-start py-2 border rounded-3 small">
                    <i class="fas fa-user-plus me-2 text-success"></i> Add Service
                </a>
                <a href="../index.php" target="_blank" class="btn btn-dark text-start py-2 border rounded-3 small mt-2">
                    <i class="fas fa-external-link-alt me-2"></i> Visit Live Site
                </a>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/admin-footer.php'; ?>
