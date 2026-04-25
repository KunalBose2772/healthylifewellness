<?php
$page_title = "Create New Article";
include 'includes/admin-header.php';
require_once '../includes/config.php';

// Fetch categories for dropdown
$categories = $pdo->query("SELECT * FROM categories")->fetchAll();

$message = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $slug = get_slug($title);
    $category_id = $_POST['category_id'];
    $content = $_POST['content'];
    $status = $_POST['status'];
    $language = $_POST['language'];
    
    // Handle Image Upload
    $image_path = '';
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $target_dir = "../assets/img/";
        $file_extension = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
        $image_name = $slug . "." . $file_extension;
        $target_file = $target_dir . $image_name;
        
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            $image_path = "assets/img/" . $image_name;
        }
    }

    try {
        $stmt = $pdo->prepare("INSERT INTO posts (category_id, title, slug, content, image, language, status) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([$category_id, $title, $slug, $content, $image_path, $language, $status]);
        $message = '<div class="alert alert-success rounded-4 border-0 shadow-sm"><i class="fas fa-check-circle me-2"></i> Article published successfully! <a href="manage-posts.php" class="alert-link">View All</a></div>';
    } catch (PDOException $e) {
        $message = '<div class="alert alert-danger rounded-4 border-0 shadow-sm">Error: ' . $e->getMessage() . '</div>';
    }
}
?>

<div class="row justify-content-center">
    <div class="col-lg-10">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="fw-bold m-0 text-white d-none">Add New Post</h4>
            <a href="manage-posts.php" class="btn btn-light rounded-pill border px-4 small fw-bold">
                <i class="fas fa-arrow-left me-2"></i> Back to List
            </a>
        </div>

        <?php echo $message; ?>

        <div class="admin-card">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="row g-4">
                    <div class="col-md-8">
                        <div class="mb-4">
                            <label class="form-label">Article Title</label>
                            <input type="text" name="title" class="form-control" placeholder="Enter a catchy title..." required>
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Main Content</label>
                            <textarea name="content" class="form-control" rows="15" placeholder="Write your article content here..." required></textarea>
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="mb-4">
                            <label class="form-label">Health Cluster (Category)</label>
                            <select name="category_id" class="form-select" required>
                                <option value="">Select Cluster</option>
                                <?php foreach($categories as $cat): ?>
                                    <option value="<?php echo $cat['id']; ?>"><?php echo $cat['name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        
                        <div class="mb-4">
                            <label class="form-label">Language</label>
                            <select name="language" class="form-select">
                                <option value="en">English</option>
                                <option value="hi">Hindi</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Featured Image</label>
                            <div class="border rounded-4 p-4 text-center bg-light">
                                <i class="fas fa-cloud-upload-alt fa-3x text-muted mb-3"></i>
                                <input type="file" name="image" class="form-control">
                                <small class="text-muted d-block mt-2">Recommended size: 1200x600px</small>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Publish Status</label>
                            <select name="status" class="form-select">
                                <option value="published">Publish Now</option>
                                <option value="draft">Save as Draft</option>
                            </select>
                        </div>

                        <hr class="my-4">
                        
                        <button type="submit" class="btn btn-primary w-100 rounded-pill py-3 fw-bold">
                            <i class="fas fa-paper-plane me-2"></i> Save Article
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include 'includes/admin-footer.php'; ?>
