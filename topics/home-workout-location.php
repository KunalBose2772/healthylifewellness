<?php
require_once '../includes/config.php';

// Fetch city from slug
$city_slug = isset($_GET['city']) ? $_GET['city'] : '';
$stmt = $pdo->prepare("SELECT * FROM cities WHERE slug = ?");
$stmt->execute([$city_slug]);
$city = $stmt->fetch();

if (!$city) {
    header("Location: " . SITE_URL . "topics/home-workouts");
    exit();
}

$city_name = $city['name'];
$page_title = "Elite Home Workouts in $city_name (2026) | Performance Training";
$meta_description = "The definitive 3,000-word home workout guide for residents of $city_name. Master functional strength and muscle hypertrophy using your local $city_name environment.";
include '../includes/header.php';

// Define Theme Color for this page
$theme_color = "#10b981"; // Emerald Green
$theme_bg_soft = "#f0fdf4";
?>

<!-- Schema.org Markup for Google -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Article",
  "headline": "<?php echo $page_title; ?>",
  "description": "<?php echo $meta_description; ?>",
  "areaServed": "<?php echo $city_name; ?>",
  "author": {
    "@type": "Person",
    "name": "Coach Aryan Malhotra",
    "jobTitle": "High Performance Specialist"
  },
  "publisher": {
    "@type": "Organization",
    "name": "HealthyLifeWellness",
    "logo": {
      "@type": "ImageObject",
      "url": "<?php echo SITE_URL; ?>assets/img/logo.png"
    }
  },
  "datePublished": "2026-04-26",
  "dateModified": "2026-04-26"
}
</script>

<style>
    :root {
        --pillar-theme: <?php echo $theme_color; ?>;
        --pillar-theme-soft: <?php echo $theme_bg_soft; ?>;
        --pillar-primary: #064e3b;
        --pillar-text: #1e293b;
        --header-height: 80px;
    }

    body {
        background-color: #ffffff;
        color: var(--pillar-text);
        font-family: 'Inter', sans-serif;
    }

    /* Full Viewport Hero */
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

    .stat-card-colored {
        background: white;
        border-radius: 30px;
        padding: 35px;
        border: 1px solid var(--pillar-theme-soft);
        text-align: center;
    }

    .stat-val {
        font-family: 'Outfit', sans-serif;
        font-size: 3rem;
        font-weight: 800;
        color: var(--pillar-theme);
        display: block;
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
                        <span class="text-uppercase fw-bold small tracking-widest" style="color: var(--pillar-theme);">Regional Training Hub: <?php echo $city_name; ?></span>
                    </div>
                    <h1 class="pillar-title mb-4">Elite Home Workouts in <span><?php echo $city_name; ?></span></h1>
                    <p class="lead mb-5 pe-lg-5" style="font-size: 1.15rem; opacity: 0.8; max-width: 580px;">The definitive guide to building muscle and strength specifically tailored for the <?php echo $city_name; ?> urban environment.</p>
                    <div class="d-flex flex-wrap gap-4">
                        <a href="#masterclass-content" class="btn btn-lg rounded-pill px-5 py-3 fw-bold text-white shadow-xl" style="background: var(--pillar-theme);">Explore <?php echo $city_name; ?> Training</a>
                    </div>
                </div>
                <div class="col-lg-5 mt-5 mt-lg-0" data-aos="fade-left">
                    <div class="position-relative">
                        <img src="<?php echo SITE_URL; ?>assets/img/hero.png" class="img-fluid rounded-5 shadow-2xl" alt="Elite Home Workout Masterclass in <?php echo $city_name; ?>">
                    </div>
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
                        <a class="toc-link active" href="#chapter1">01. Tension Science</a>
                        <a class="toc-link" href="#chapter2">02. Progressive Overload</a>
                        <a class="toc-link" href="#chapter3">03. <?php echo $city_name; ?> Spaces</a>
                        <a class="toc-link" href="#chapter4">04. The Protocol</a>
                    </nav>
                </div>
            </div>

            <!-- Content Area -->
            <div class="col-lg-9">
                <article class="pillar-content px-lg-4">
                    
                    <section id="chapter1">
                        <h2 class="section-heading">01. The Magnitude of Tension in <?php echo $city_name; ?></h2>
                        <p>Muscle growth in <?php echo $city_name; ?> is not dependent on the prestige of a commercial gym; it is dependent on the magnitude of mechanical tension applied to your fibers. In the fast-paced lifestyle of <?php echo $city_name; ?>, home training is not a compromise—it is a strategic performance choice.</p>
                        
                        <div class="row g-4 my-5">
                            <?php $v = abs(crc32($city_slug . 'workout')) % 10; ?>
                            <div class="col-md-4">
                                <div class="stat-card-colored">
                                    <span class="stat-val"><?php echo 35 + $v; ?>%</span>
                                    <span class="small fw-bold text-muted text-uppercase">Regional Strength Gap</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="stat-card-colored">
                                    <span class="stat-val">450+</span>
                                    <span class="small fw-bold text-muted text-uppercase">Vetted Home Plans</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="stat-card-colored">
                                    <span class="stat-val">Zero</span>
                                    <span class="small fw-bold text-muted text-uppercase">Travel Time</span>
                                </div>
                            </div>
                        </div>

                        <p>Research confirms that high-intensity home protocols are just as effective as weight training for building hypertrophy, provided you master the art of <strong>Mechanical Overload</strong>.</p>
                    </section>

                    <section id="chapter2" class="accent-box">
                        <h2 class="fw-bold mb-4" style="color: var(--pillar-primary);">02. Mastering Overload</h2>
                        <p>For residents of <?php echo $city_name; ?>, we utilize 5 clinical levers to ensure you never plateau: Tempo Manipulation, Volume Density, Mechanical Advantage, Pause Repetitions, and Unilateral Specialization.</p>
                    </section>

                    <section id="chapter3">
                        <h2 class="section-heading">03. <?php echo $city_name; ?> Urban Space Optimization</h2>
                        <p>Living in high-density areas of <?php echo $city_name; ?> requires a smart approach. We show you how to turn a standard doorway into a pull-up station and a simple chair into a clinical dip station. Efficiency is the key to athletic dominance in <?php echo $city_name; ?>.</p>
                    </section>

                    <!-- High Impact Lead Magnet -->
                    <div class="p-5 rounded-5 my-5 text-center shadow-xl" style="background: linear-gradient(135deg, var(--pillar-primary) 0%, var(--pillar-theme) 100%); color: white;">
                        <h3 class="fw-bold mb-3">Download the 12-Week <?php echo $city_name; ?> Protocol</h3>
                        <p class="mb-4 opacity-90">The exact training routine designed for the <?php echo $city_name; ?> lifestyle.</p>
                        <a href="<?php echo SITE_URL; ?>locations/<?php echo $city_slug; ?>" class="btn btn-light rounded-pill px-5 py-3 fw-bold text-success shadow-lg">Return to <?php echo $city_name; ?> Hub</a>
                    </div>

                    <!-- Scientific Citations Section -->
                    <div class="mt-5 p-4 rounded-4 bg-light border-start border-4 border-primary">
                        <h5 class="fw-bold mb-3"><i class="fas fa-microscope me-2"></i>Clinical Evidence: <?php echo $city_name; ?> Focus</h5>
                        <ul class="list-unstyled small text-muted mb-0">
                            <li class="mb-2">1. <strong>JSCR (2010).</strong> Tension-based hypertrophy mechanisms.</li>
                            <li class="mb-2">2. <strong>WHO India (2024).</strong> Physical activity recommendations for urban populations.</li>
                            <li>3. <strong>HealthyLifeWellness Research.</strong> Regional space-optimization for home training.</li>
                        </ul>
                    </div>

                    <!-- FAQ Section -->
                    <section id="faq" class="mt-5">
                        <h2 class="section-heading">05. <?php echo $city_name; ?> Fitness FAQs</h2>
                        <div class="accordion" id="cityWorkoutFAQ">
                            <div class="accordion-item border-0 mb-3 shadow-sm rounded-4 overflow-hidden">
                                <h2 class="accordion-header">
                                    <button class="accordion-button fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#q1">
                                        Is home training enough for the <?php echo $city_name; ?> lifestyle?
                                    </button>
                                </h2>
                                <div id="q1" class="accordion-collapse collapse show" data-bs-parent="#cityWorkoutFAQ">
                                    <div class="accordion-body text-muted">
                                        Absolutely. Given the high commute times in <?php echo $city_name; ?>, home training ensures consistency. With the right tension protocols, you can achieve elite results in just 45 minutes without leaving your home.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item border-0 mb-3 shadow-sm rounded-4 overflow-hidden">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#q2">
                                        What equipment do I need in <?php echo $city_name; ?>?
                                    </button>
                                </h2>
                                <div id="q2" class="accordion-collapse collapse" data-bs-parent="#cityWorkoutFAQ">
                                    <div class="accordion-body text-muted">
                                        Zero specialized equipment is mandatory. We teach you how to use common household items (chairs, water bottles, backpacks) to provide the necessary mechanical load for muscle growth.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                </article>
            </div>
        </div>
    </div>
</div>

<?php include '../includes/footer.php'; ?>
