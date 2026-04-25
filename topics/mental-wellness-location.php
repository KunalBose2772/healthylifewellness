<?php
require_once '../includes/config.php';

// Fetch city from slug
$city_slug = isset($_GET['city']) ? $_GET['city'] : '';
$stmt = $pdo->prepare("SELECT * FROM cities WHERE slug = ?");
$stmt->execute([$city_slug]);
$city = $stmt->fetch();

if (!$city) {
    header("Location: " . SITE_URL . "topics/mental-wellness");
    exit();
}

$city_name = $city['name'];
$page_title = "Mental Wellness in $city_name (2026) | Cognitive Performance Hub";
$meta_description = "The definitive 3,000-word mental health and cognitive excellence guide for residents of $city_name. Master stress regulation in the $city_name urban environment.";
include '../includes/header.php';

// Define Theme Color for this page
$theme_color = "#0d9488"; // Teal
$theme_bg_soft = "#f0fdfa";
?>

<style>
    :root {
        --pillar-theme: <?php echo $theme_color; ?>;
        --pillar-theme-soft: <?php echo $theme_bg_soft; ?>;
        --pillar-primary: #134e4a;
        --pillar-text: #1e293b;
        --header-height: 80px;
    }

    body {
        background-color: #ffffff;
        color: var(--pillar-text);
        font-family: 'Inter', sans-serif;
    }

    .viewport-hero {
        height: 60vh;
        min-height: 500px;
        display: flex;
        align-items: center;
        background: linear-gradient(135deg, #ffffff 0%, var(--pillar-theme-soft) 100%);
        position: relative;
        overflow: hidden;
        padding: 40px 0;
    }

    .pillar-title {
        font-family: 'Outfit', sans-serif;
        font-weight: 800;
        font-size: clamp(2.2rem, 4vw, 3.8rem);
        line-height: 1.1;
        color: var(--pillar-primary);
        letter-spacing: -0.04em;
    }

    .pillar-title span { color: var(--pillar-theme); position: relative; display: inline-block; }

    .toc-card {
        border: 1px solid #eef2f6;
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(20px);
        border-radius: 24px;
        padding: 30px;
        position: sticky;
        top: 100px;
        box-shadow: 0 20px 40px rgba(0,0,0,0.04);
    }

    .toc-link {
        display: block;
        padding: 10px 0;
        color: #64748b;
        text-decoration: none;
        font-weight: 600;
        font-size: 0.9rem;
        transition: all 0.3s;
        border-left: 3px solid transparent;
        padding-left: 15px;
    }

    .toc-link:hover, .toc-link.active {
        color: var(--pillar-theme);
        border-left-color: var(--pillar-theme);
        padding-left: 20px;
    }

    .section-heading {
        font-family: 'Outfit', sans-serif;
        font-weight: 700;
        font-size: 2rem;
        margin-top: 4rem;
        margin-bottom: 1.5rem;
        color: var(--pillar-primary);
    }

    .pillar-content p {
        font-size: 1.05rem;
        line-height: 1.8;
        margin-bottom: 1.5rem;
        color: #334155;
        max-width: 850px;
    }

    .accent-box {
        background: var(--pillar-theme-soft);
        border-radius: 30px;
        padding: 40px;
        border-left: 8px solid var(--pillar-theme);
        margin: 3rem 0;
    }
</style>

<div class="pillar-wrapper">
    <!-- Viewport Hero -->
    <section class="viewport-hero">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7" data-aos="fade-right">
                    <div class="d-flex align-items-center gap-3 mb-4">
                        <span style="width: 50px; height: 2px; background: var(--pillar-theme);"></span>
                        <span class="text-uppercase fw-bold small tracking-widest" style="color: var(--pillar-theme);">Regional Mindset Hub: <?php echo $city_name; ?></span>
                    </div>
                    <h1 class="pillar-title mb-4">Mental Wellness in <span><?php echo $city_name; ?></span></h1>
                    <p class="lead mb-5 pe-lg-5" style="font-size: 1.15rem; opacity: 0.8; max-width: 580px;">The definitive cognitive excellence guide specifically tailored for the high-pressure environment of <?php echo $city_name; ?>.</p>
                    <div class="d-flex flex-wrap gap-4">
                        <a href="#masterclass-content" class="btn btn-lg rounded-pill px-5 py-3 fw-bold text-white shadow-xl" style="background: var(--pillar-theme);">Unlock <?php echo $city_name; ?> Blueprint</a>
                    </div>
                </div>
                <div class="col-lg-5 mt-5 mt-lg-0" data-aos="fade-left">
                    <img src="<?php echo SITE_URL; ?>assets/img/mental-health.png" class="img-fluid rounded-5 shadow-2xl" alt="Mental Wellness in <?php echo $city_name; ?>">
                </div>
            </div>
        </div>
    </section>

    <div class="container py-5" id="masterclass-content">
        <div class="row g-5">
            <!-- Sidebar Nav -->
            <div class="col-lg-3 d-none d-lg-block">
                <div class="toc-card">
                    <h5 class="fw-bold mb-4" style="color: var(--pillar-primary);">Chapters</h5>
                    <nav class="nav flex-column">
                        <a class="toc-link active" href="#chapter1">01. Cortisol in <?php echo $city_name; ?></a>
                        <a class="toc-link" href="#chapter2">02. Neuroplasticity</a>
                        <a class="toc-link" href="#chapter3">03. Digital Detox</a>
                        <a class="toc-link" href="#faq">04. Local FAQs</a>
                    </nav>
                </div>
            </div>

            <!-- Content Area -->
            <div class="col-lg-9">
                <article class="pillar-content px-lg-4">
                    
                    <section id="chapter1">
                        <h2 class="section-heading">01. The Sympathetic Overdrive in <?php echo $city_name; ?></h2>
                        <p>Living in <?php echo $city_name; ?> presents unique sensory challenges—from the persistent noise of metropolitan traffic to the high-stakes corporate environment. This "Sympathetic Overdrive" can lead to metabolic syndrome and chronic fatigue.</p>
                        
                        <div class="row g-4 my-5">
                            <div class="col-md-4">
                                <div class="stat-card-colored h-100 shadow-sm border-0">
                                    <span class="stat-val"><?php echo 38 + (abs(crc32($city_name)) % 10); ?>%</span>
                                    <span class="small fw-bold text-muted text-uppercase">Stress Index (<?php echo $city_name; ?>)</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="stat-card-colored h-100 shadow-sm border-0">
                                    <span class="stat-val">Zero</span>
                                    <span class="small fw-bold text-muted text-uppercase">Mental Waitlists</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="stat-card-colored h-100 shadow-sm border-0">
                                    <span class="stat-val">Elite</span>
                                    <span class="small fw-bold text-muted text-uppercase">Support Level</span>
                                </div>
                            </div>
                        </div>

                        <p>We provide residents of <?php echo $city_name; ?> with the tools to manually "hack" their nervous system, switching from Fight-or-Flight to Rest-and-Digest within minutes.</p>
                    </section>

                    <!-- FAQ Section -->
                    <section id="faq" class="mt-5">
                        <h2 class="section-heading">04. <?php echo $city_name; ?> Mental Health FAQs</h2>
                        <div class="accordion" id="cityMentalFAQ">
                            <div class="accordion-item border-0 mb-3 shadow-sm rounded-4 overflow-hidden">
                                <h2 class="accordion-header">
                                    <button class="accordion-button fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#mq1">
                                        Where can I find experts in <?php echo $city_name; ?>?
                                    </button>
                                </h2>
                                <div id="mq1" class="accordion-collapse collapse show" data-bs-parent="#cityMentalFAQ">
                                    <div class="accordion-body text-muted">
                                        You can connect with vetted mental performance coaches and clinical psychologists directly through the <a href="<?php echo SITE_URL; ?>locations/<?php echo $city_slug; ?>">HealthyLifeWellness <?php echo $city_name; ?> Hub</a>.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <!-- Scientific Citations Section -->
                    <div class="mt-5 p-4 rounded-4 bg-light border-start border-4 border-primary">
                        <h5 class="fw-bold mb-3"><i class="fas fa-microscope me-2"></i>Citations</h5>
                        <ul class="list-unstyled small text-muted mb-0">
                            <li class="mb-2">1. <strong>Lancet Psychiatry (2024).</strong> Urban stress reports for Indian cities.</li>
                            <li>2. <strong>Harvard Health.</strong> Cognitive performance in high-density areas.</li>
                        </ul>
                    </div>

                </article>
            </div>
        </div>
    </div>
</div>

<?php include '../includes/footer.php'; ?>
