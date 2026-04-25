CREATE DATABASE IF NOT EXISTS health_wellness_db;
USE health_wellness_db;

CREATE TABLE IF NOT EXISTS categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    slug VARCHAR(255) NOT NULL UNIQUE,
    description TEXT,
    image VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS posts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    category_id INT,
    title VARCHAR(255) NOT NULL,
    slug VARCHAR(255) NOT NULL UNIQUE,
    content LONGTEXT NOT NULL,
    image VARCHAR(255),
    language ENUM('en', 'hi') DEFAULT 'en',
    meta_title VARCHAR(255),
    meta_description TEXT,
    status ENUM('draft', 'published') DEFAULT 'published',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE SET NULL
);

CREATE TABLE IF NOT EXISTS services (
    id INT AUTO_INCREMENT PRIMARY KEY,
    type ENUM('gym', 'yoga', 'dietitian') NOT NULL,
    name VARCHAR(255) NOT NULL,
    city VARCHAR(100) NOT NULL,
    address TEXT,
    phone VARCHAR(20),
    image VARCHAR(255),
    rating DECIMAL(2,1) DEFAULT 0.0,
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS leads (
    id INT AUTO_INCREMENT PRIMARY KEY,
    service_id INT,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255),
    phone VARCHAR(20) NOT NULL,
    message TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (service_id) REFERENCES services(id) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS admins (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    last_login TIMESTAMP NULL
);

INSERT INTO admins (username, password) VALUES ('admin', 'password');

-- Seed Categories
INSERT INTO categories (name, slug, description) VALUES 
('Weight Management', 'weight-loss', 'Practical tips and diet plans for healthy weight management.'),
('Nutrition & Diet', 'diet-plans', 'Healthy recipes and nutrition guides tailored for Indian lifestyle.'),
('Fitness & Workouts', 'fitness', 'Home workouts, yoga, and gym guides.'),
('Mental Wellness', 'mental-health', 'Stress management and mindfulness techniques.'),
('Ayurveda', 'ayurveda', 'Ancient wisdom for modern wellness.');
