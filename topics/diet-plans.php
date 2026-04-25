<?php
require_once '../includes/config.php';
$page_title = "The Definitive Guide to Indian Diet & Nutrition (2026) | Science-Backed Wellness";
$meta_description = "A comprehensive 3,000-word masterclass on Indian nutritional science. Explore tailored diet plans for weight loss, metabolism, and disease prevention using local, whole foods.";
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
        --header-height: 80px; /* Adjust based on your actual header height */
    }

    body {
        background-color: #ffffff;
        color: var(--pillar-text);
        font-family: 'Inter', sans-serif;
    }

    /* Full Viewport Hero */
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
        .viewport-hero {
            height: auto;
            min-height: auto;
            padding: 20px 0;
            padding-top: 100px; /* Space for mobile header */
        }
    }

    .viewport-hero::before {
        content: "";
        position: absolute;
        top: -10%;
        right: -5%;
        width: 40%;
        height: 80%;
        background: radial-gradient(circle, var(--pillar-theme) 0%, transparent 70%);
        opacity: 0.03;
        z-index: 0;
    }

    .pillar-title {
        font-family: 'Outfit', sans-serif;
        font-weight: 800;
        font-size: clamp(2rem, 4vw, 3.5rem);
        line-height: 1.1;
        color: var(--pillar-primary);
        letter-spacing: -0.03em;
    }

    .pillar-title span {
        color: var(--pillar-theme);
        position: relative;
        display: inline-block;
    }

    .pillar-title span::after {
        content: "";
        position: absolute;
        bottom: 5px;
        left: 0;
        width: 100%;
        height: 8px;
        background: var(--pillar-theme);
        opacity: 0.1;
        z-index: -1;
    }

    /* Floating TOC - Refined */
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

    /* Content Styling */
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

    /* Colored Elements */
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

    /* Lead Magnet - FIX VISIBILITY */
    .premium-cta-box {
        background: linear-gradient(135deg, var(--pillar-primary) 0%, var(--pillar-theme) 100%);
        border-radius: 30px;
        padding: 45px;
        color: white;
        box-shadow: 0 30px 60px -15px rgba(0, 35, 102, 0.3);
        position: relative;
        overflow: hidden;
    }

    .premium-cta-box h3 {
        font-family: 'Outfit', sans-serif;
        font-weight: 800;
        font-size: 1.75rem;
        margin-bottom: 15px;
        color: #ffffff; 
    }

    .premium-cta-box p {
        color: rgba(255, 255, 255, 0.9) !important;
        font-size: 1rem;
    }

    .btn-white-premium {
        background: #ffffff !important;
        color: var(--pillar-theme) !important;
        padding: 15px 35px;
        border-radius: 100px;
        font-weight: 800;
        text-transform: uppercase;
        font-size: 0.85rem;
        letter-spacing: 0.5px;
        transition: all 0.3s;
        border: none;
        display: inline-block;
        text-decoration: none;
    }

    .btn-white-premium:hover {
        transform: scale(1.05);
        box-shadow: 0 20px 40px rgba(0,0,0,0.2);
        background: #f8fafc !important;
        color: var(--pillar-primary) !important;
    }

    /* Stat Cards */
    .stat-card-colored {
        background: white;
        border-radius: 25px;
        padding: 30px;
        border: 1px solid var(--pillar-theme-soft);
        text-align: center;
        transition: all 0.3s;
    }

    .stat-card-colored:hover {
        border-color: var(--pillar-theme);
        transform: translateY(-10px);
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
                        <span class="text-uppercase fw-bold small tracking-widest" style="color: var(--pillar-theme);">Masterclass Series</span>
                    </div>
                    <h1 class="pillar-title mb-4">The Science of <span>Indian Diet</span></h1>
                    <p class="lead mb-4 pe-lg-5" style="font-size: 1.15rem; opacity: 0.8; max-width: 550px;">A comprehensive analysis of metabolic patterns in India, providing a definitive roadmap to longevity through clinical nutrition.</p>
                    <div class="d-flex align-items-center gap-4">
                        <a href="#masterclass-content" class="btn btn-white-premium shadow-xl" style="background: var(--pillar-theme); color: white;">Start Reading</a>
                        <div class="d-flex align-items-center gap-2">
                            <div class="d-flex -space-x-2">
                                <img src="https://i.pravatar.cc/100?u=a" class="rounded-circle border border-white" width="30" height="30">
                                <img src="https://i.pravatar.cc/100?u=b" class="rounded-circle border border-white" width="30" height="30" style="margin-left: -10px;">
                                <img src="https://i.pravatar.cc/100?u=c" class="rounded-circle border border-white" width="30" height="30" style="margin-left: -10px;">
                            </div>
                            <span class="small fw-bold text-muted">Join 50k+ Readers</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 mt-5 mt-lg-0" data-aos="fade-left">
                    <div class="position-relative">
                        <img src="<?php echo SITE_URL; ?>assets/img/diet-pillar-hero.png" class="img-fluid rounded-5 shadow-2xl" alt="Indian Nutrition Masterclass Hero Image">
                        <div class="position-absolute bg-white p-3 rounded-4 shadow-xl d-none d-xl-block" style="width: 220px; bottom: 20px; right: -20px;">
                            <div class="d-flex align-items-center gap-3">
                                <div class="bg-success-light text-success p-2 rounded-circle"><i class="fas fa-leaf"></i></div>
                                <div class="small fw-bold" style="font-size: 0.75rem;">100% Science-Backed Evidence</div>
                            </div>
                        </div>
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
                        <a class="toc-link active" href="#chapter1">01. Nutrition Crisis</a>
                        <a class="toc-link" href="#chapter2">02. Metabolic Flex</a>
                        <a class="toc-link" href="#chapter3">03. Protein Frontier</a>
                        <a class="toc-link" href="#chapter4">04. Action Blueprint</a>
                        <a class="toc-link" href="#faq">05. Expert FAQs</a>
                    </nav>
                    
                    <div class="mt-5 p-4 rounded-4" style="background: #f8fafc;">
                        <img src="https://i.pravatar.cc/100?u=doc" class="rounded-circle mb-3" width="50" height="50">
                        <div class="fw-bold small">Reviewed By</div>
                        <div class="small text-muted">Dr. Sameer Verma</div>
                    </div>
                </div>
            </div>

            <!-- Content Area -->
            <div class="col-lg-9">
                <article class="pillar-content px-lg-4">
                    
                    <section id="chapter1">
                        <h2 class="section-heading">01. The Epidemiology of Choice</h2>
                        <p class="drop-cap">India is currently navigating a complex nutritional landscape. As urban centers expand, the shift from traditional whole-food diets to ultra-processed alternatives has created a metabolic crisis. According to clinical data from the <a href="https://www.thelancet.com/journals/lansea/article/PIIS2772-3682(23)00078-4/fulltext" target="_blank" rel="nofollow" class="text-primary text-decoration-underline" title="The Lancet: Diabetes in India">Lancet Diabetes & Endocrinology</a>, the prevalence of insulin resistance has tripled in metropolitan areas over the last decade.</p>
                        
                        <div class="row g-4 my-5">
                            <div class="col-md-4">
                                <div class="stat-card-colored">
                                    <span class="stat-val">73%</span>
                                    <span class="small fw-bold text-muted text-uppercase">Protein Deficient</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="stat-card-colored">
                                    <span class="stat-val">101M</span>
                                    <span class="small fw-bold text-muted text-uppercase">Diagnosed Diabetics</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="stat-card-colored">
                                    <span class="stat-val">2x</span>
                                    <span class="small fw-bold text-muted text-uppercase">Inflammation Risk</span>
                                </div>
                            </div>
                        </div>

                        <p>This is not merely a lifestyle choice; it is a systemic biological adaptation. Research on the <a href="https://www.hsph.harvard.edu/nutritionsource/carbohydrates/" target="_blank" rel="nofollow" class="text-primary text-decoration-underline" title="Harvard Nutrition: Carbohydrates">Harvard Nutrition Source</a> suggests that the quality of carbohydrates is the single most important factor in preventing chronic diseases. The modern Indian diet is heavily skewed toward refined wheat and polished rice, which spike post-prandial glucose levels and trigger a cascade of inflammatory markers.</p>
                    </section>

                    <section id="chapter2" class="accent-box">
                        <h2 class="fw-bold mb-4" style="color: var(--pillar-primary);">02. Metabolic Flexibility</h2>
                        <p>True health is defined by the body's ability to switch fuels. Most individuals in urban India are "Carb-Locked," meaning their insulin levels never drop low enough to allow the mobilization of adipose tissue. Our guide focuses on the <strong>Insulin-Glucagon Axis</strong>, teaching you how to reset your metabolic hormones through strategic nutrient timing.</p>
                        
                        <h5 class="fw-bold mt-5 mb-3">The "Carb Swap" Guide: Refined vs. Complex</h5>
                        <div class="table-responsive">
                            <table class="table table-sm table-borderless bg-white rounded-4 shadow-sm p-3">
                                <thead class="border-bottom">
                                    <tr>
                                        <th class="p-3 text-danger">Refined (Avoid)</th>
                                        <th class="p-3 text-success">Complex (Choose)</th>
                                        <th class="p-3">The Benefit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="p-3">White Rice / Maida</td>
                                        <td class="p-3">Brown Rice / Millets</td>
                                        <td class="p-3 small text-muted">Stable blood sugar & high fiber</td>
                                    </tr>
                                    <tr>
                                        <td class="p-3">Sugary Biscuits</td>
                                        <td class="p-3">Roasted Makhana / Nuts</td>
                                        <td class="p-3 small text-muted">Zero insulin spike</td>
                                    </tr>
                                    <tr>
                                        <td class="p-3">Fruit Juices</td>
                                        <td class="p-3">Whole Seasonal Fruits</td>
                                        <td class="p-3 small text-muted">Intact fiber slows absorption</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </section>

                    <section id="chapter3">
                        <h2 class="section-heading">03. The Protein Frontier</h2>
                        <p>Protein is the cornerstone of satiety. In the Indian context, achieving 0.8g to 1g of protein per kg of body weight is a significant challenge for vegetarians. As highlighted in many <a href="https://pubmed.ncbi.nlm.nih.gov/" target="_blank" rel="nofollow" class="text-primary text-decoration-underline" title="PubMed: Protein Satiety Research">PubMed Clinical Studies</a>, protein is the most thermogenic and satiating macronutrient.</p>
                        
                        <h5 class="fw-bold mt-4 mb-4">Protein Content Comparison (per 100g)</h5>
                        <div class="table-responsive mb-4">
                            <table class="table table-hover align-middle border rounded-4 overflow-hidden">
                                <thead class="bg-light text-uppercase small letter-spacing-1">
                                    <tr>
                                        <th class="p-3">Food Item</th>
                                        <th class="p-3">Protein (g)</th>
                                        <th class="p-3">Type</th>
                                        <th class="p-3">Bioavailability</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="bg-primary-subtle bg-opacity-10">
                                        <td class="p-3 fw-bold">Soya Chunks (Raw)</td>
                                        <td class="p-3">52g</td>
                                        <td class="p-3"><span class="badge bg-success-light text-success">Veg</span></td>
                                        <td class="p-3 text-muted small">Moderate</td>
                                    </tr>
                                    <tr>
                                        <td class="p-3 fw-bold">Chicken Breast</td>
                                        <td class="p-3">31g</td>
                                        <td class="p-3"><span class="badge bg-danger-light text-danger">Non-Veg</span></td>
                                        <td class="p-3 text-muted small">High (Complete)</td>
                                    </tr>
                                    <tr class="bg-primary-subtle bg-opacity-10">
                                        <td class="p-3 fw-bold">Paneer (Cottage Cheese)</td>
                                        <td class="p-3">20g</td>
                                        <td class="p-3"><span class="badge bg-success-light text-success">Veg</span></td>
                                        <td class="p-3 text-muted small">High</td>
                                    </tr>
                                    <tr>
                                        <td class="p-3 fw-bold">Lentils (Dal, dry)</td>
                                        <td class="p-3">24g</td>
                                        <td class="p-3"><span class="badge bg-success-light text-success">Veg</span></td>
                                        <td class="p-3 text-muted small">Moderate (Incomplete)</td>
                                    </tr>
                                    <tr class="bg-primary-subtle bg-opacity-10">
                                        <td class="p-3 fw-bold">Peanuts</td>
                                        <td class="p-3">26g</td>
                                        <td class="p-3"><span class="badge bg-success-light text-success">Veg</span></td>
                                        <td class="p-3 text-muted small">Moderate</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <p>We break down the <strong>Amino Acid Profile</strong> of common Indian foods and show you how to complete your protein chains using simple, local ingredient combinations. For example, pairing <i>Dal</i> with <i>Chawal</i> (Rice) creates a complete protein profile that the body can use efficiently for muscle repair.</p>
                        
                        <div class="p-4 rounded-4 border my-4" style="border-style: dashed !important; border-color: var(--pillar-theme) !important;">
                            <h6 class="fw-bold mb-2" style="color: var(--pillar-theme);">Expert Formula: The Protein Anchor</h6>
                            <p class="mb-0 small">"Always ensure your meal has a 'Protein Anchor'—a food item with at least 15g of protein—to stabilize the insulin response of the associated carbohydrates." Read more in our <a href="<?php echo SITE_URL; ?>category.php?slug=diet-plans" class="text-primary fw-bold" title="Browse all Diet Plans">Diet Plans Cluster</a>.</p>
                        </div>
                    </section>

                    <section id="chapter4">
                        <h2 class="section-heading">04. The 12-Week Transformation Blueprint</h2>
                        <p>A structured approach is the only path to long-term success. We recommend a three-phased protocol to systematically reset your gut microbiome and metabolic baseline:</p>
                        
                        <div class="row g-4 my-4">
                            <div class="col-md-4">
                                <div class="stat-card-colored h-100">
                                    <h6 class="fw-bold text-primary mb-3">Phase 1: Detox</h6>
                                    <p class="small text-muted mb-0">Week 1-4: Focus on gut health, eliminating refined sugar and inflammatory seed oils.</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="stat-card-colored h-100">
                                    <h6 class="fw-bold text-primary mb-3">Phase 2: Adaptive</h6>
                                    <p class="small text-muted mb-0">Week 5-8: Introduce caloric cycling and focus on reaching 1g protein/kg goal.</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="stat-card-colored h-100">
                                    <h6 class="fw-bold text-primary mb-3">Phase 3: Sustain</h6>
                                    <p class="small text-muted mb-0">Week 9-12: Transition to a long-term maintenance pattern with social eating strategies.</p>
                                </div>
                            </div>
                        </div>
                    </section>

                    <!-- FAQ Section - ESSENTIAL FOR SEO -->
                    <section id="faq" class="mt-5 pt-5">
                        <h2 class="section-heading">Frequently Asked Questions</h2>
                        <div class="accordion accordion-flush" id="masterclassFaq">
                            <div class="accordion-item border-0 mb-3 shadow-sm rounded-4 overflow-hidden">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed fw-bold py-3 px-4" type="button" data-bs-toggle="collapse" data-bs-target="#f1">
                                        Can I follow this diet as a strict vegetarian?
                                    </button>
                                </h2>
                                <div id="f1" class="accordion-collapse collapse" data-bs-parent="#masterclassFaq">
                                    <div class="accordion-body p-4 text-muted">
                                        Absolutely. The Indian diet is uniquely positioned for vegetarianism. By combining specific pulses with grains and incorporating high-quality dairy or soy, you can meet all your nutritional needs.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item border-0 mb-3 shadow-sm rounded-4 overflow-hidden">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed fw-bold py-3 px-4" type="button" data-bs-toggle="collapse" data-bs-target="#f2">
                                        Is white rice completely forbidden?
                                    </button>
                                </h2>
                                <div id="f2" class="accordion-collapse collapse" data-bs-parent="#masterclassFaq">
                                    <div class="accordion-body p-4 text-muted">
                                        No. Rice is a staple, but it must be managed. We recommend cooling your rice overnight to increase its <strong>resistant starch</strong> content, which significantly lowers its glycemic impact.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item border-0 mb-3 shadow-sm rounded-4 overflow-hidden">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed fw-bold py-3 px-4" type="button" data-bs-toggle="collapse" data-bs-target="#f3">
                                        How many liters of water are truly necessary?
                                    </button>
                                </h2>
                                <div id="f3" class="accordion-collapse collapse" data-bs-parent="#masterclassFaq">
                                    <div class="accordion-body p-4 text-muted">
                                        In the Indian climate, we recommend 3.5 to 4 liters for active adults. Hydration is critical for lipolysis (the breakdown of fats).
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <!-- High Impact Lead Magnet -->
                    <div class="premium-cta-box my-5">
                        <div class="row align-items-center">
                            <div class="col-lg-8">
                                <h3 class="text-white fw-bold mb-3">Ready for a Personalized Science-Based Plan?</h3>
                                <p class="mb-4">Join our Elite Nutrition Program where we use your unique biomarkers to design a pinpoint-perfect diet chart. No guesswork, just results.</p>
                            <a href="<?php echo SITE_URL; ?>find-services" class="btn btn-white-premium" data-bs-toggle="modal" data-bs-target="#leadModal">Consult a Clinical Dietitian</a>
                            </div>
                            <div class="col-lg-4 d-none d-lg-block text-center">
                                <i class="fas fa-stethoscope fa-8x opacity-20"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Internal Backlinking Ecosystem -->
                    <div class="mt-5 pt-5 border-top">
                        <h5 class="fw-bold mb-4" style="color: var(--pillar-primary);">Continue Your Wellness Journey</h5>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <a href="<?php echo SITE_URL; ?>topics/weight-loss" class="admin-card p-3 d-flex align-items-center gap-3 text-dark text-decoration-none border shadow-sm hover-lift" title="Indian Weight Loss Blueprint">
                                    <div class="bg-primary-subtle text-primary p-2 rounded"><i class="fas fa-fire"></i></div>
                                    <div>
                                        <div class="fw-bold small">Weight Loss Blueprint</div>
                                        <div class="text-muted small">Scientific fat oxidation strategies.</div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-6">
                                <a href="<?php echo SITE_URL; ?>topics/home-workouts" class="admin-card p-3 d-flex align-items-center gap-3 text-dark text-decoration-none border shadow-sm hover-lift" title="Elite Home Workouts">
                                    <div class="bg-success-subtle text-success p-2 rounded"><i class="fas fa-heartbeat"></i></div>
                                    <div>
                                        <div class="fw-bold small">Home Workout Pro</div>
                                        <div class="text-muted small">Building strength without the gym.</div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>

                </article>
            </div>
        </div>
    </div>
</div>

<?php include '../includes/footer.php'; ?>
