<?php 
require_once 'includes/config.php';

$slug = isset($_GET['slug']) ? $_GET['slug'] : '';

// Fetch post from DB
$post = null;
if ($pdo) {
    $stmt = $pdo->prepare("SELECT p.*, c.name as category_name, c.slug as category_slug FROM posts p JOIN categories c ON p.category_id = c.id WHERE p.slug = ? AND p.status = 'published'");
    $stmt->execute([$slug]);
    $post = $stmt->fetch();
}

if (!$post) {
    header("Location: index.php");
    exit();
}

$page_title = $post['title'];
$meta_description = $post['meta_description'];
include 'includes/header.php'; 
?>

<article class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <!-- Post Header -->
                <header class="text-center mb-5" data-aos="fade-up">
                    <div class="mb-3">
                        <a href="category.php?slug=<?php echo $post['category_slug']; ?>" class="badge bg-primary-light text-primary rounded-pill px-3"><?php echo $post['category_name']; ?></a>
                        <span class="text-muted ms-3"><i class="far fa-calendar-alt"></i> <?php echo date('M j, Y', strtotime($post['created_at'])); ?></span>
                    </div>
                    <h1 class="display-4 fw-bold mb-4"><?php echo $post['title']; ?></h1>
                    
                    <div class="d-flex align-items-center justify-content-center mt-5">
                        <img src="https://i.pravatar.cc/150?u=4" class="rounded-circle me-3" width="60" alt="Author">
                        <div class="text-start">
                            <h6 class="mb-0 fw-bold">Expert Contributor</h6>
                            <small class="text-muted">Wellness Specialist</small>
                        </div>
                        <div class="ms-5 d-none d-md-block">
                            <button class="btn btn-outline-dark btn-sm rounded-pill px-3"><i class="fas fa-share-alt me-1"></i> Share</button>
                        </div>
                    </div>
                </header>

                <!-- Featured Image -->
                <div class="mb-5 rounded-5 overflow-hidden shadow-lg" data-aos="zoom-in">
                    <img src="<?php echo !empty($post['image']) ? $post['image'] : 'assets/img/hero.png'; ?>" class="img-fluid w-100" alt="<?php echo $post['title']; ?>">
                </div>

                <div class="row">
                    <!-- Post Content -->
                    <div class="col-lg-8 post-content-main">
                        <?php echo $post['content']; ?>
                    </div>

                    <!-- Post Sidebar -->
                    <div class="col-lg-4">
                        <div class="sticky-top" style="top: 100px;">
                            <!-- Author Bio -->
                            <div class="card border-0 shadow-sm rounded-4 p-4 mb-4 text-center">
                                <img src="https://i.pravatar.cc/150?u=4" class="rounded-circle mx-auto mb-3" width="100" alt="Author">
                                <h5 class="fw-bold">Expert Contributor</h5>
                                <p class="small text-muted mb-4">Our experts have years of experience in wellness and health coaching.</p>
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="#" class="btn btn-light btn-sm rounded-circle"><i class="fab fa-twitter"></i></a>
                                    <a href="#" class="btn btn-light btn-sm rounded-circle"><i class="fab fa-linkedin-in"></i></a>
                                </div>
                            </div>

                            <!-- Lead Gen Sidebar -->
                            <div class="card card-cta-premium p-4 rounded-4 mb-4">
                                <h5 class="mb-3 text-white">Need a Personalized Plan?</h5>
                                <p class="small mb-4 text-white opacity-75">Talk to a certified <?php echo $post['category_slug'] == 'diet-plans' ? 'dietitian' : 'wellness pro'; ?> near you to get a customized chart.</p>
                                <a href="find-services.php?type=<?php echo $post['category_slug'] == 'diet-plans' ? 'dietitian' : 'gym'; ?>" class="btn btn-primary w-100 rounded-pill">Find a Pro</a>
                            </div>

                            <!-- Popular Posts -->
                            <div class="card border-0 shadow-sm rounded-4 p-4">
                                <h5 class="mb-4">You May Also Like</h5>
                                <?php
                                $stmt = $pdo->prepare("SELECT * FROM posts WHERE category_id = ? AND id != ? LIMIT 2");
                                $stmt->execute([$post['category_id'], $post['id']]);
                                $related = $stmt->fetchAll();
                                foreach($related as $rel):
                                ?>
                                <div class="d-flex gap-3 mb-3">
                                    <img src="<?php echo !empty($rel['image']) ? $rel['image'] : 'assets/img/fitness.png'; ?>" class="rounded-3" width="60" height="60" style="object-fit: cover;">
                                    <div>
                                        <h6 class="small mb-1 fw-bold"><a href="post.php?slug=<?php echo $rel['slug']; ?>" class="text-dark text-decoration-none"><?php echo $rel['title']; ?></a></h6>
                                        <small class="text-muted">8 min read</small>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</article>

<?php include 'includes/footer.php'; ?>
