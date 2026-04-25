<?php
session_start();
$lang = isset($_GET['lang']) ? $_GET['lang'] : (isset($_SESSION['lang']) ? $_SESSION['lang'] : 'en');
$_SESSION['lang'] = $lang;

// Simple language array for demonstration
$texts = [
    'en' => ['home' => 'Home', 'clusters' => 'Clusters', 'services' => 'Find Services', 'programs' => 'Programs', 'find_pro' => 'Find a Pro'],
    'hi' => ['home' => 'होम', 'clusters' => 'क्लस्टर', 'services' => 'सेवाएं खोजें', 'programs' => 'कार्यक्रम', 'find_pro' => 'प्रो खोजें']
];
$t = $texts[$lang];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($page_title) ? $page_title . ' | HealthyLifeWellness.in' : 'HealthyLifeWellness.in - Your Guide to Health & Wellness'; ?></title>
    <meta name="description" content="<?php echo isset($meta_description) ? $meta_description : 'Targeting English and Hindi speaking Indians for practical health, yoga, and diet tips.'; ?>">
    
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="<?php echo SITE_URL; ?>assets/img/favicon.png?v=<?php echo time(); ?>">
    <link rel="apple-touch-icon" href="<?php echo SITE_URL; ?>assets/img/favicon.png">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?php echo SITE_URL; ?>assets/css/style.css">
    
    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>
<body>

<!-- Main Navigation -->
<nav class="navbar navbar-expand-lg sticky-top">
    <div class="container">
        <a class="navbar-brand" href="<?php echo SITE_URL; ?>">
            <img src="<?php echo SITE_URL; ?>assets/img/logo.png" alt="HealthyLifeWellness Logo">
        </a>
        
        <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-center">
                <li class="nav-item">
                    <a class="nav-link active" href="<?php echo SITE_URL; ?>"><?php echo $t['home']; ?></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
                        <?php echo $t['clusters']; ?> <i class="fas fa-chevron-down dropdown-icon"></i>
                    </a>
                    <ul class="dropdown-menu border-0 shadow">
                        <?php
                        $stmt = $pdo->query("SELECT * FROM categories");
                        $nav_cats = $stmt->fetchAll();
                        foreach($nav_cats as $nc):
                        ?>
                        <li><a class="dropdown-item" href="<?php echo SITE_URL; ?>category.php?slug=<?php echo $nc['slug']; ?>"><?php echo $nc['name']; ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo SITE_URL; ?>find-services"><?php echo $t['services']; ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo SITE_URL; ?>programs"><?php echo $t['programs']; ?></a>
                </li>
                <li class="nav-item ms-lg-3">
                    <a href="<?php echo SITE_URL; ?>find-services" class="btn btn-primary text-white shadow-sm"><?php echo $t['find_pro']; ?></a>
                </li>
                
                <!-- Language Toggle -->
                <li class="nav-item ms-lg-4">
                    <div class="lang-toggle-pill">
                        <a href="?lang=en" class="<?php echo $lang == 'en' ? 'active' : ''; ?>">EN</a>
                        <a href="?lang=hi" class="<?php echo $lang == 'hi' ? 'active' : ''; ?>">HI</a>
                        <div class="toggle-bg"></div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
