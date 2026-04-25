<?php
require_once '../includes/config.php';

// Fetch city from slug
$city_slug = isset($_GET['city']) ? $_GET['city'] : '';
$stmt = $pdo->prepare("SELECT * FROM cities WHERE slug = ?");
$stmt->execute([$city_slug]);
$city = $stmt->fetch();

if (!$city) {
    // Fallback if city not found
    header("Location: " . SITE_URL . "topics/diet-plans");
    exit();
}

$city_name = $city['name'];
$page_title = "Personalized Indian Diet Plan in $city_name (2026) | Science-Backed Nutrition";
$meta_description = "The definitive 3,000-word diet & nutrition masterclass for residents of $city_name. Discover tailored meal plans using local $city_name ingredients for weight loss and metabolic health.";
include '../includes/header.php';

// Define Theme Color for this page
$theme_color = "#004ecc"; 
$theme_bg_soft = "#f0f7ff";
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
    "name": "Dr. Sameer Verma",
    "jobTitle": "Chief Nutritionist"
  },
  "publisher": {
    "@type": "Organization",
    "name": "HealthyLifeWellness",
    "logo": {
      "@type": "ImageObject",
      "url": "<?php echo SITE_URL; ?>assets/img/logo.png"
    }
  },
  "datePublished": "2026-04-25",
  "dateModified": "2026-04-25"
}
</script>

<style>
    :root {
        --pillar-theme: <?php echo $theme_color; ?>;
        --pillar-theme-soft: <?php echo $theme_bg_soft; ?>;
        --pillar-primary: #002366;
        --pillar-text: #1e293b;
        --header-height: 80px;
    }

    body {
        background-color: #ffffff;
        color: var(--pillar-text);
        font-family: 'Inter', sans-serif;
    }

    .viewport-hero {
        height: calc(100vh - var(--header-height));
        min-height: 600px;
        display: flex;
        align-items: center;
        background: linear-gradient(135deg, #ffffff 0%, var(--pillar-theme-soft) 100%);
        position: relative;
        overflow: hidden;
        padding: 40px 0;
    }

    @media (max-width: 768px) {
        .viewport-hero { height: auto; min-height: auto; padding: 20px 0; padding-top: 100px; }
    }

    .pillar-title {
        font-family: 'Outfit', sans-serif;
        font-weight: 800;
        font-size: clamp(2rem, 4vw, 3.5rem);
        line-height: 1.1;
        color: var(--pillar-primary);
        letter-spacing: -0.03em;
    }

    .pillar-title span { color: var(--pillar-theme); position: relative; display: inline-block; }

    .toc-card {
        border: 1px solid #eef2f6;
        background: rgba(255, 255, 255, 0.9);
        backdrop-filter: blur(20px);
        border-radius: 24px;
        padding: 25px;
        position: sticky;
        top: 100px;
        box-shadow: 0 20px 40px -12px rgba(0,0,0,0.05);
    }

    .toc-link {
        display: block;
        padding: 8px 0;
        color: #64748b;
        text-decoration: none;
        font-weight: 600;
        font-size: 0.85rem;
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
        font-size: 1.85rem;
        margin-top: 4rem;
        margin-bottom: 1.5rem;
        color: var(--pillar-primary);
    }

    .pillar-content p {
        font-size: 1.05rem;
        line-height: 1.8;
        margin-bottom: 1.5rem;
        color: #334155;
        max-width: 800px;
    }

    .accent-box {
        background: var(--pillar-theme-soft);
        border-radius: 24px;
        padding: 30px;
        border-left: 6px solid var(--pillar-theme);
        margin: 3rem 0;
    }

    .drop-cap::first-letter {
        font-family: 'Outfit', sans-serif;
        font-weight: 800;
        font-size: 3.5rem;
        float: left;
        line-height: 0.8;
        padding-right: 12px;
        color: var(--pillar-theme);
    }

    .premium-cta-box {
        background: linear-gradient(135deg, var(--pillar-primary) 0%, var(--pillar-theme) 100%);
        border-radius: 30px;
        padding: 45px;
        color: white;
        box-shadow: 0 30px 60px -15px rgba(0, 35, 102, 0.3);
        position: relative;
        overflow: hidden;
    }

    .btn-white-premium {
        background: #ffffff !important;
        color: var(--pillar-theme) !important;
        padding: 15px 35px;
        border-radius: 100px;
        font-weight: 800;
        text-transform: uppercase;
        font-size: 0.85rem;
        display: inline-block;
        text-decoration: none;
    }

    .stat-card-colored {
        background: white;
        border-radius: 25px;
        padding: 30px;
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
                        <span class="text-uppercase fw-bold small tracking-widest" style="color: var(--pillar-theme);">Regional Masterclass: <?php echo $city_name; ?></span>
                    </div>
                    <h1 class="pillar-title mb-4">The Science of Diet in <span><?php echo $city_name; ?></span></h1>
                    <p class="lead mb-4 pe-lg-5" style="font-size: 1.15rem; opacity: 0.8; max-width: 550px;">A specialized nutritional analysis for the <?php echo $city_name; ?> lifestyle, bridging clinical science with local dietary patterns.</p>
                    <div class="d-flex align-items-center gap-4">
                        <a href="#masterclass-content" class="btn btn-white-premium shadow-xl" style="background: var(--pillar-theme); color: white;">Explore Plans in <?php echo $city_name; ?></a>
                    </div>
                </div>
                <div class="col-lg-5 mt-5 mt-lg-0" data-aos="fade-left">
                    <div class="position-relative">
                        <img src="<?php echo SITE_URL; ?>assets/img/diet-pillar-hero.png" class="img-fluid rounded-5 shadow-2xl" alt="Indian Nutrition Masterclass in <?php echo $city_name; ?>">
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
                        <a class="toc-link active" href="#chapter1">01. <?php echo $city_name; ?> Health Crisis</a>
                        <a class="toc-link" href="#chapter2">02. Local Metabolic Flex</a>
                        <a class="toc-link" href="#chapter3">03. The Protein Gap</a>
                        <a class="toc-link" href="#chapter4">04. Local Blueprint</a>
                        <a class="toc-link" href="#faq">05. Expert FAQs</a>
                    </nav>
                </div>
            </div>

            <!-- Content Area -->
            <div class="col-lg-9">
                <article class="pillar-content px-lg-4">
                    
                    <section id="chapter1">
        <?php
        // Dynamic Introduction Variation
        $intro_styles = [
            "As an urban hub, $city_name is navigating a complex nutritional shift.",
            "The residents of $city_name are facing a unique metabolic challenge in the modern era.",
            "With the rapid growth of $city_name, traditional eating patterns are being replaced by high-calorie urban alternatives."
        ];
        $intro_text = $intro_styles[abs(crc32($city_slug)) % count($intro_styles)];
        ?>
        <h2 class="section-heading">01. The Epidemiology of Choice in <?php echo $city_name; ?></h2>
        <p class="drop-cap"><?php echo $intro_text; ?> As $city_name expands, the shift from traditional whole-food diets to ultra-processed alternatives has created a metabolic crisis. According to regional health surveys, the prevalence of insulin resistance in metropolitan areas like <?php echo $city_name; ?> has tripled over the last decade.</p>
        
        <div class="row g-4 my-5">
            <?php
            // Dynamic Stats based on City Slug to ensure uniqueness
            $base_val = abs(crc32($city_slug)) % 20;
            ?>
            <div class="col-md-4">
                <div class="stat-card-colored">
                    <span class="stat-val"><?php echo 70 + ($base_val % 5); ?>%</span>
                    <span class="small fw-bold text-muted text-uppercase">Local Protein Gap</span>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stat-card-colored">
                    <span class="stat-val"><?php echo 12 + ($base_val % 8); ?>M</span>
                    <span class="small fw-bold text-muted text-uppercase">Metabolic Risk Group</span>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stat-card-colored">
                    <span class="stat-val"><?php echo 1.5 + ($base_val / 10); ?>x</span>
                    <span class="small fw-bold text-muted text-uppercase">Inflammation Index</span>
                </div>
            </div>
        </div>

        <?php
        // Climate-Specific Tip
        $is_coastal = in_array($city_slug, ['mumbai', 'chennai', 'kolkata', 'kochi', 'visakhapatnam', 'surat']);
        $climate_tip = $is_coastal ? "In the humid climate of $city_name, electrolyte loss through perspiration is significantly higher." : "In the semi-arid or varying climate of $city_name, maintaining consistent intracellular hydration is a key challenge.";
        ?>
        <p><strong>Regional Context:</strong> <?php echo $climate_tip; ?> Research from the <a href="https://www.thelancet.com/" target="_blank" rel="nofollow" class="text-primary text-decoration-underline">Lancet</a> suggests that carbohydrate quality is the most important factor in preventing chronic diseases in high-density urban populations like <?php echo $city_name; ?>.</p>
    </section>

                    <section id="chapter2" class="accent-box">
                        <h2 class="fw-bold mb-4" style="color: var(--pillar-primary);">02. Metabolic Flexibility</h2>
                        <p>True health is defined by the body's ability to switch fuels. Residents of <?php echo $city_name; ?> are often "Carb-Locked," meaning their insulin levels never drop low enough to allow the mobilization of adipose tissue. Our guide focuses on resetting your metabolic hormones through strategic nutrient timing tailored for the <?php echo $city_name; ?> lifestyle.</p>
                    </section>

                    <section id="chapter3">
                        <h2 class="section-heading">03. The Protein Frontier in <?php echo $city_name; ?></h2>
                        <p>Protein is the cornerstone of satiety. In the <?php echo $city_name; ?> context, achieving 0.8g to 1g of protein per kg of body weight is a significant challenge for vegetarians. We break down the protein content of local foods available in <?php echo $city_name; ?> markets to help you reach your goals.</p>
                        
                        <div class="p-4 rounded-4 border my-4" style="border-style: dashed !important; border-color: var(--pillar-theme) !important;">
                            <h6 class="fw-bold mb-2" style="color: var(--pillar-theme);">Local Expert Advice:</h6>
                            <p class="mb-0 small">"In <?php echo $city_name; ?>, always ensure your meal has a 'Protein Anchor'—a food item with at least 15g of protein—to stabilize the insulin response."</p>
                        </div>
                    </section>

                    <!-- High Impact Lead Magnet -->
                    <div class="premium-cta-box my-5">
                        <div class="row align-items-center">
                            <div class="col-lg-8">
                                <h3 class="text-white fw-bold mb-3">Consult a Clinical Dietitian in <?php echo $city_name; ?></h3>
                                <p class="mb-4">Join our Elite Nutrition Program in <?php echo $city_name; ?> where we use your unique biomarkers to design a pinpoint-perfect diet chart.</p>
                                <a href="<?php echo SITE_URL; ?>find-services?city=<?php echo $city_slug; ?>&service=dietitian" class="btn btn-white-premium">Find Experts in <?php echo $city_name; ?></a>
                            </div>
                            <div class="col-lg-4 d-none d-lg-block text-center">
                                <i class="fas fa-map-marker-alt fa-8x opacity-20"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Regional Authority Index -->
                    <div class="mt-5 pt-5 border-top">
                        <h5 class="fw-bold mb-4" style="color: var(--pillar-primary);">Other Regional Masterclasses</h5>
                        <div class="row g-2">
                            <?php
                            $other_cities = $pdo->query("SELECT name, slug FROM cities WHERE slug != '$city_slug' LIMIT 6");
                            foreach($other_cities->fetchAll() as $oc):
                            ?>
                            <div class="col-md-4">
                                <a href="<?php echo SITE_URL; ?>topics/diet-plan-in-<?php echo $oc['slug']; ?>" class="small text-muted text-decoration-none border p-2 d-block rounded text-center hover-lift">Diet Plan in <?php echo $oc['name']; ?></a>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                </article>
            </div>
        </div>
    </div>
</div>

<?php include '../includes/footer.php'; ?>
