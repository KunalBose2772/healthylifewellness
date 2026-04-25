<?php 
require_once 'includes/config.php';
$page_title = 'Find Wellness Professionals';
include 'includes/header.php'; 

// Mock cities for India
$cities = ['Patna', 'Delhi', 'Mumbai', 'Bangalore', 'Chennai', 'Kolkata', 'Pune', 'Hyderabad'];
$selected_city = isset($_GET['city']) ? $_GET['city'] : 'Patna';
$selected_type = isset($_GET['type']) ? $_GET['type'] : 'gym';

// Fetch listings from DB
$listings = [];
if ($pdo) {
    $stmt = $pdo->prepare("SELECT * FROM services WHERE type = ? AND city = ? ORDER BY rating DESC");
    $stmt->execute([$selected_type, $selected_city]);
    $listings = $stmt->fetchAll();
}
?>

<section class="bg-light py-5">
    <div class="container py-5">
        <div class="text-center mb-5" data-aos="fade-up">
            <h1 class="display-4 fw-bold">Find Local <span class="text-primary">Wellness Pros</span></h1>
            <p class="lead text-muted">Connecting you with the best gyms, yoga studios, and dietitians across India.</p>
        </div>

        <div class="card border-0 shadow-sm rounded-4 p-4 mb-5" data-aos="fade-up">
            <form action="" method="GET" class="row g-3 align-items-end">
                <div class="col-md-4">
                    <label class="form-label fw-bold">I am looking for</label>
                    <select name="type" class="form-select rounded-pill">
                        <option value="gym" <?php echo $selected_type == 'gym' ? 'selected' : ''; ?>>Gym / Fitness Center</option>
                        <option value="yoga" <?php echo $selected_type == 'yoga' ? 'selected' : ''; ?>>Yoga Studio / Trainer</option>
                        <option value="dietitian" <?php echo $selected_type == 'dietitian' ? 'selected' : ''; ?>>Dietitian / Nutritionist</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-bold">In City</label>
                    <select name="city" class="form-select rounded-pill">
                        <?php foreach($cities as $city): ?>
                        <option value="<?php echo $city; ?>" <?php echo $selected_city == $city ? 'selected' : ''; ?>><?php echo $city; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-md-4">
                    <button type="submit" class="btn btn-primary w-100 rounded-pill py-2">Search Pros</button>
                </div>
            </form>
        </div>

        <div class="row g-4">
            <?php if (count($listings) > 0): ?>
                <?php foreach($listings as $item): ?>
                <div class="col-md-4" data-aos="fade-up">
                    <div class="card border-0 shadow-sm rounded-4 overflow-hidden h-100">
                        <div class="position-relative">
                            <img src="<?php echo !empty($item['image']) ? $item['image'] : 'assets/img/fitness.png'; ?>" class="card-img-top" alt="<?php echo $item['name']; ?>" style="height: 200px; object-fit: cover;">
                            <span class="badge bg-white text-dark position-absolute top-0 end-0 m-3 rounded-pill shadow-sm">
                                <i class="fas fa-star text-warning"></i> <?php echo $item['rating']; ?>
                            </span>
                        </div>
                        <div class="card-body p-4">
                            <div class="mb-2 text-uppercase small fw-bold text-primary"><?php echo $item['type']; ?> • <?php echo $item['city']; ?></div>
                            <h5 class="card-title fw-bold mb-3"><?php echo $item['name']; ?></h5>
                            <p class="card-text text-muted small mb-4"><?php echo $item['description']; ?></p>
                            <button class="btn btn-outline-primary w-100 rounded-pill" data-bs-toggle="modal" data-bs-target="#leadModal" onclick="setServiceId(<?php echo $item['id']; ?>)">Get Free Quote</button>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12 text-center py-5">
                    <div class="mb-4">
                        <i class="fas fa-search fa-4x text-muted opacity-25"></i>
                    </div>
                    <h3>No professionals found in <?php echo $selected_city; ?> yet.</h3>
                    <p class="text-muted">We are expanding rapidly! Check back soon or try another city.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Lead Modal -->
<div class="modal fade" id="leadModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 rounded-4 shadow">
            <div class="modal-header border-0 pb-0">
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body pt-0">
                <div class="text-center mb-4">
                    <div class="modal-icon-wrapper">
                        <i class="fas fa-user-check text-primary fa-2x"></i>
                    </div>
                    <h3 class="mb-2">Get a Free Quote</h3>
                    <p class="text-muted small">Expert partners will reach out with personalized plans.</p>
                </div>
                <form action="submit-lead.php" method="POST">
                    <input type="hidden" name="service_id" id="service_id_input">
                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label small fw-bold">Full Name</label>
                            <input type="text" class="form-control rounded-pill" placeholder="John Doe" required>
                        </div>
                        <div class="col-12">
                            <label class="form-label small fw-bold">Phone Number</label>
                            <input type="tel" class="form-control rounded-pill" placeholder="+91 XXXXX XXXXX" required>
                        </div>
                        <div class="col-12">
                            <label class="form-label small fw-bold">Query / Details</label>
                            <textarea class="form-control rounded-4" rows="2" placeholder="Tell us what you're looking for..."></textarea>
                        </div>
                        <div class="col-12 mt-4">
                            <button type="submit" class="btn btn-primary w-100 rounded-pill py-3 fw-bold">Send My Inquiry</button>
                            <p class="text-center small text-muted mt-3 mb-0">Your data is safe with us.</p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
function setServiceId(id) {
    document.getElementById('service_id_input').value = id;
}
</script>

<?php include 'includes/footer.php'; ?>
