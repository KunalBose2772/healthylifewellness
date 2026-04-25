<?php
require_once 'includes/config.php';

// Fetch city from slug
$city_slug = isset($_GET['city']) ? $_GET['city'] : '';
$stmt = $pdo->prepare("SELECT * FROM cities WHERE slug = ?");
$stmt->execute([$city_slug]);
$city = $stmt->fetch();

if (!$city) {
    header("Location: " . SITE_URL);
    exit();
}

$city_name = $city['name'];
$page_title = "Health & Wellness Authority: $city_name Hub (2026)";
$meta_description = "The central authority hub for wellness in $city_name. Access expert-led diet plans, home workout blueprints, and connect with vetted local health professionals.";
include 'includes/header.php';
?>

<style>
    :root {
        --hub-primary: #004ecc;
        --hub-secondary: #0081ff;
        --hub-dark: #002366;
        --hub-light: #f0f7ff;
    }

    /* Refined Home-Consistent Hero */
    .hub-hero {
        padding: 100px 0;
        background: linear-gradient(135deg, #ffffff 0%, var(--hub-light) 100%);
        position: relative;
        overflow: hidden;
    }

    .hub-hero::before {
        content: "";
        position: absolute;
        top: -10%;
        right: -5%;
        width: 40%;
        height: 80%;
        background: radial-gradient(circle, var(--hub-primary) 0%, transparent 70%);
        opacity: 0.05;
        z-index: 0;
    }

    .hub-badge {
        background: var(--hub-light);
        color: var(--hub-primary);
        padding: 8px 20px;
        border-radius: 100px;
        font-size: 0.75rem;
        font-weight: 700;
        letter-spacing: 1px;
        text-transform: uppercase;
        display: inline-block;
        margin-bottom: 25px;
        border: 1px solid rgba(0, 78, 204, 0.1);
    }

    .hub-title {
        font-family: 'Outfit', sans-serif;
        font-weight: 800;
        font-size: clamp(2.5rem, 5vw, 4.2rem);
        color: var(--hub-dark);
        line-height: 1.1;
        margin-bottom: 25px;
        letter-spacing: -0.02em;
    }

    /* Moving Authority Marquee */
    .authority-marquee {
        overflow: hidden;
        background: #fff;
        padding: 30px 0;
        border-bottom: 1px solid rgba(0,0,0,0.05);
    }
    
    .marquee-content {
        display: flex;
        gap: 80px;
        animation: scroll 40s linear infinite;
        width: max-content;
    }

    @keyframes scroll {
        0% { transform: translateX(0); }
        100% { transform: translateX(-50%); }
    }

    .marquee-item img {
        height: 35px;
        filter: grayscale(1) opacity(0.6);
        transition: all 0.3s;
    }

    .marquee-item img:hover {
        filter: grayscale(0) opacity(1);
    }

    /* Card Consistency */
    .master-card {
        background: #fff;
        border: 1px solid rgba(0,0,0,0.05);
        border-radius: 30px;
        padding: 40px;
        transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
        box-shadow: 0 10px 30px rgba(0,0,0,0.03);
    }

    .master-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 30px 60px rgba(0, 78, 204, 0.1);
        border-color: var(--hub-primary);
    }

    .master-icon {
        width: 60px;
        height: 60px;
        background: var(--hub-light);
        color: var(--hub-primary);
        border-radius: 100px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.4rem;
        margin-bottom: 25px;
    }

    /* Expert Portal Visibility Fix */
    .expert-portal-box {
        background: var(--hub-dark);
        border-radius: 30px;
        padding: 40px;
        color: #fff;
        text-align: center;
        margin-top: 30px;
        box-shadow: 0 20px 40px rgba(0, 35, 102, 0.2);
    }

    .expert-portal-box h6 {
        color: #fff !important; /* Force visibility */
        font-size: 0.8rem;
        letter-spacing: 2px;
        text-transform: uppercase;
        margin-bottom: 10px;
        opacity: 0.8;
    }

    .expert-portal-box p {
        font-size: 0.9rem;
        margin-bottom: 25px;
        color: rgba(255,255,255,0.9);
    }

    /* Professional Sidebar Refinement */
    .sidebar-pro {
        background: #fff;
        border-radius: 30px;
        padding: 35px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.03);
        border: 1px solid rgba(0,0,0,0.05);
    }

    .pro-link {
        padding: 15px;
        border-radius: 20px;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        gap: 15px;
        text-decoration: none;
        color: var(--hub-dark);
        margin-bottom: 10px;
    }

    .pro-link:hover {
        background: var(--hub-light);
        transform: translateX(5px);
    }

    .pro-icon-box {
        width: 45px;
        height: 45px;
        background: #fff;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
    }
</style>

<div class="hub-wrapper">
    <!-- Consistent Hero -->
    <section class="hub-hero">
        <div class="container position-relative z-index-1">
            <div class="row align-items-center">
                <div class="col-lg-7" data-aos="fade-right">
                    <span class="hub-badge">Regional Authority Center</span>
                    <h1 class="hub-title">Wellness in <span class="text-gradient"><?php echo $city_name; ?></span></h1>
                    <p class="lead mb-5 text-muted" style="max-width: 600px; line-height: 1.8;">Providing the residents of <?php echo $city_name; ?> with scientific, research-backed protocols for metabolic health and physical excellence.</p>
                    <div class="d-flex flex-wrap gap-3">
                        <a href="#hub-content" class="btn btn-primary btn-lg rounded-pill px-5">Explore Local Hub</a>
                        <a href="find-services.php?city=<?php echo $city_slug; ?>" class="btn btn-outline-dark btn-lg rounded-pill px-5">Find Local Pros</a>
                    </div>
                </div>
                <div class="col-lg-5 d-none d-lg-block" data-aos="fade-left">
                    <div class="position-relative">
                        <img src="<?php echo SITE_URL; ?>assets/img/hero.png" class="img-fluid rounded-5 shadow-2xl" alt="Wellness in <?php echo $city_name; ?>">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Authority Marquee (Seamless Scientific Trust) -->
    <div class="authority-marquee py-4 bg-white border-bottom">
        <div class="marquee-content">
            <div class="marquee-item"><img src="<?php echo SITE_URL; ?>assets/img/lancet.svg" alt="Lancet"></div>
            <div class="marquee-item"><img src="<?php echo SITE_URL; ?>assets/img/WHO.svg" alt="WHO"></div>
            <div class="marquee-item"><img src="<?php echo SITE_URL; ?>assets/img/PUBMED.png" alt="PubMed"></div>
            <div class="marquee-item"><img src="<?php echo SITE_URL; ?>assets/img/ICMR.svg" alt="ICMR"></div>
            <div class="marquee-item"><img src="<?php echo SITE_URL; ?>assets/img/NFHS.jpg" alt="NFHS"></div>
            <div class="marquee-item"><img src="<?php echo SITE_URL; ?>assets/img/HHP.svg" alt="HHP"></div>
            <!-- Duplicate for seamless loop -->
            <div class="marquee-item"><img src="<?php echo SITE_URL; ?>assets/img/lancet.svg" alt="Lancet"></div>
            <div class="marquee-item"><img src="<?php echo SITE_URL; ?>assets/img/WHO.svg" alt="WHO"></div>
            <div class="marquee-item"><img src="<?php echo SITE_URL; ?>assets/img/PUBMED.png" alt="PubMed"></div>
            <div class="marquee-item"><img src="<?php echo SITE_URL; ?>assets/img/ICMR.svg" alt="ICMR"></div>
            <div class="marquee-item"><img src="<?php echo SITE_URL; ?>assets/img/NFHS.jpg" alt="NFHS"></div>
            <div class="marquee-item"><img src="<?php echo SITE_URL; ?>assets/img/HHP.svg" alt="HHP"></div>
        </div>
    </div>

    <!-- Hub Content -->
    <section class="py-5" id="hub-content" style="background: #f8fafc;">
        <div class="container py-5">
            <div class="row g-5">
                <!-- Left: Masterclasses -->
                <div class="col-lg-8">
                    <div class="mb-5" data-aos="fade-right">
                        <h6 class="text-primary fw-bold text-uppercase mb-2 small tracking-widest">Scientific Masterclasses</h6>
                        <h2 class="h2 fw-bold">Elite Health Resources in <?php echo $city_name; ?></h2>
                    </div>
                    
                    <div class="row g-4">
                        <div class="col-md-6" data-aos="fade-up">
                            <div class="master-card h-100">
                                <div class="master-icon"><i class="fas fa-apple-alt"></i></div>
                                <h3 class="h4 fw-bold mb-3">Diet Plan Masterclass</h3>
                                <p class="text-muted small mb-4" style="line-height: 1.8;">A 3,000-word clinical guide to Indian nutrition, specifically optimized for the <?php echo $city_name; ?> lifestyle and local food availability.</p>
                                <a href="<?php echo SITE_URL; ?>topics/diet-plan-in-<?php echo $city_slug; ?>" class="btn btn-primary rounded-pill w-100 fw-bold">Open Masterclass</a>
                            </div>
                        </div>
                        
                        <!-- Fitness -->
                        <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
                            <div class="master-card h-100">
                                <div class="master-icon text-success shadow-sm"><i class="fas fa-dumbbell"></i></div>
                                <h3 class="h4 fw-bold mb-3">Home Workouts</h3>
                                <p class="text-muted small mb-5" style="line-height: 1.8; font-size: 0.95rem;">Functional strength protocols for small urban spaces. Scientifically tailored for <?php echo $city_name; ?> households.</p>
                                <a href="<?php echo SITE_URL; ?>topics/home-workout-in-<?php echo $city_slug; ?>" class="btn btn-primary master-btn w-100 shadow-xl">Access Training Guide</a>
                            </div>
                        </div>

                        <!-- Mental Health -->
                        <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
                            <div class="master-card h-100">
                                <div class="master-icon text-info shadow-sm" style="color: #0d9488 !important;"><i class="fas fa-brain"></i></div>
                                <h3 class="h4 fw-bold mb-3">Mental Wellness</h3>
                                <p class="text-muted small mb-5" style="line-height: 1.8; font-size: 0.95rem;">Cognitive performance and stress regulation protocols tailored for the high-pressure lifestyle of <?php echo $city_name; ?>.</p>
                                <a href="<?php echo SITE_URL; ?>topics/mental-wellness-in-<?php echo $city_slug; ?>" class="btn btn-primary master-btn w-100 shadow-xl">Access Cognitive Hub</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right: Professionals -->
                <div class="col-lg-4">
                    <div class="sidebar-pro sticky-top" style="top: 100px;" data-aos="fade-left">
                        <h5 class="fw-bold mb-4 border-bottom pb-3">Vetted Professionals</h5>
                        
                        <div class="d-grid gap-2 mb-2">
                            <a href="<?php echo SITE_URL; ?>find-services?city=<?php echo $city_slug; ?>&service=gym" class="pro-link">
                                <div class="pro-icon-box"><i class="fas fa-running text-primary"></i></div>
                                <div>
                                    <div class="fw-bold small">Elite Gyms</div>
                                    <div class="text-muted x-small">Vetted in <?php echo $city_name; ?></div>
                                </div>
                            </a>
                            <a href="<?php echo SITE_URL; ?>find-services?city=<?php echo $city_slug; ?>&service=dietitian" class="pro-link">
                                <div class="pro-icon-box"><i class="fas fa-stethoscope text-success"></i></div>
                                <div>
                                    <div class="fw-bold small">Clinical Dietitians</div>
                                    <div class="text-muted x-small">Local <?php echo $city_name; ?> Experts</div>
                                </div>
                            </a>
                        </div>

                        <div class="expert-portal-box">
                            <h6>Expert Portal</h6>
                            <p>Are you a clinical wellness professional in <?php echo $city_name; ?>?</p>
                            <a href="<?php echo SITE_URL; ?>list-with-us" class="btn btn-primary btn-sm rounded-pill px-4 fw-bold">Get Verified</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php include 'includes/footer.php'; ?>
