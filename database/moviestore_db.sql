-- moviestore_db.sql

-- Drop existing tables if needed (safe for re-import)
DROP TABLE IF EXISTS user;
DROP TABLE IF EXISTS movies;

-- Create user table
CREATE TABLE user (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    isAdmin TINYINT(1) DEFAULT 0
);

-- Seed admin user (username: admin, password: admin1 hashed)
INSERT INTO user (username, password, isAdmin)
VALUES ('admin', '$2y$10$eNl6Ki8U4/ha/agwkISa7uJt1qR/MYiz/vuhtYfi68/HXCOTH.E7O', 1);

-- Create movies table
CREATE TABLE movies (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100) NOT NULL,
    genre VARCHAR(50),
    price DECIMAL(5,2),
    stock INT
);

-- Insert some movie data
INSERT INTO movies (title, genre, price, stock) VALUES
('Interstellar', 'Sci-Fi', 4.99, 10),
('The Dark Knight', 'Action', 3.99, 8),
('Inception', 'Thriller', 4.49, 12);
