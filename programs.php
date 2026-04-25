<?php 
require_once 'includes/config.php';
$page_title = 'Digital Wellness Programs';
include 'includes/header.php'; 
?>

<section class="py-5 bg-light">
    <div class="container py-5">
        <!-- New: Authority Masterclasses (Free) -->
        <div class="row g-4 mb-5 pb-5 border-bottom">
            <div class="col-lg-4" data-aos="fade-up">
                <div class="card border-0 shadow-lg rounded-5 overflow-hidden bg-primary text-white p-4 h-100">
                    <div class="d-flex align-items-center gap-4 mb-4">
                        <div class="bg-white text-primary p-3 rounded-circle"><i class="fas fa-utensils fa-2x"></i></div>
                        <div>
                            <h2 class="h5 fw-bold mb-0">The Diet Plan Masterclass</h2>
                            <small class="opacity-75">3,000 Word Authority Guide</small>
                        </div>
                    </div>
                    <p class="small mb-5 opacity-90">A specialized nutritional analysis for the Indian lifestyle, bridging clinical science with local dietary patterns.</p>
                    <a href="<?php echo SITE_URL; ?>diet-plans" class="btn btn-light btn-sm rounded-pill px-4 py-2 fw-bold text-primary shadow-xl mt-auto">Access Guide</a>
                </div>
            </div>
            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                <div class="card border-0 shadow-lg rounded-5 overflow-hidden bg-success text-white p-4 h-100">
                    <div class="d-flex align-items-center gap-4 mb-4">
                        <div class="bg-white text-success p-3 rounded-circle"><i class="fas fa-dumbbell fa-2x"></i></div>
                        <div>
                            <h2 class="h5 fw-bold mb-0">Home Workout Pro</h2>
                            <small class="opacity-75">Functional Strength Protocol</small>
                        </div>
                    </div>
                    <p class="small mb-5 opacity-90">The definitive guide to building muscle and strength specifically tailored for the urban Indian environment.</p>
                    <a href="<?php echo SITE_URL; ?>topics/home-workouts" class="btn btn-light btn-sm rounded-pill px-4 py-2 fw-bold text-success shadow-xl mt-auto">Access Blueprint</a>
                </div>
            </div>
            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                <div class="card border-0 shadow-lg rounded-5 overflow-hidden text-white p-4 h-100" style="background: #0d9488 !important;">
                    <div class="d-flex align-items-center gap-4 mb-4">
                        <div class="bg-white p-3 rounded-circle" style="color: #0d9488 !important;"><i class="fas fa-brain fa-2x"></i></div>
                        <div>
                            <h2 class="h5 fw-bold mb-0">Mental Wellness Elite</h2>
                            <small class="opacity-75">Cognitive Excellence</small>
                        </div>
                    </div>
                    <p class="small mb-5 opacity-90">A masterclass in neuroplasticity and stress regulation for the modern Indian urbanite.</p>
                    <a href="<?php echo SITE_URL; ?>topics/mental-wellness" class="btn btn-light btn-sm rounded-pill px-4 py-2 fw-bold shadow-xl mt-auto" style="color: #0d9488 !important;">Access Protocol</a>
                </div>
            </div>
        </div>

        <div class="text-center mb-5" data-aos="fade-up">
            <h6 class="text-primary fw-bold text-uppercase mb-2">Transformative Challenges</h6>
            <h1 class="display-4 fw-bold">Online <span class="text-primary">Wellness Programs</span></h1>
            <p class="lead text-muted mx-auto" style="max-width: 700px;">Structured 21-day and 12-week challenges designed for deep metabolic transformation.</p>
        </div>

        <div class="row g-4">
            <!-- Program 1 -->
            <div class="col-lg-4" data-aos="fade-up">
                <div class="card border-0 shadow-sm rounded-4 overflow-hidden h-100">
                    <div class="position-relative">
                        <img src="assets/img/weight-loss.png" class="card-img-top" alt="Weight Loss Program">
                        <span class="badge bg-primary position-absolute top-0 end-0 m-3 rounded-pill">Best Seller</span>
                    </div>
                    <div class="card-body p-4">
                        <h4 class="fw-bold mb-3">21-Day Fat Loss Challenge</h4>
                        <p class="text-muted small mb-4">A comprehensive digital guide with meal plans, workout videos, and daily motivation tailored for the Indian body type.</p>
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <div>
                                <span class="h4 fw-bold text-primary">₹999</span>
                                <span class="text-muted text-decoration-line-through small ms-2">₹2,999</span>
                            </div>
                            <div class="text-warning">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                        </div>
                        <a href="#" class="btn btn-primary w-100 rounded-pill py-2 fw-bold">Enroll Now</a>
                    </div>
                </div>
            </div>

            <!-- Program 2 -->
            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                <div class="card border-0 shadow-sm rounded-4 overflow-hidden h-100">
                    <div class="position-relative">
                        <img src="assets/img/fitness.png" class="card-img-top" alt="Yoga Program">
                    </div>
                    <div class="card-body p-4">
                        <h4 class="fw-bold mb-3">Foundations of Yoga</h4>
                        <p class="text-muted small mb-4">Master the basics of Hatha and Vinyasa yoga. 12-week video series designed for complete beginners.</p>
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <div>
                                <span class="h4 fw-bold text-primary">₹1,499</span>
                                <span class="text-muted text-decoration-line-through small ms-2">₹3,499</span>
                            </div>
                            <div class="text-warning">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                        <a href="#" class="btn btn-outline-primary w-100 rounded-pill py-2 fw-bold">Enroll Now</a>
                    </div>
                </div>
            </div>

            <!-- Program 3 -->
            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                <div class="card border-0 shadow-sm rounded-4 overflow-hidden h-100">
                    <div class="position-relative">
                        <img src="assets/img/nutrition.png" class="card-img-top" alt="Nutrition Program">
                    </div>
                    <div class="card-body p-4">
                        <h4 class="fw-bold mb-3">Mindful Eating Masterclass</h4>
                        <p class="text-muted small mb-4">Transform your relationship with food. Learn the science of nutrition and the art of mindful Indian cooking.</p>
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <div>
                                <span class="h4 fw-bold text-primary">₹799</span>
                                <span class="text-muted text-decoration-line-through small ms-2">₹1,999</span>
                            </div>
                            <div class="text-warning">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                            </div>
                        </div>
                        <a href="#" class="btn btn-outline-primary w-100 rounded-pill py-2 fw-bold">Enroll Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5">
    <div class="container py-5">
        <div class="row align-items-center g-5">
            <div class="col-lg-6" data-aos="fade-right">
                <h2 class="display-5 fw-bold mb-4">Why Join Our <span class="text-primary">Programs?</span></h2>
                <div class="d-flex gap-4 mb-4">
                    <div class="bg-primary-light p-3 rounded-4" style="height: fit-content;">
                        <i class="fas fa-clock text-primary fa-2x"></i>
                    </div>
                    <div>
                        <h5 class="fw-bold">Lifetime Access</h5>
                        <p class="text-muted">Once you enroll, the content is yours forever. Learn at your own pace, anytime, anywhere.</p>
                    </div>
                </div>
                <div class="d-flex gap-4 mb-4">
                    <div class="bg-success-light p-3 rounded-4" style="height: fit-content;">
                        <i class="fas fa-certificate text-success fa-2x"></i>
                    </div>
                    <div>
                        <h5 class="fw-bold">Expert Certification</h5>
                        <p class="text-muted">Receive a digital certificate of completion verified by our lead nutritionists and trainers.</p>
                    </div>
                </div>
                <div class="d-flex gap-4">
                    <div class="bg-warning-light p-3 rounded-4" style="height: fit-content;">
                        <i class="fas fa-users text-warning fa-2x"></i>
                    </div>
                    <div>
                        <h5 class="fw-bold">Community Support</h5>
                        <p class="text-muted">Join our private Facebook and WhatsApp groups for peer support and expert Q&A sessions.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <img src="assets/img/mental-health.png" class="img-fluid rounded-5 shadow-lg" alt="Community">
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
