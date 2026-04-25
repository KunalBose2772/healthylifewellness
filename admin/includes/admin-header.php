<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['admin_id'])) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($page_title) ? $page_title : 'Admin Panel'; ?> | HealthyLife</title>
    
    <link rel="icon" type="image/png" href="../favicon.png">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@300;400;500;600;700&family=Outfit:wght@500;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        :root {
            --primary-color: #2ecc71;
            --sidebar-bg: #002366;
            --topbar-height: 70px;
            --sidebar-width: 260px;
            --bg-body: #f1f5f9;
        }
        
        body {
            background-color: var(--bg-body);
            font-family: 'Jost', sans-serif;
            color: #334155;
            margin: 0;
            overflow-x: hidden;
        }

        .sidebar {
            width: var(--sidebar-width);
            height: 100vh;
            background: var(--sidebar-bg);
            position: fixed;
            left: 0;
            top: 0;
            z-index: 1050;
            transition: all 0.3s ease;
        }

        .logo-section {
            background: #ffffff;
            height: 100px;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 10px 25px;
            margin-bottom: 20px;
        }

        .logo-section img {
            width: 100%;
            height: auto;
            max-height: 60px;
            object-fit: contain;
        }

        .nav-label {
            color: rgba(255,255,255,0.4);
            font-size: 0.7rem;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            padding: 10px 25px;
            margin-top: 15px;
        }

        .nav-link {
            color: #ffffff !important;
            padding: 12px 25px;
            border-radius: 50px;
            margin: 0 15px 8px 15px;
            font-weight: 400;
            font-size: 0.88rem;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            opacity: 0.8;
            text-decoration: none;
        }

        .nav-link i {
            width: 24px;
            margin-right: 12px;
            opacity: 0.7;
        }

        .nav-link:hover {
            background: rgba(255,255,255,0.1);
            opacity: 1;
        }

        .nav-link.active {
            background: #ffffff !important;
            color: var(--sidebar-bg) !important;
            font-weight: 600;
            opacity: 1;
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }

        .nav-link.active i { color: var(--sidebar-bg); opacity: 1; }

        .topbar {
            position: fixed;
            top: 0;
            right: 0;
            left: var(--sidebar-width);
            height: var(--topbar-height);
            background: #ffffff;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 30px;
            z-index: 1000;
            transition: all 0.3s ease;
            box-shadow: 0 2px 10px rgba(0,0,0,0.02);
        }

        .mobile-toggle { display: none; cursor: pointer; font-size: 1.2rem; color: var(--sidebar-bg); }

        .main-content {
            margin-left: var(--sidebar-width);
            margin-top: var(--topbar-height);
            padding: 30px;
            transition: all 0.3s ease;
        }

        /* Forms & Cards */
        .admin-card {
            background: #ffffff;
            border: none;
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.02);
        }

        .form-label { font-weight: 600; font-size: 0.85rem; color: #475569; margin-bottom: 8px; }
        .form-control, .form-select {
            padding: 12px 18px;
            border-radius: 12px;
            border: 1px solid #e2e8f0;
            background: #f8fafc;
            font-size: 0.9rem;
        }
        .form-control:focus {
            background: #fff;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 4px rgba(46, 204, 113, 0.1);
        }

        @media (max-width: 991px) {
            .sidebar { left: -var(--sidebar-width); }
            .sidebar.active { left: 0; }
            .topbar { left: 0; padding: 0 20px; }
            .main-content { margin-left: 0; padding: 20px; }
            .mobile-toggle { display: block; }
            .sidebar-overlay {
                display: none;
                position: fixed;
                top: 0; left: 0; right: 0; bottom: 0;
                background: rgba(0,0,0,0.5);
                z-index: 1040;
            }
            .sidebar-overlay.active { display: block; }
        }
    </style>
</head>
<body>

    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <aside class="sidebar" id="sidebar">
        <div class="logo-section">
            <a href="../index.php">
                <img src="../assets/img/logo.png" alt="HealthyLife">
            </a>
        </div>

        <div class="nav-label">Main</div>
        <a href="dashboard.php" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'dashboard.php' ? 'active' : ''; ?>">
            <i class="fas fa-th-large"></i> Dashboard
        </a>
        <a href="manage-posts.php" class="nav-link <?php echo strpos(basename($_SERVER['PHP_SELF']), 'post') !== false ? 'active' : ''; ?>">
            <i class="fas fa-file-alt"></i> Articles
        </a>
        <a href="manage-categories.php" class="nav-link <?php echo strpos(basename($_SERVER['PHP_SELF']), 'categor') !== false ? 'active' : ''; ?>">
            <i class="fas fa-list-ul"></i> Clusters
        </a>

        <div class="nav-label">CRM</div>
        <a href="manage-services.php" class="nav-link <?php echo strpos(basename($_SERVER['PHP_SELF']), 'service') !== false ? 'active' : ''; ?>">
            <i class="fas fa-user-md"></i> Partners
        </a>
        <a href="leads.php" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'leads.php' ? 'active' : ''; ?>">
            <i class="fas fa-headset"></i> Inquiries
        </a>
        
        <div class="mt-auto p-3">
            <a href="logout.php" class="nav-link text-white bg-danger border-0">
                <i class="fas fa-sign-out-alt"></i> Sign Out
            </a>
        </div>
    </aside>

    <div style="flex-grow: 1; min-width: 0;">
        <header class="topbar">
            <div class="d-flex align-items-center gap-3">
                <div class="mobile-toggle" id="mobileToggle">
                    <i class="fas fa-bars"></i>
                </div>
                <div class="welcome-msg">
                    <h1 class="h6 fw-bold m-0"><?php echo isset($page_title) ? $page_title : 'Dashboard'; ?></h1>
                    <p class="small text-muted m-0">Administrator Access</p>
                </div>
            </div>

            <div class="dropdown">
                <div class="btn btn-light rounded-pill px-3 py-1 d-flex align-items-center gap-2 border" data-bs-toggle="dropdown">
                    <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 25px; height: 25px; font-size: 0.7rem;">
                        <?php echo strtoupper(substr($_SESSION['admin_username'], 0, 1)); ?>
                    </div>
                    <span class="small fw-bold">Admin</span>
                    <i class="fas fa-chevron-down opacity-50" style="font-size: 0.7rem;"></i>
                </div>
                <ul class="dropdown-menu dropdown-menu-end border-0 shadow mt-3 rounded-3">
                    <li><a class="dropdown-item py-2 small" href="logout.php"><i class="fas fa-sign-out-alt me-2 text-danger"></i> Logout</a></li>
                </ul>
            </div>
        </header>

        <main class="main-content">
