<?php
$page_title = "Manage Blog Articles";
include 'includes/admin-header.php';
require_once '../includes/config.php';

// Fetch posts
$stmt = $pdo->query("SELECT p.*, c.name as category_name FROM posts p LEFT JOIN categories c ON p.category_id = c.id ORDER BY p.created_at DESC");
$posts = $stmt->fetchAll();
?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="fw-bold m-0 text-white d-none">Manage Posts</h4>
    <a href="add-post.php" class="btn btn-primary rounded-pill px-4 fw-bold">
        <i class="fas fa-plus me-2"></i> Create New Article
    </a>
</div>

<div class="admin-card">
    <div class="table-responsive">
        <table class="table align-middle">
            <thead class="text-muted small">
                <tr>
                    <th>Article</th>
                    <th>Category</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($posts as $post): ?>
                <tr>
                    <td>
                        <div class="d-flex align-items-center">
                            <?php if($post['image']): ?>
                                <img src="../<?php echo $post['image']; ?>" class="rounded-3 me-3" width="50" height="40" style="object-fit: cover;">
                            <?php else: ?>
                                <div class="bg-light rounded-3 me-3 d-flex align-items-center justify-content-center" width="50" height="40"><i class="far fa-image text-muted"></i></div>
                            <?php endif; ?>
                            <div class="fw-bold small"><?php echo $post['title']; ?></div>
                        </div>
                    </td>
                    <td><span class="badge bg-light text-dark fw-normal"><?php echo $post['category_name']; ?></span></td>
                    <td>
                        <?php if($post['status'] == 'published'): ?>
                            <span class="badge bg-success-light text-success rounded-pill px-3">Live</span>
                        <?php else: ?>
                            <span class="badge bg-warning-light text-warning rounded-pill px-3">Draft</span>
                        <?php endif; ?>
                    </td>
                    <td class="small text-muted"><?php echo date('d M, Y', strtotime($post['created_at'])); ?></td>
                    <td class="text-end">
                        <a href="edit-post.php?id=<?php echo $post['id']; ?>" class="btn btn-sm btn-light border rounded-circle me-1"><i class="fas fa-edit small"></i></a>
                        <a href="delete-post.php?id=<?php echo $post['id']; ?>" class="btn btn-sm btn-light border rounded-circle text-danger" onclick="return confirm('Delete this article?')"><i class="fas fa-trash small"></i></a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include 'includes/admin-footer.php'; ?>
