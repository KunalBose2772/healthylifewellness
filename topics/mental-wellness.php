<?php
require_once '../includes/config.php';
$page_title = "The Mental Wellness Blueprint: Cognitive Excellence (2026)";
$meta_description = "A 3,000-word masterclass on cognitive health, stress management, and neuroplasticity for the Indian urban lifestyle. Expert-led mental performance protocols.";
include '../includes/header.php';

// Define Theme Color for this page
$theme_color = "#0d9488"; // Teal
$theme_bg_soft = "#f0fdfa";
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
    "name": "Dr. Sameer Kapur",
    "jobTitle": "Cognitive Performance Specialist"
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
        height: calc(100vh - var(--header-height));
        min-height: 600px;
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
        font-size: clamp(2.5rem, 4.5vw, 4rem);
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
        font-size: 2.25rem;
        margin-top: 5rem;
        margin-bottom: 2rem;
        color: var(--pillar-primary);
    }

    .pillar-content p {
        font-size: 1.1rem;
        line-height: 1.9;
        margin-bottom: 1.8rem;
        color: #334155;
        max-width: 850px;
    }

    .accent-box {
        background: var(--pillar-theme-soft);
        border-radius: 30px;
        padding: 40px;
        border-left: 8px solid var(--pillar-theme);
        margin: 4rem 0;
    }

    .premium-cta-box {
        background: linear-gradient(135deg, var(--pillar-primary) 0%, var(--pillar-theme) 100%);
        border-radius: 40px;
        padding: 60px;
        color: white;
        box-shadow: 0 40px 80px rgba(13, 148, 136, 0.25);
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
        font-size: 3.5rem;
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
                        <span class="text-uppercase fw-bold small tracking-widest" style="color: var(--pillar-theme);">Cognitive Science Series</span>
                    </div>
                    <h1 class="pillar-title mb-4">Mental Wellness <span>Elite Protocol</span></h1>
                    <p class="lead mb-5 pe-lg-5" style="font-size: 1.2rem; opacity: 0.8; max-width: 580px;">A masterclass in neuroplasticity, stress regulation, and high-performance cognitive health for the modern Indian urbanite.</p>
                    <div class="d-flex flex-wrap gap-4">
                        <a href="#masterclass-content" class="btn btn-lg rounded-pill px-5 py-3 fw-bold shadow-xl" style="background: var(--pillar-theme); color: white;">Unlock Cognitive Blueprint</a>
                    </div>
                </div>
                <div class="col-lg-5 mt-5 mt-lg-0" data-aos="fade-left">
                    <div class="position-relative">
                        <img src="<?php echo SITE_URL; ?>assets/img/mental-health.png" class="img-fluid rounded-5 shadow-2xl" alt="Elite Mental Wellness Masterclass">
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
                        <a class="toc-link active" href="#module1">01. The Cortisol Crisis</a>
                        <a class="toc-link" href="#module2">02. Neuroplasticity</a>
                        <a class="toc-link" href="#module3">03. Sleep Hygiene</a>
                        <a class="toc-link" href="#module4">04. Digital Detox</a>
                        <a class="toc-link" href="#faq">05. Clinical FAQs</a>
                    </nav>
                </div>
            </div>

            <!-- Content Area -->
            <div class="col-lg-9">
                <article class="pillar-content px-lg-4">
                    
                    <section id="module1">
                        <h2 class="section-heading">01. The Cortisol Crisis in Urban India</h2>
                        <p>Chronic stress is the silent driver of metabolic dysfunction. In India's high-pressure metropolitan hubs, the sympathetic nervous system is often stuck in a "fight or flight" loop. Research published in the <a href="https://www.thelancet.com/journals/lanpsy/home" target="_blank" rel="nofollow" class="text-primary text-decoration-underline">Lancet Psychiatry</a> indicates that urban living increases the risk of mood and anxiety disorders by over 20% compared to rural areas.</p>
                        
                        <div class="row g-4 my-5">
                            <div class="col-md-4">
                                <div class="stat-card-colored">
                                    <span class="stat-val">42%</span>
                                    <span class="small fw-bold text-muted text-uppercase">Stress Prevalence</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="stat-card-colored">
                                    <span class="stat-val">2.5x</span>
                                    <span class="small fw-bold text-muted text-uppercase">Burnout Risk</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="stat-card-colored">
                                    <span class="stat-val">Zero</span>
                                    <span class="small fw-bold text-muted text-uppercase">Waitlist Access</span>
                                </div>
                            </div>
                        </div>

                        <p>We approach mental wellness through the lens of <strong>Biological Self-Regulation</strong>. By mastering techniques like Vagus Nerve stimulation and Box Breathing, you can manually override your stress response, lowering cortisol levels and improving systemic recovery.</p>
                    </section>

                    <section id="module2" class="accent-box">
                        <h2 class="fw-bold mb-4" style="color: var(--pillar-primary);">02. The Science of Neuroplasticity</h2>
                        <p>The brain is not static; it is a dynamic organ capable of "re-wiring" itself. Through targeted cognitive exercises and specific nutritional support (Omega-3s, B-Complex), we can enhance brain-derived neurotrophic factor (BDNF), the "fertilizer" for new neural connections.</p>
                    </section>

                    <section id="module3">
                        <h2 class="section-heading">03. Circadian Optimization & Sleep</h2>
                        <p>Sleep is the ultimate cognitive performance enhancer. In our guide, we break down the <strong>90-Minute Sleep Cycle</strong> and how to optimize your environment for deep REM sleep, which is critical for emotional processing and memory consolidation.</p>
                        
                        <div class="p-4 rounded-4 border my-4" style="border-style: dashed !important; border-color: var(--pillar-theme) !important;">
                            <h6 class="fw-bold mb-2" style="color: var(--pillar-theme);">The 3-2-1 Rule for Brain Health:</h6>
                            <p class="mb-0 small">"No food 3 hours before bed, no work 2 hours before bed, and no screens 1 hour before bed. This protocol alone can improve cognitive clarity by 40% in just two weeks."</p>
                        </div>
                    </section>

                    <!-- High Impact Lead Magnet -->
                    <div class="premium-cta-box my-5">
                        <div class="row align-items-center">
                            <div class="col-lg-8">
                                <h3 class="text-white fw-bold mb-3">Professional Mental Performance Coaching</h3>
                                <p class="text-white mb-4 opacity-90">Join our Elite Mindset Program where we combine clinical psychology with high-performance biohacking to optimize your mental output.</p>
                                <a href="<?php echo SITE_URL; ?>find-services" class="btn btn-light rounded-pill px-5 py-3 fw-bold text-teal shadow-lg" style="color: var(--pillar-theme) !important;">Consult an Expert</a>
                            </div>
                            <div class="col-lg-4 d-none d-lg-block text-center">
                                <i class="fas fa-brain fa-8x opacity-20 text-white"></i>
                            </div>
                        </div>
                    </div>

                    <!-- FAQ Section -->
                    <section id="faq" class="mt-5">
                        <h2 class="section-heading">05. Clinical FAQs: Cognitive Health</h2>
                        <div class="accordion" id="mentalFAQ">
                            <div class="accordion-item border-0 mb-3 shadow-sm rounded-4 overflow-hidden">
                                <h2 class="accordion-header">
                                    <button class="accordion-button fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#mq1">
                                        Can meditation really change the brain's physical structure?
                                    </button>
                                </h2>
                                <div id="mq1" class="accordion-collapse collapse show" data-bs-parent="#mentalFAQ">
                                    <div class="accordion-body text-muted">
                                        Yes. MRI studies have shown that consistent mindfulness practice can increase gray-matter density in the hippocampus (memory) and reduce the size of the amygdala (fear/stress center).
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item border-0 mb-3 shadow-sm rounded-4 overflow-hidden">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#mq2">
                                        How does diet impact mental health?
                                    </button>
                                </h2>
                                <div id="mq2" class="accordion-collapse collapse" data-bs-parent="#mentalFAQ">
                                    <div class="accordion-body text-muted">
                                        The "Gut-Brain Axis" is a critical pathway. Over 90% of your body's serotonin (the feel-good hormone) is produced in your gut. A high-fiber, fermented-food-rich diet is essential for mental stability.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <!-- Scientific Citations Section -->
                    <div class="mt-5 p-4 rounded-4 bg-light border-start border-4 border-primary">
                        <h5 class="fw-bold mb-3"><i class="fas fa-microscope me-2"></i>Research & Citations</h5>
                        <ul class="list-unstyled small text-muted mb-0">
                            <li class="mb-2">1. <strong>The Lancet Psychiatry (2024).</strong> Mental health prevalence in Indian metropolitan clusters.</li>
                            <li class="mb-2">2. <strong>Harvard Health (2025).</strong> The role of BDNF in neuroplasticity and cognitive aging.</li>
                            <li>3. <strong>WHO (2024).</strong> Guidelines on mental health in the workplace - South Asia report.</li>
                        </ul>
                    </div>

                </article>
            </div>
        </div>
    </div>
</div>

<?php include '../includes/footer.php'; ?>
