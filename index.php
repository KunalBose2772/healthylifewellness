<?php 
require_once 'includes/config.php';
include 'includes/header.php'; 

$hero_text = [
    'en' => [
        'sub' => 'Empowering Healthy Living',
        'title' => 'Transform Your Life with <span class="text-gradient">Expert Wellness</span> Guidance',
        'desc' => 'Join over 200,000+ monthly readers. Get science-backed advice on weight loss, nutrition, yoga, and mental wellness tailored for the Indian lifestyle.',
        'btn1' => 'Explore Clusters',
        'btn2' => 'Find Local Pro'
    ],
    'hi' => [
        'sub' => 'स्वस्थ जीवन को सशक्त बनाना',
        'title' => '<span class="text-gradient">विशेषज्ञ कल्याण</span> मार्गदर्शन के साथ अपना जीवन बदलें',
        'desc' => 'प्रति माह 200,000+ पाठकों से जुड़ें। भारतीय जीवनशैली के लिए तैयार वजन घटाने, पोषण, योग और मानसिक स्वास्थ्य पर विज्ञान-आधारित सलाह लें।',
        'btn1' => 'क्लस्टर खोजें',
        'btn2' => 'प्रो खोजें'
    ]
];
$h = $hero_text[$lang];
?>

<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6 hero-content" data-aos="fade-right">
                <h6 class="text-primary fw-bold text-uppercase mb-3"><?php echo $h['sub']; ?></h6>
                <h1><?php echo $h['title']; ?></h1>
                <p class="lead mb-5 text-muted"><?php echo $h['desc']; ?></p>
                
                <div class="d-flex flex-column flex-md-row gap-3">
                    <a href="#clusters" class="btn btn-primary btn-lg rounded-pill px-5"><?php echo $h['btn1']; ?></a>
                    <a href="find-services.php" class="btn btn-outline-dark btn-lg rounded-pill px-5"><?php echo $h['btn2']; ?></a>
                </div>

                <div class="mt-5 d-flex align-items-center gap-4">
                    <div class="d-flex align-items-center">
                        <div class="avatar-group d-flex">
                            <img src="https://i.pravatar.cc/150?u=1" class="rounded-circle border border-white" width="40" height="40" alt="User">
                            <img src="https://i.pravatar.cc/150?u=2" class="rounded-circle border border-white ms-n2" width="40" height="40" alt="User">
                            <img src="https://i.pravatar.cc/150?u=3" class="rounded-circle border border-white ms-n2" width="40" height="40" alt="User">
                        </div>
                        <div class="ms-3">
                            <h6 class="mb-0 fw-bold">4.8/5 Rating</h6>
                            <small class="text-muted">From our community</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 hero-image-container" data-aos="fade-left">
                <div class="position-relative">
                    <img src="assets/img/hero.png" class="img-fluid main-hero-img" alt="Yoga Wellness">
                    
                    <div class="floating-card top-card">
                        <div class="d-flex align-items-center gap-3">
                            <div class="bg-success-light p-2 rounded-circle">
                                <i class="fas fa-check-circle text-success"></i>
                            </div>
                            <div>
                                <h6 class="mb-0">Expert Verified</h6>
                                <small class="text-muted">Certified Dietitians</small>
                            </div>
                        </div>
                    </div>

                    <div class="floating-card bottom-card">
                        <div class="d-flex align-items-center gap-3">
                            <div class="bg-warning-light p-2 rounded-circle">
                                <i class="fas fa-fire text-warning"></i>
                            </div>
                            <div>
                                <h6 class="mb-0">Weight Loss Guide</h6>
                                <small class="text-muted">Free Download</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Cluster Sections -->
<section id="clusters" class="py-5">
    <div class="container py-5">
        <div class="text-center mb-5" data-aos="fade-up">
            <h2 class="display-5 mb-3">Health <span class="text-primary">Clusters</span></h2>
            <p class="text-muted mx-auto" style="max-width: 600px;">Dive deep into our curated collections of expert-led content designed to help you achieve specific health goals.</p>
        </div>

        <div class="row g-4">
            <?php
            if ($pdo):
                $stmt = $pdo->query("SELECT * FROM categories LIMIT 3");
                $categories = $stmt->fetchAll();
                $delays = [100, 200, 300];
                foreach($categories as $index => $cat):
                    $img = !empty($cat['image']) ? $cat['image'] : 'assets/img/' . $cat['slug'] . '.png';
            ?>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="<?php echo $delays[$index]; ?>">
                <div class="category-card">
                    <div class="category-img-wrapper">
                        <img src="<?php echo $img; ?>" alt="<?php echo $cat['name']; ?>">
                        <span class="category-badge">Expert Led</span>
                    </div>
                    <div class="p-4">
                        <h3><?php echo $cat['name']; ?></h3>
                        <p class="text-muted"><?php echo $cat['description']; ?></p>
                        <a href="category.php?slug=<?php echo $cat['slug']; ?>" class="text-primary fw-bold">Explore Cluster <i class="fas fa-arrow-right ms-2"></i></a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12 text-center py-5">
                    <p class="text-muted">Unable to connect to the database. Please check your configuration.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Featured Articles -->
<section class="bg-light py-5">
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-end mb-5" data-aos="fade-up">
            <div>
                <h2 class="mb-0">Trending <span class="text-primary">Articles</span></h2>
                <p class="text-muted mb-0">Our most read guides this week.</p>
            </div>
            <a href="blog.php" class="btn btn-outline-primary rounded-pill px-4">View All</a>
        </div>

        <div class="row g-4">
            <?php
            if ($pdo):
                $stmt = $pdo->query("SELECT p.*, c.name as category_name FROM posts p JOIN categories c ON p.category_id = c.id WHERE p.status = 'published' ORDER BY p.created_at DESC LIMIT 3");
                $posts = $stmt->fetchAll();
                
                if (count($posts) > 0):
                    $main_post = $posts[0];
            ?>
            <div class="col-lg-8" data-aos="fade-up">
                <!-- Large Feature -->
                <div class="card border-0 rounded-4 overflow-hidden shadow-sm h-100">
                    <div class="row g-0 h-100">
                        <div class="col-md-6">
                            <img src="<?php echo !empty($main_post['image']) ? $main_post['image'] : 'assets/img/weight-loss.png'; ?>" class="img-fluid h-100 w-100" style="object-fit: cover;" alt="<?php echo $main_post['title']; ?>">
                        </div>
                        <div class="col-md-6 d-flex align-items-center">
                            <div class="card-body p-4 p-lg-5">
                                <div class="mb-3">
                                    <span class="badge bg-primary-light text-primary rounded-pill px-3"><?php echo $main_post['category_name']; ?></span>
                                    <span class="text-muted ms-2"><i class="far fa-clock"></i> 10 min read</span>
                                </div>
                                <h3 class="mb-3"><?php echo $main_post['title']; ?></h3>
                                <p class="text-muted mb-4"><?php echo substr(strip_tags($main_post['content']), 0, 150) . '...'; ?></p>
                                <div class="d-flex align-items-center mb-4">
                                    <img src="https://i.pravatar.cc/150?u=4" class="rounded-circle me-3" width="40" alt="Author">
                                    <div>
                                        <h6 class="mb-0">Expert Contributor</h6>
                                        <small class="text-muted">Wellness Specialist</small>
                                    </div>
                                </div>
                                <a href="post.php?slug=<?php echo $main_post['slug']; ?>" class="btn btn-primary rounded-pill px-4">Read Article</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="row g-4">
                    <?php for($i=1; $i<count($posts); $i++): ?>
                    <div class="col-12" data-aos="fade-up" data-aos-delay="<?php echo $i*100; ?>">
                        <div class="post-card">
                            <div class="img-container">
                                <img src="<?php echo !empty($posts[$i]['image']) ? $posts[$i]['image'] : 'assets/img/fitness.png'; ?>" alt="<?php echo $posts[$i]['title']; ?>">
                            </div>
                            <h4 class="post-title"><?php echo $posts[$i]['title']; ?></h4>
                            <p class="text-muted small"><?php echo substr(strip_tags($posts[$i]['content']), 0, 80) . '...'; ?></p>
                            <a href="post.php?slug=<?php echo $posts[$i]['slug']; ?>" class="stretched-link"></a>
                        </div>
                    </div>
                    <?php endfor; ?>
                </div>
            </div>
            <?php else: ?>
                <div class="col-12 text-center py-5">
                    <p class="text-muted">Stay tuned! Our expert-led articles are coming soon.</p>
                </div>
            <?php endif; ?>
            <?php else: ?>
                <div class="col-12 text-center py-5">
                    <p class="text-muted">Unable to connect to the database.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Lead Gen CTA -->
<section class="container py-5" data-aos="zoom-in">
    <div class="lead-gen-section">
        <div class="row align-items-center">
            <div class="col-lg-7">
                <h2 class="display-6 fw-bold mb-4 text-white">Find Certified Wellness Pros Near You</h2>
                <p class="lead mb-5 opacity-75">Connect with the best Gyms, Yoga Trainers, and Dietitians in your city. Verified professionals only.</p>
                
                <div class="search-wrapper mb-4">
                    <i class="fas fa-map-marker-alt text-primary ms-3"></i>
                    <input type="text" class="form-control border-0" placeholder="Enter your city (e.g. Patna, Delhi, Mumbai)">
                    <button class="btn btn-primary rounded-pill px-4 py-2">Search Now</button>
                </div>
                
                <div class="d-flex gap-4 small opacity-75">
                    <span><i class="fas fa-check text-primary"></i> 500+ Local Gyms</span>
                    <span><i class="fas fa-check text-primary"></i> 200+ Dietitians</span>
                    <span><i class="fas fa-check text-primary"></i> 100+ Yoga Studios</span>
                </div>
            </div>
            <div class="col-lg-5 d-none d-lg-block">
                <div class="p-4 bg-white rounded-4 shadow-lg text-dark">
                    <h5 class="mb-4">Get Free Consultation</h5>
                    <form>
                        <div class="mb-3">
                            <input type="text" class="form-control rounded-pill" placeholder="Your Name">
                        </div>
                        <div class="mb-3">
                            <input type="tel" class="form-control rounded-pill" placeholder="Phone Number">
                        </div>
                        <div class="mb-3">
                            <select class="form-select rounded-pill">
                                <option selected>What are you looking for?</option>
                                <option>Weight Loss Plan</option>
                                <option>Personal Trainer</option>
                                <option>Yoga Classes</option>
                            </select>
                        </div>
                        <button class="btn btn-primary w-100 rounded-pill py-2">Get Started</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Hindi Section Teaser -->
<section class="py-5">
    <div class="container py-5">
        <div class="row align-items-center">
            <div class="col-md-6" data-aos="fade-right">
                <img src="assets/img/hindi-teaser.png" class="img-fluid rounded-5 shadow-lg" alt="Hindi Content">
            </div>
            <div class="col-md-6 ps-lg-5" data-aos="fade-left">
                <h2 class="display-6 mb-4">अब स्वास्थ्य की जानकारी <span class="text-primary">अपनी भाषा</span> में।</h2>
                <p class="lead text-muted mb-4">Hindi and local language content coming soon! We believe wellness should be accessible to everyone across India.</p>
                <ul class="list-unstyled mb-5">
                    <li class="mb-2"><i class="fas fa-check-circle text-primary me-2"></i> वजन घटाने के सरल उपाय</li>
                    <li class="mb-2"><i class="fas fa-check-circle text-primary me-2"></i> घर पर व्यायाम करने का सही तरीका</li>
                    <li class="mb-2"><i class="fas fa-check-circle text-primary me-2"></i> स्वस्थ भारतीय आहार योजना</li>
                </ul>
                <a href="?lang=hi" class="btn btn-primary rounded-pill px-5 py-3 fw-bold shadow">Switch to Hindi (Beta)</a>
            </div>
        </div>
    </div>
</section>

<!-- Local SEO Section -->
<section class="py-5 bg-white">
    <div class="container">
        <div class="row align-items-center mb-5">
            <div class="col-md-6">
                <h2 class="display-6 fw-bold mb-0">Local Wellness Guides</h2>
                <p class="text-muted mt-2">Find the best vetted professionals in your city.</p>
            </div>
            <div class="col-md-6 text-md-end">
                <a href="find-services.php" class="btn btn-outline-primary rounded-pill px-4">Browse All Cities</a>
            </div>
        </div>
        
        <div class="row g-4">
            <?php
            $services_list = ['gym', 'dietitian', 'yoga'];
            $cities_list = ['patna', 'delhi', 'mumbai', 'bangalore'];
            
            foreach($services_list as $s_slug):
                // Fetch service name
                $s_name = ucfirst(str_replace('-', ' ', $s_slug));
            ?>
            <div class="col-lg-4">
                <div class="admin-card p-4 h-100">
                    <h5 class="fw-bold mb-4 d-flex align-items-center">
                        <i class="fas fa-map-marker-alt me-2 text-primary"></i> 
                        Best <?php echo $s_name; ?>s in...
                    </h5>
                    <ul class="list-unstyled mb-0">
                        <?php foreach($cities_list as $c_slug): ?>
                        <li class="mb-3">
                            <a href="service-city.php?service=<?php echo $s_slug; ?>&city=<?php echo $c_slug; ?>" class="text-decoration-none text-dark d-flex justify-content-between align-items-center">
                                <?php echo ucfirst($c_slug); ?>
                                <span class="badge bg-light text-muted fw-normal rounded-pill">Top Rated</span>
                            </a>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
