<?php 
require_once 'includes/config.php';

$slug = isset($_GET['slug']) ? $_GET['slug'] : 'weight-loss';

// Fetch category from DB
$cat = null;
if ($pdo) {
    $stmt = $pdo->prepare("SELECT * FROM categories WHERE slug = ?");
    $stmt->execute([$slug]);
    $cat = $stmt->fetch();
}

if (!$cat) {
    header("Location: index.php");
    exit();
}

$page_title = $cat['name'] . ' Cluster';
include 'includes/header.php'; 

$cat_img = !empty($cat['image']) ? $cat['image'] : 'assets/img/' . $cat['slug'] . '.png';
?>

<div class="category-header position-relative overflow-hidden py-5 mb-5" style="background: url('<?php echo $cat_img; ?>') no-repeat center center; background-size: cover;">
    <div class="position-absolute top-0 start-0 w-100 h-100 bg-dark opacity-50"></div>
    <div class="container position-relative z-index-1 py-5 text-white">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.php" class="text-white">Home</a></li>
                <li class="breadcrumb-item active text-white" aria-current="page"><?php echo $cat['name']; ?></li>
            </ol>
        </nav>
        <h1 class="display-3 fw-bold mb-3 text-white"><?php echo $cat['name']; ?></h1>
        <p class="lead opacity-75 mb-0 text-white" style="max-width: 600px;"><?php echo $cat['description']; ?></p>
    </div>
</div>

<div class="container mb-5">
    <?php if(!empty($cat['content'])): ?>
    <div class="row mb-5">
        <div class="col-lg-10 mx-auto">
            <div class="admin-card p-5 border-0 shadow-sm" style="background: #fff; border-radius: 30px;">
                <div class="pillar-content mb-5">
                    <?php echo $cat['content']; ?>
                </div>
                
                <?php 
                $faq_data = json_decode($cat['faq'], true);
                if(!empty($faq_data)): 
                ?>
                <div class="faq-section mt-5">
                    <h3 class="fw-bold mb-4">Frequently Asked Questions</h3>
                    <div class="accordion accordion-flush" id="categoryFaq">
                        <?php foreach($faq_data as $index => $item): ?>
                        <div class="accordion-item border-0 mb-3 shadow-sm rounded-4 overflow-hidden">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed fw-bold py-3 px-4" type="button" data-bs-toggle="collapse" data-bs-target="#faq-<?php echo $index; ?>">
                                    <?php echo $item['q']; ?>
                                </button>
                            </h2>
                            <div id="faq-<?php echo $index; ?>" class="accordion-collapse collapse" data-bs-parent="#categoryFaq">
                                <div class="accordion-body p-4 text-muted">
                                    <?php echo $item['a']; ?>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <div class="row">
        <!-- Main Content -->
        <div class="col-lg-8">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="h3">Latest in <?php echo $cat['name']; ?></h2>
                <div class="dropdown">
                    <button class="btn btn-light border rounded-pill px-4 fw-bold dropdown-toggle" type="button" data-bs-toggle="dropdown">
                        <i class="fas fa-filter me-2 small opacity-50"></i> Sort By: Latest
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Latest</a></li>
                        <li><a class="dropdown-item" href="#">Popular</a></li>
                        <li><a class="dropdown-item" href="#">A-Z</a></li>
                    </ul>
                </div>
            </div>

            <div class="row g-4">
                <?php
                $stmt = $pdo->prepare("SELECT * FROM posts WHERE category_id = ? AND status = 'published' ORDER BY created_at DESC");
                $stmt->execute([$cat['id']]);
                $posts = $stmt->fetchAll();

                if (count($posts) > 0):
                    foreach($posts as $post):
                        $p_img = !empty($post['image']) ? $post['image'] : $cat_img;
                ?>
                <div class="col-12" data-aos="fade-up">
                    <div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-4 post-horizontal hover-lift">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <div class="h-100 min-vh-25">
                                    <img src="<?php echo $p_img; ?>" class="img-fluid h-100 w-100" style="object-fit: cover;" alt="<?php echo $post['title']; ?>">
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body p-4">
                                    <div class="mb-2">
                                        <span class="badge bg-primary-light text-primary rounded-pill">Expert Article</span>
                                        <small class="text-muted ms-2"><i class="far fa-clock me-1"></i> <?php echo date('M j, Y', strtotime($post['created_at'])); ?></small>
                                    </div>
                                    <h3 class="h4 mb-3 fw-bold"><a href="post.php?slug=<?php echo $post['slug']; ?>" class="text-dark"><?php echo $post['title']; ?></a></h3>
                                    <p class="text-muted mb-4"><?php echo substr(strip_tags($post['content']), 0, 150) . '...'; ?></p>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="d-flex align-items-center">
                                            <img src="https://i.pravatar.cc/150?u=4" class="rounded-circle me-2" width="35" height="35" alt="Author">
                                            <span class="small fw-bold">Expert Contributor</span>
                                        </div>
                                        <a href="post.php?slug=<?php echo $post['slug']; ?>" class="btn btn-outline-primary btn-sm rounded-pill px-3 fw-bold">Read More <i class="fas fa-arrow-right ms-1 small"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; else: ?>
                <div class="col-12 text-center py-5">
                    <p class="text-muted">No articles found in this category yet. Check back soon!</p>
                </div>
                <?php endif; ?>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="col-lg-4">
            <div class="sticky-top" style="top: 100px;">
                <!-- Ads Placeholder -->
                <div class="card border-0 bg-light p-4 mb-4 text-center rounded-4">
                    <small class="text-muted d-block mb-3">ADVERTISEMENT</small>
                    <div class="bg-secondary opacity-10 rounded" style="height: 250px; display: flex; align-items: center; justify-content: center;">
                        <span class="text-muted">Ad Space (300x250)</span>
                    </div>
                </div>

                <div class="card border-0 shadow-sm rounded-4 p-4 mb-4">
                    <h5 class="mb-4">Related Clusters</h5>
                    <div class="list-group list-group-flush">
                        <?php 
                        $stmt = $pdo->query("SELECT * FROM categories");
                        $all_cats = $stmt->fetchAll();
                        foreach($all_cats as $c): if($c['slug'] == $slug) continue; ?>
                        <a href="category.php?slug=<?php echo $c['slug']; ?>" class="list-group-item list-group-item-action border-0 px-0 d-flex justify-content-between align-items-center">
                            <?php echo $c['name']; ?>
                            <i class="fas fa-chevron-right small text-muted"></i>
                        </a>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- Newsletter -->
                <div class="card card-newsletter p-4 rounded-4">
                    <h5 class="mb-3">Get Weekly Tips</h5>
                    <p class="small text-muted mb-4">Join 50,000+ subscribers for exclusive wellness guides.</p>
                    <form>
                        <input type="email" class="form-control rounded-pill mb-3 shadow-none" placeholder="Email Address">
                        <button class="btn btn-primary w-100 rounded-pill">Subscribe</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
