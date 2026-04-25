<?php
session_start();
require_once '../includes/config.php';

// Redirect if already logged in
if (isset($_SESSION['admin_id'])) {
    header("Location: dashboard.php");
    exit();
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM admins WHERE username = ?");
    $stmt->execute([$username]);
    $admin = $stmt->fetch();

    if ($admin && $password === $admin['password']) { // In production use password_verify
        $_SESSION['admin_id'] = $admin['id'];
        $_SESSION['admin_username'] = $admin['username'];
        
        // Update last login
        $pdo->prepare("UPDATE admins SET last_login = NOW() WHERE id = ?")->execute([$admin['id']]);
        
        header("Location: dashboard.php");
        exit();
    } else {
        $error = 'Invalid username or password.';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Portal | HealthyLifeWellness</title>
    
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="../favicon.png">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;600;800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        :root {
            --primary-color: #2ecc71;
            --dark-color: #1e293b;
        }
        
        body, html {
            height: 100%;
            margin: 0;
            font-family: 'Inter', sans-serif;
            overflow: hidden;
        }
        
        .login-container {
            display: flex;
            height: 100vh;
        }
        
        /* Left Side: Form */
        .login-form-side {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 60px;
            background: #fff;
            z-index: 2;
        }
        
        .form-wrapper {
            width: 100%;
            max-width: 400px;
        }
        
        .brand-logo {
            height: 60px;
            margin-bottom: 40px;
        }
        
        .login-header h1 {
            font-family: 'Outfit', sans-serif;
            font-weight: 800;
            font-size: 2rem;
            color: var(--dark-color);
            margin-bottom: 10px;
        }
        
        .login-header p {
            color: #64748b;
            margin-bottom: 40px;
        }
        
        .form-label {
            font-weight: 600;
            font-size: 0.85rem;
            color: #475569;
            margin-bottom: 8px;
        }
        
        .form-control {
            padding: 12px 18px;
            border-radius: 12px;
            border: 1px solid #e2e8f0;
            background: #f8fafc;
            transition: all 0.3s ease;
        }
        
        .form-control:focus {
            background: #fff;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 4px rgba(46, 204, 113, 0.1);
        }
        
        .password-field {
            position: relative;
        }
        
        .password-toggle {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #94a3b8;
            transition: color 0.3s ease;
        }
        
        .password-toggle:hover {
            color: var(--primary-color);
        }
        
        .btn-login {
            background: linear-gradient(135deg, #2ecc71, #27ae60);
            border: none;
            padding: 14px;
            border-radius: 12px;
            color: #fff;
            font-weight: 700;
            width: 100%;
            margin-top: 20px;
            box-shadow: 0 10px 20px rgba(46, 204, 113, 0.2);
            transition: all 0.3s ease;
        }
        
        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 30px rgba(46, 204, 113, 0.3);
            color: #fff;
        }
        
        /* Right Side: Image/Text */
        .login-visual-side {
            flex: 1.2;
            background: url('../assets/img/login-bg.png') no-repeat center center;
            background-size: cover;
            position: relative;
            display: flex;
            align-items: flex-end;
            padding: 80px;
        }
        
        .login-visual-side::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to top, rgba(0,0,0,0.8) 0%, rgba(0,0,0,0.2) 60%, rgba(0,0,0,0) 100%);
        }
        
        .visual-content {
            position: relative;
            z-index: 1;
            color: #fff;
        }
        
        .visual-content h2 {
            font-family: 'Outfit', sans-serif;
            font-weight: 800;
            font-size: 3rem;
            margin-bottom: 20px;
            line-height: 1.1;
        }
        
        .visual-content p {
            font-size: 1.1rem;
            opacity: 0.9;
            max-width: 500px;
        }
        
        .error-toast {
            background: #fee2e2;
            color: #b91c1c;
            padding: 12px 20px;
            border-radius: 10px;
            font-size: 0.9rem;
            margin-bottom: 25px;
            border-left: 4px solid #ef4444;
        }
        
        @media (max-width: 991px) {
            .login-visual-side {
                display: none;
            }
        }
    </style>
</head>
<body>

    <div class="login-container">
        <!-- Form Side -->
        <div class="login-form-side">
            <div class="form-wrapper">
                <a href="../index.php">
                    <img src="../assets/img/logo.png" alt="Logo" class="brand-logo">
                </a>
                
                <div class="login-header">
                    <h1>Welcome Back</h1>
                    <p>Enter your credentials to access the command center.</p>
                </div>
                
                <?php if ($error): ?>
                    <div class="error-toast">
                        <i class="fas fa-exclamation-circle me-2"></i> <?php echo $error; ?>
                    </div>
                <?php endif; ?>
                
                <form action="" method="POST">
                    <div class="mb-4">
                        <label class="form-label">Username</label>
                        <div class="input-group">
                            <span class="input-group-text bg-transparent border-end-0 border-slate-200" style="border-radius: 12px 0 0 12px;">
                                <i class="far fa-user text-muted"></i>
                            </span>
                            <input type="text" name="username" class="form-control border-start-0" placeholder="admin" style="border-radius: 0 12px 12px 0;" required>
                        </div>
                    </div>
                    
                    <div class="mb-4">
                        <label class="form-label">Password</label>
                        <div class="password-field">
                            <div class="input-group">
                                <span class="input-group-text bg-transparent border-end-0" style="border-radius: 12px 0 0 12px;">
                                    <i class="fas fa-lock text-muted"></i>
                                </span>
                                <input type="password" name="password" id="passwordInput" class="form-control border-start-0" placeholder="••••••••" style="border-radius: 0 12px 12px 0;" required>
                            </div>
                            <span class="password-toggle" onclick="togglePassword()">
                                <i class="far fa-eye" id="toggleIcon"></i>
                            </span>
                        </div>
                    </div>
                    
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="remember">
                            <label class="form-check-label small text-muted" for="remember">Remember me</label>
                        </div>
                        <a href="#" class="small text-primary text-decoration-none fw-bold">Forgot password?</a>
                    </div>
                    
                    <button type="submit" class="btn btn-login">Login to Dashboard</button>
                </form>
                
                <p class="text-center mt-5 small text-muted">
                    &copy; 2026 HealthyLifeWellness Admin System
                </p>
            </div>
        </div>
        
        <!-- Visual Side -->
        <div class="login-visual-side">
            <div class="visual-content">
                <div class="badge bg-primary px-3 py-2 mb-4 rounded-pill">ADMIN PORTAL</div>
                <h2>Empowering <br> <span class="text-primary">Healthy</span> Living.</h2>
                <p>Manage your health platform with ease. Monitor analytics, update content, and engage with your community from one central hub.</p>
            </div>
        </div>
    </div>

    <script>
        function togglePassword() {
            const input = document.getElementById('passwordInput');
            const icon = document.getElementById('toggleIcon');
            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.replace('far', 'fas');
                icon.classList.replace('fa-eye', 'fa-eye-slash');
            } else {
                input.type = 'password';
                icon.classList.replace('fas', 'far');
                icon.classList.replace('fa-eye-slash', 'fa-eye');
            }
        }
    </script>

</body>
</html>
