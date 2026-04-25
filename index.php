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

<!-- Authority Marquee (Scientific Trust) -->
<div class="authority-marquee">
    <div class="marquee-content">
        <div class="marquee-item"><img src="assets/img/lancet.svg" alt="The Lancet Medical Journal Official Logo"></div>
        <div class="marquee-item"><img src="assets/img/WHO.svg" alt="World Health Organization (WHO) Official Logo"></div>
        <div class="marquee-item"><img src="assets/img/PUBMED.png" alt="PubMed NIH Research Database Logo"></div>
        <div class="marquee-item"><img src="assets/img/ICMR.svg" alt="Indian Council of Medical Research (ICMR) Logo"></div>
        <div class="marquee-item"><img src="assets/img/NFHS.jpg" alt="National Family Health Survey (NFHS) India Logo"></div>
        <div class="marquee-item"><img src="assets/img/HHP.svg" alt="Harvard Health Publishing Logo"></div>
        
        <!-- Duplicate for seamless loop -->
        <div class="marquee-item"><img src="assets/img/lancet.svg" alt="The Lancet Medical Journal Official Logo"></div>
        <div class="marquee-item"><img src="assets/img/WHO.svg" alt="World Health Organization (WHO) Official Logo"></div>
        <div class="marquee-item"><img src="assets/img/PUBMED.png" alt="PubMed NIH Research Database Logo"></div>
        <div class="marquee-item"><img src="assets/img/ICMR.svg" alt="Indian Council of Medical Research (ICMR) Logo"></div>
        <div class="marquee-item"><img src="assets/img/NFHS.jpg" alt="National Family Health Survey (NFHS) India Logo"></div>
        <div class="marquee-item"><img src="assets/img/HHP.svg" alt="Harvard Health Publishing Logo"></div>
    </div>
</div>

<!-- Scientific Trust Benchmarks (Internal & External Linking) -->
<section class="py-5 bg-white">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6" data-aos="fade-right">
                <h2 class="display-6 fw-bold mb-4">India's First <span class="text-primary">Research-Driven</span> Wellness Hub</h2>
                <p class="text-muted mb-4">HealthyLifeWellness.in isn't just another health blog. We are building a high-authority ecosystem that bridges the gap between complex clinical data and practical daily living for the Indian context. Every guide we publish is cross-referenced with the <a href="https://main.icmr.nic.in/" target="_blank" rel="nofollow" class="text-primary fw-bold" title="ICMR Official Site">Indian Council of Medical Research (ICMR)</a>, the <a href="https://www.who.int/india" target="_blank" rel="nofollow" class="text-primary fw-bold" title="WHO India">World Health Organization (WHO)</a>, and peer-reviewed journals like <a href="https://www.thelancet.com/" target="_blank" rel="nofollow" class="text-primary fw-bold">The Lancet</a> and <a href="https://pubmed.ncbi.nlm.nih.gov/" target="_blank" rel="nofollow" class="text-primary fw-bold">PubMed</a>.</p>
                <div class="row g-4 mt-2">
                    <div class="col-sm-6">
                        <div class="d-flex align-items-start gap-3">
                            <div class="bg-primary-light p-2 rounded-circle"><i class="fas fa-microscope text-primary"></i></div>
                            <div>
                                <h6 class="fw-bold mb-1">Evidence-Based</h6>
                                <p class="small text-muted mb-0">Zero fads. Only science-backed nutrition and fitness advice.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="d-flex align-items-start gap-3">
                            <div class="bg-success-light p-2 rounded-circle"><i class="fas fa-user-check text-success"></i></div>
                            <div>
                                <h6 class="fw-bold mb-1">Expert Verified</h6>
                                <p class="small text-muted mb-0">Content reviewed by clinical nutritionists and doctors.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-5 d-flex align-items-center gap-4">
                    <a href="topics/diet-plans" class="btn btn-primary rounded-pill px-4">View Diet Masterclass</a>
                    <a href="programs" class="btn btn-outline-premium rounded-pill px-4">Browse Scientific Programs <i class="fas fa-chevron-right ms-2"></i></a>
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <div class="p-5 rounded-5 bg-light border border-2 border-dashed border-primary position-relative">
                    <h5 class="fw-bold mb-4">Indian Health Metrics (2026)</h5>
                    <div class="mb-4">
                        <div class="d-flex justify-content-between mb-2">
                            <span class="small fw-bold">Urban Metabolic Issues</span>
                            <span class="small text-primary fw-bold">68% Prevalence</span>
                        </div>
                        <div class="progress rounded-pill" style="height: 8px;">
                            <div class="progress-bar" role="progressbar" style="width: 68%;"></div>
                        </div>
                    </div>
                    <div class="mb-4">
                        <div class="d-flex justify-content-between mb-2">
                            <span class="small fw-bold">Protein Gap in Daily Diet</span>
                            <span class="small text-danger fw-bold">73% Deficit</span>
                        </div>
                        <div class="progress rounded-pill" style="height: 8px;">
                            <div class="progress-bar bg-danger" role="progressbar" style="width: 73%;"></div>
                        </div>
                    </div>
                    <p class="small text-muted italic mb-0 mt-4">*Data sourced from <a href="http://rchiips.org/nfhs/index.shtml" target="_blank" rel="nofollow">NFHS-5 India</a> and internal survey benchmarks. We use these insights to design our <a href="topics/weight-loss" class="text-primary fw-bold">Weight Loss Blueprints</a>.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Cluster Sections (Light Background) -->
<section id="clusters" class="py-5 bg-light">
    <div class="container py-5">
        <div class="text-center mb-5" data-aos="fade-up">
            <h2 class="display-5 mb-3">Health <span class="text-primary">Masterclasses</span></h2>
            <p class="text-muted mx-auto" style="max-width: 600px;">Expert-led diet plans, health tips, and wellness blueprints designed for your transformation.</p>
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

<!-- Featured Articles (White Background) -->
<section class="bg-white py-5">
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
                    foreach($posts as $p):
                        // Estimate read time
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
            <?php endforeach; else: ?>
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

<!-- Hindi Section Teaser (Light Background) -->
<section class="py-5 bg-light">
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

<!-- Homepage FAQ Section (Essential for Snippets) -->
<section class="py-5 bg-white faq-homepage">
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-5" data-aos="fade-right">
                <h6 class="text-primary fw-bold text-uppercase mb-3">Common Questions</h6>
                <h2 class="display-6 fw-bold mb-4">You have questions. We have <span class="text-primary">expert</span> answers.</h2>
                <p class="text-muted mb-5">Our team of clinical nutritionists and certified trainers have compiled answers to the most common wellness queries in India.</p>
                <div class="p-4 bg-light rounded-4 shadow-sm border">
                    <h6 class="fw-bold mb-3">Still need help?</h6>
                    <p class="small text-muted">Can't find what you're looking for? Consult our experts directly for a personalized plan.</p>
                    <a href="find-services" class="btn btn-primary rounded-pill px-4 btn-sm">Consult a Pro</a>
                </div>
            </div>
            <div class="col-lg-7 mt-5 mt-lg-0" data-aos="fade-left">
                <div class="accordion accordion-flush" id="homeFaq">
                    <div class="accordion-item shadow-sm rounded-4 overflow-hidden mb-3">
                        <h2 class="accordion-header">
                            <button class="accordion-button fw-bold py-3 px-4" type="button" data-bs-toggle="collapse" data-bs-target="#hq1">
                                Are the diet plans on HealthyLifeWellness science-backed?
                            </button>
                        </h2>
                        <div id="hq1" class="accordion-collapse collapse show" data-bs-parent="#homeFaq">
                            <div class="accordion-body p-4 text-muted">
                                Yes. Every guide is compiled using clinical data from authorities like **The Lancet**, **WHO**, and **NFHS India**. Unlike generic blogs, we provide co-citations to medical journals and our content is reviewed by clinical experts to ensure it adheres to safety and metabolic efficacy standards.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item shadow-sm rounded-4 overflow-hidden mb-3">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed fw-bold py-3 px-4" type="button" data-bs-toggle="collapse" data-bs-target="#hq2">
                                How do I find a vetted gym or dietitian near me?
                            </button>
                        </h2>
                        <div id="hq2" class="accordion-collapse collapse" data-bs-parent="#homeFaq">
                            <div class="accordion-body p-4 text-muted">
                                Our <a href="find-services" class="text-primary fw-bold">Find Services</a> portal uses a 5-point vetting process. We check certifications, facility hygiene, user success rates, and local reputation in cities like Patna, Delhi, and Mumbai before any professional is listed on our platform.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item shadow-sm rounded-4 overflow-hidden mb-3">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed fw-bold py-3 px-4" type="button" data-bs-toggle="collapse" data-bs-target="#hq3">
                                Why is an Indian-specific diet plan important?
                            </button>
                        </h2>
                        <div id="hq3" class="accordion-collapse collapse" data-bs-parent="#homeFaq">
                            <div class="accordion-body p-4 text-muted">
                                Indian genetic and metabolic patterns are unique. We have a higher prevalence of **Abdominal Obesity** and **Vitamin D deficiency** despite the sun. Our <a href="topics/diet-plans" class="text-primary fw-bold">Masterclass Guides</a> focus on local ingredients like Millets, pulses, and traditional spices that work with your biology.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item shadow-sm rounded-4 overflow-hidden mb-3">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed fw-bold py-3 px-4" type="button" data-bs-toggle="collapse" data-bs-target="#hq4">
                                Do you offer home-based workout solutions?
                            </button>
                        </h2>
                        <div id="hq4" class="accordion-collapse collapse" data-bs-parent="#homeFaq">
                            <div class="accordion-body p-4 text-muted">
                                Yes. Our <a href="topics/home-workouts" class="text-primary fw-bold">Home Workout Blueprint</a> is designed for people with minimal equipment. We focus on functional movements and high-intensity protocols that can be performed in small Indian apartment spaces.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Regional Authority Index (The "Elite" Sitemap for AdSense & Geographic Authority) -->
<section class="py-5 bg-light border-top">
    <div class="container">
        <div class="row mb-5" data-aos="fade-up">
            <div class="col-lg-8">
                <h2 class="h4 fw-bold text-dark mb-3">Regional Clinical Wellness Index</h2>
                <p class="text-muted small">We are mapping the metabolic landscape of India by establishing localized health pillars. Each hub provides specific clinical nutrition guidelines and vetted professional networks tailored to the regional lifestyle of each city.</p>
            </div>
        </div>
        
        <div class="row g-3" data-aos="fade-up">
            <?php
            $cities = [
                // Major Metros & Capitals
                'Mumbai', 'Delhi', 'Bangalore', 'Hyderabad', 'Ahmedabad', 'Chennai', 'Kolkata', 'Surat', 'Pune', 'Jaipur',
                'Lucknow', 'Kanpur', 'Nagpur', 'Indore', 'Thane', 'Bhopal', 'Visakhapatnam', 'Pimpri-Chinchwad', 'Patna', 'Vadodara',
                'Ghaziabad', 'Ludhiana', 'Agra', 'Nashik', 'Faridabad', 'Meerut', 'Rajkot', 'Kalyan-Dombivli', 'Vasai-Virar', 'Varanasi',
                'Srinagar', 'Aurangabad', 'Dhanbad', 'Amritsar', 'Navi Mumbai', 'Allahabad', 'Ranchi', 'Howrah', 'Jabalpur', 'Gwalior',
                // State Capitals & UTs
                'Vijayawada', 'Itanagar', 'Dispur', 'Raipur', 'Panaji', 'Gandhinagar', 'Chandigarh', 'Shimla', 'Thiruvananthapuram', 
                'Imphal', 'Shillong', 'Aizawl', 'Kohima', 'Bhubaneswar', 'Gangtok', 'Agartala', 'Dehradun', 'Port Blair', 'Daman', 
                'Leh', 'Kavaratti', 'Puducherry', 'Noida', 'Gurgaon', 'Mysore', 'Coimbatore', 'Madurai', 'Kochi', 'Udaipur'
            ];
            
            // Sort alphabetically for a better directory feel
            sort($cities);
            
            // Split cities into 6 columns
            $columns = array_chunk($cities, ceil(count($cities) / 6));
            
            foreach($columns as $col_cities):
            ?>
            <div class="col-6 col-md-4 col-lg-2">
                <ul class="list-unstyled">
                    <?php foreach($col_cities as $city): 
                        $city_slug = strtolower(str_replace(' ', '-', $city));
                    ?>
                    <li class="mb-2">
                        <a href="locations/<?php echo $city_slug; ?>" class="text-muted hover-primary transition-all small d-block py-1" style="font-size: 0.75rem; letter-spacing: 0.1px; line-height: 1.2;">
                            <span class="text-primary fw-bold" style="font-size: 0.65rem;">HUB:</span> <?php echo $city; ?>
                        </a>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
