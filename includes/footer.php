<footer class="footer py-5 mt-5">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-4">
                <a class="navbar-brand mb-4 d-block" href="<?php echo SITE_URL; ?>index.php">
                    <img src="<?php echo SITE_URL; ?>assets/img/logo.png" alt="HealthyLifeWellness Logo" height="100">
                </a>
                <p class="text-muted">Empowering your journey to a healthier, happier life through practical wellness advice, expert guidance, and community support in India.</p>
                <div class="social-links mt-4">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
            <div class="col-lg-2 col-md-4">
                <h5 class="mb-4">Quick Links</h5>
                <ul class="list-unstyled">
                    <li><a href="<?php echo SITE_URL; ?>">Home</a></li>
                    <?php
                    $stmt = $pdo->query("SELECT * FROM categories LIMIT 3");
                    $footer_cats = $stmt->fetchAll();
                    foreach($footer_cats as $fc):
                    ?>
                    <li><a href="<?php echo SITE_URL; ?>category.php?slug=<?php echo $fc['slug']; ?>"><?php echo $fc['name']; ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="col-lg-2 col-md-4">
                <h5 class="mb-4">Resources</h5>
                <ul class="list-unstyled">
                    <li><a href="programs.php">Online Courses</a></li>
                    <li><a href="#">Health Tools</a></li>
                    <li><a href="#">Success Stories</a></li>
                    <li><a href="#">Affiliate Shop</a></li>
                </ul>
            </div>
            <div class="col-lg-4">
                <h5 class="mb-4">Join Our Newsletter</h5>
                <p class="text-muted">Get weekly wellness tips delivered to your inbox.</p>
                <form class="newsletter-form mt-3">
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" placeholder="Email Address" required>
                        <button class="btn btn-primary" type="submit">Subscribe</button>
                    </div>
                </form>
            </div>
        </div>
        <hr class="my-5">
        <div class="row align-items-center">
            <div class="col-md-4 text-center text-md-start">
                <p class="mb-0 text-muted">&copy; 2026 HealthyLifeWellness.in. All rights reserved.</p>
            </div>
            <div class="col-md-4 text-center">
                <div class="developer-badge d-inline-block px-3 py-1 rounded-pill bg-light border">
                    <span class="text-muted small">Designed & Developed by</span>
                    <a href="https://builtbykunal.online" target="_blank" class="fw-bold text-primary text-decoration-none small ms-1">Kunal Bose</a>
                </div>
            </div>
            <div class="col-md-4 text-center text-md-end">
                <ul class="list-inline mb-0 footer-bottom-links">
                    <li class="list-inline-item"><a href="#">Privacy Policy</a></li>
                    <li class="list-inline-item"><a href="#">Terms of Use</a></li>
                    <li class="list-inline-item"><a href="#">Sitemap</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>

<!-- Lead Generation Modal -->
<div class="modal fade" id="leadModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 rounded-4 shadow-lg">
            <div class="modal-header border-0 pb-0">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-5 pt-0">
                <div class="text-center mb-4">
                    <div class="bg-primary-subtle text-primary p-3 rounded-circle d-inline-flex mb-3"><i class="fas fa-user-md fa-2x"></i></div>
                    <h4 class="fw-bold">Consult an Expert</h4>
                    <p class="text-muted small">Fill out the form below and our certified nutritionist will contact you within 24 hours.</p>
                </div>
                <form action="<?php echo SITE_URL; ?>process-lead.php" method="POST">
                    <div class="mb-3">
                        <label class="form-label small fw-bold">Full Name</label>
                        <input type="text" name="name" class="form-control rounded-pill px-4 py-2" placeholder="Enter your name" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-bold">Phone Number</label>
                        <input type="tel" name="phone" class="form-control rounded-pill px-4 py-2" placeholder="e.g., +91 9876543210" required>
                    </div>
                    <div class="mb-4">
                        <label class="form-label small fw-bold">Goal</label>
                        <select name="goal" class="form-select rounded-pill px-4 py-2">
                            <option>Weight Loss</option>
                            <option>Muscle Gain</option>
                            <option>Health Management (PCOS/Diabetes)</option>
                            <option>General Wellness</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary w-100 rounded-pill py-3 fw-bold shadow">Submit Inquiry</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap 5 JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- AOS Animation -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<!-- Custom JS -->
<script src="assets/js/main.js"></script>

<script>
  AOS.init({
    duration: 1000,
    once: true,
  });
</script>

</body>
</html>
