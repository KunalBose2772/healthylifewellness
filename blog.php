<?php
require_once 'includes/config.php';

$page_title = "Health & Wellness Blog | Elite Masterclass Series";
$meta_description = "Explore our full library of science-backed wellness articles, clinical nutrition guides, and expert fitness protocols for the Indian lifestyle.";
include 'includes/header.php';
?>

<section class="py-5 bg-light">
    <div class="container py-4">
        <div class="row align-items-center" data-aos="fade-up">
            <div class="col-lg-8">
                <h6 class="text-primary fw-bold text-uppercase mb-2">Knowledge Hub</h6>
                <h1 class="display-4 fw-bold mb-3">Our Latest <span class="text-gradient">Articles</span></h1>
                <p class="lead text-muted">Deep dives into metabolic health, clinical nutrition, and modern fitness.</p>
            </div>
        </div>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <!-- Categories Filter -->
        <div class="d-flex flex-wrap gap-2 mb-5" data-aos="fade-up">
            <a href="blog" class="btn btn-primary rounded-pill px-4">All Articles</a>
            <?php
            $cats = $pdo->query("SELECT * FROM categories");
            foreach($cats->fetchAll() as $c):
            ?>
            <a href="category?slug=<?php echo $c['slug']; ?>" class="btn btn-outline-dark rounded-pill px-4"><?php echo $c['name']; ?></a>
            <?php endforeach; ?>
        </div>

        <div class="row g-4">
            <?php
            $stmt = $pdo->query("SELECT p.*, c.name as category_name FROM posts p JOIN categories c ON p.category_id = c.id WHERE p.status = 'published' ORDER BY p.created_at DESC");
            $posts = $stmt->fetchAll();
            
            foreach($posts as $p):
                $word_count = str_word_count(strip_tags($p['content']));
                $read_time = ceil($word_count / 200);
            ?>
            <div class="col-lg-4 col-md-6" data-aos="fade-up">
                <div class="card h-100 border-0 shadow-sm rounded-5 overflow-hidden hover-lift bg-white">
                    <div class="position-relative">
                        <img src="<?php echo $p['image']; ?>" class="card-img-top" alt="<?php echo $p['title']; ?>" style="height: 240px; object-fit: cover;">
                        <span class="badge bg-primary rounded-pill position-absolute top-0 start-0 m-3 px-3 py-2"><?php echo $p['category_name']; ?></span>
                    </div>
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center mb-3 small text-muted">
                            <span><i class="far fa-clock me-1"></i> <?php echo $read_time; ?> min read</span>
                            <span class="mx-2">•</span>
                            <span><?php echo date('M j, Y', strtotime($p['created_at'])); ?></span>
                        </div>
                        <h4 class="h5 fw-bold mb-3"><a href="post?slug=<?php echo $p['slug']; ?>" class="text-dark text-decoration-none"><?php echo $p['title']; ?></a></h4>
                        <p class="text-muted small mb-4"><?php echo substr($p['meta_description'], 0, 100); ?>...</p>
                        <div class="d-flex align-items-center mt-auto pt-3 border-top">
                            <img src="https://i.pravatar.cc/150?u=author" class="rounded-circle me-2" width="30" height="30" alt="Author">
                            <span class="small fw-bold">Expert Contributor</span>
                            <a href="post?slug=<?php echo $p['slug']; ?>" class="ms-auto text-primary fw-bold text-decoration-none small">Read More <i class="fas fa-chevron-right ms-1"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Newsletter CTA -->
<section class="py-5 bg-primary text-white text-center">
    <div class="container py-4">
        <h2 class="fw-bold mb-4">Never Miss a Masterclass</h2>
        <p class="lead mb-5 opacity-75">Join 50,000+ subscribers and get the latest scientific wellness guides in your inbox.</p>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="input-group mb-3 custom-input-group p-1 bg-white rounded-pill">
                    <input type="text" class="form-control border-0 bg-transparent px-4" placeholder="Your email address">
                    <button class="btn btn-dark rounded-pill px-4">Subscribe</button>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
