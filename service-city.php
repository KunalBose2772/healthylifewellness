<?php
require_once 'includes/config.php';

$service_slug = isset($_GET['service']) ? $_GET['service'] : '';
$city_slug = isset($_GET['city']) ? $_GET['city'] : '';

// Fetch Service Type and City
$service = $pdo->prepare("SELECT * FROM service_types WHERE slug = ?");
$service->execute([$service_slug]);
$service_data = $service->fetch();

$city = $pdo->prepare("SELECT * FROM cities WHERE slug = ?");
$city->execute([$city_slug]);
$city_data = $city->fetch();

if (!$service_data || !$city_data) {
    header("Location: index.php");
    exit();
}

$page_title = "Best " . $service_data['name'] . " in " . $city_data['name'] . " (2026 Reviews)";
include 'includes/header.php';
?>

<!-- Hero Section -->
<div class="category-header py-5 mb-5" style="background: linear-gradient(135deg, #002366 0%, #004ecc 100%);">
    <div class="container text-white py-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-3">
                <li class="breadcrumb-item"><a href="index.php" class="text-white opacity-75">Home</a></li>
                <li class="breadcrumb-item"><a href="find-services.php" class="text-white opacity-75">Services</a></li>
                <li class="breadcrumb-item active text-white" aria-current="page"><?php echo $city_data['name']; ?></li>
            </ol>
        </nav>
        <h1 class="display-4 fw-bold mb-3"><?php echo $page_title; ?></h1>
        <p class="lead opacity-75">Looking for the top-rated <?php echo strtolower($service_data['name']); ?> in <?php echo $city_data['name']; ?>? We've vetted the best professionals to help you reach your goals.</p>
    </div>
</div>

<div class="container mb-5">
    <div class="row">
        <div class="col-lg-8">
            <!-- Local Content Block (Crucial for Ranking) -->
            <div class="admin-card p-4 mb-5 border-0 shadow-sm bg-white rounded-4">
                <h2 class="h4 fw-bold mb-3">How to choose the right <?php echo strtolower($service_data['name']); ?> in <?php echo $city_data['name']; ?>?</h2>
                <p class="text-muted">Choosing a wellness professional in a city as vibrant as <?php echo $city_data['name']; ?> can be overwhelming. Whether you are a beginner or looking for advanced coaching, it is important to check for certifications, local reviews, and proximity to your location.</p>
                <div class="alert alert-info rounded-3 border-0 py-2 px-3 small">
                    <i class="fas fa-info-circle me-2"></i> <strong>Pro Tip:</strong> Most centers in <?php echo $city_data['name']; ?> offer a free trial session. Always ask before signing up!
                </div>
            </div>

            <h3 class="fw-bold mb-4">Top Verified <?php echo $service_data['name']; ?> Centers</h3>
            
            <?php
            // Fetch pros matching type and city
            $pros = $pdo->prepare("SELECT * FROM services WHERE type = ? AND city = ? AND status = 'approved' ORDER BY rating DESC");
            $pros->execute([$service_slug, $city_data['name']]);
            $pros_list = $pros->fetchAll();
            
            if ($pros_list):
                foreach($pros_list as $pro):
            ?>
            <div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-4 hover-lift">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="assets/img/service-placeholder.png" class="img-fluid h-100 w-100" style="object-fit: cover;" alt="<?php echo $pro['name']; ?>">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body p-4">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <h4 class="h5 fw-bold mb-1"><?php echo $pro['name']; ?></h4>
                                    <p class="small text-muted mb-2"><i class="fas fa-map-marker-alt me-1 text-primary"></i> <?php echo $city_data['name']; ?>, India</p>
                                </div>
                                <span class="badge bg-success-light text-success rounded-pill px-3 py-1 small">Verified</span>
                            </div>
                            <p class="text-muted small mb-4"><?php echo substr($pro['description'], 0, 120); ?>...</p>
                            <div class="d-flex gap-2">
                                <button class="btn btn-primary rounded-pill px-4 btn-sm" data-bs-toggle="modal" data-bs-target="#leadModal">Contact Now</button>
                                <a href="#" class="btn btn-outline-light text-dark border rounded-pill px-4 btn-sm">View Details</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; else: ?>
                <div class="text-center py-5">
                    <p class="text-muted">We are currently verifying more partners in <?php echo $city_data['name']; ?>. Check back soon!</p>
                </div>
            <?php endif; ?>

            <!-- FAQ Section for Local SEO -->
            <div class="mt-5 p-4 rounded-4 bg-light">
                <h4 class="fw-bold mb-3">Frequently Asked Questions</h4>
                <div class="accordion accordion-flush" id="localFaq">
                    <div class="accordion-item bg-transparent">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed fw-bold bg-transparent" type="button" data-bs-toggle="collapse" data-bs-target="#lfaq1">
                                What is the average cost of <?php echo strtolower($service_data['name']); ?> in <?php echo $city_data['name']; ?>?
                            </button>
                        </h2>
                        <div id="lfaq1" class="accordion-collapse collapse" data-bs-parent="#localFaq">
                            <div class="accordion-body text-muted small">
                                Costs vary depending on the facility and expertise, but generally, you can expect to pay between ₹2,000 to ₹5,000 per month for premium services in <?php echo $city_data['name']; ?>.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="col-lg-4">
            <div class="sticky-top" style="top: 100px;">
                <div class="card border-0 shadow-sm rounded-4 p-4 mb-4">
                    <h5 class="fw-bold mb-3">Explore Other Cities</h5>
                    <div class="d-flex flex-wrap gap-2">
                        <?php
                        $cities = $pdo->query("SELECT * FROM cities LIMIT 10");
                        foreach($cities->fetchAll() as $c):
                        ?>
                        <a href="service-city.php?service=<?php echo $service_slug; ?>&city=<?php echo $c['slug']; ?>" class="btn btn-sm btn-light border rounded-pill <?php echo $c['slug'] == $city_slug ? 'active' : ''; ?>">
                            <?php echo $c['name']; ?>
                        </a>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- Lead Sidebar -->
                <div class="card border-0 shadow-sm rounded-4 p-4 bg-primary text-white">
                    <h5 class="fw-bold mb-3">Need personalized help?</h5>
                    <p class="small opacity-75 mb-4">Our experts can help you find the perfect <?php echo strtolower($service_data['name']); ?> near you.</p>
                    <button class="btn btn-white w-100 rounded-pill fw-bold py-2" data-bs-toggle="modal" data-bs-target="#leadModal">Get Free Consultation</button>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
