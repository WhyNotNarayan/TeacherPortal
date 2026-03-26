-- database.sql
CREATE DATABASE IF NOT EXISTS teacher_portal CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE teacher_portal;

-- Users table (auth_user)
CREATE TABLE auth_user (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) UNIQUE NOT NULL,
    first_name VARCHAR(100) NOT NULL,
    last_name VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- Teachers table (1:1 relationship)
CREATE TABLE teachers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT UNIQUE NOT NULL,
    university_name VARCHAR(255) NOT NULL,
    gender ENUM('Male', 'Female', 'Other') NOT NULL,
    year_joined YEAR NOT NULL,
    FOREIGN KEY (user_id) REFERENCES auth_user(id) ON DELETE CASCADE
) ENGINE=InnoDB;

-- Index for faster JOINs
CREATE INDEX idx_user_email ON auth_user(email);