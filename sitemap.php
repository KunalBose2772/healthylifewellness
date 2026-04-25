<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
<?php
require_once 'includes/config.php';

// Base URL
$base = SITE_URL;

// 1. Static Pages
$static_pages = ['', 'blog', 'find-services', 'programs'];
foreach ($static_pages as $page) {
    echo "  <url>\n";
    echo "    <loc>" . $base . $page . "</loc>\n";
    echo "    <changefreq>weekly</changefreq>\n";
    echo "    <priority>1.0</priority>\n";
    echo "  </url>\n";
}

// 2. Categories
$stmt = $pdo->query("SELECT slug FROM categories");
while ($row = $stmt->fetch()) {
    echo "  <url>\n";
    echo "    <loc>" . $base . "category?slug=" . $row['slug'] . "</loc>\n";
    echo "    <changefreq>weekly</changefreq>\n";
    echo "    <priority>0.8</priority>\n";
    echo "  </url>\n";
}

// 3. Blog Posts
$stmt = $pdo->query("SELECT slug, created_at FROM posts WHERE status = 'published'");
while ($row = $stmt->fetch()) {
    echo "  <url>\n";
    echo "    <loc>" . $base . "post?slug=" . $row['slug'] . "</loc>\n";
    echo "    <lastmod>" . date('Y-m-d', strtotime($row['created_at'])) . "</lastmod>\n";
    echo "    <changefreq>monthly</changefreq>\n";
    echo "    <priority>0.7</priority>\n";
    echo "  </url>\n";
}

// 4. Topic Pillars
$topics = ['diet-plans', 'weight-loss', 'home-workouts', 'yoga', 'mental-health'];
foreach ($topics as $topic) {
    echo "  <url>\n";
    echo "    <loc>" . $base . "topics/" . $topic . "</loc>\n";
    echo "    <changefreq>monthly</changefreq>\n";
    echo "    <priority>0.9</priority>\n";
    echo "  </url>\n";
}

// 5. pSEO Location Pages (Diet Plans)
$stmt = $pdo->query("SELECT slug FROM cities");
$cities = $stmt->fetchAll();
foreach ($cities as $row) {
    echo "  <url>\n";
    echo "    <loc>" . $base . "topics/diet-plan-in-" . $row['slug'] . "</loc>\n";
    echo "    <changefreq>monthly</changefreq>\n";
    echo "    <priority>0.8</priority>\n";
    echo "  </url>\n";
    
    // Home Workouts
    echo "  <url>\n";
    echo "    <loc>" . $base . "topics/home-workout-in-" . $row['slug'] . "</loc>\n";
    echo "    <changefreq>monthly</changefreq>\n";
    echo "    <priority>0.8</priority>\n";
    echo "  </url>\n";

    // Mental Wellness
    echo "  <url>\n";
    echo "    <loc>" . $base . "topics/mental-wellness-in-" . $row['slug'] . "</loc>\n";
    echo "    <changefreq>monthly</changefreq>\n";
    echo "    <priority>0.8</priority>\n";
    echo "  </url>\n";
}
?>
</urlset>
