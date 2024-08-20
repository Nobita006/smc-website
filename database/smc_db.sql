CREATE DATABASE smc_db;
USE smc_db;

CREATE TABLE members (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(100) NOT NULL,
    surname VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    login_attempts INT DEFAULT 0,
    lock_time TIMESTAMP NULL DEFAULT NULL
);

CREATE TABLE safety_tips (
    id INT AUTO_INCREMENT PRIMARY KEY,
    tip TEXT NOT NULL,
    time_created TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE contacts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    message TEXT NOT NULL,
    submitted_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO `safety_tips` (`id`, `tip`, `time_created`) VALUES
(1, 'Always use strong passwords and never share them with anyone.', '2024-08-19 19:44:00'),
(2, 'Be cautious when clicking on links, especially in emails or messages from unknown sources.', '2024-08-19 19:44:00'),
(3, 'Keep your social media profiles private and review your privacy settings regularly.', '2024-08-19 19:44:00'),
(4, 'Never share personal information such as your address, phone number, or financial details online.', '2024-08-19 19:44:00'),
(6, 'Update your software regularly to protect against security vulnerabilities.', '2024-08-19 19:44:00'),
(7, 'Use two-factor authentication (2FA) whenever possible for an added layer of security.', '2024-08-19 19:44:00'),
(8, 'Avoid oversharing on social media, especially details about your daily routines.', '2024-08-19 19:44:00'),
(9, 'Report and block any suspicious or inappropriate users on social media platforms.', '2024-08-19 19:44:00'),
(10, 'Teach children about the dangers of interacting with strangers online.', '2024-08-19 19:44:00');
COMMIT;