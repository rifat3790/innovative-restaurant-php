CREATE DATABASE
IF NOT EXISTS innovative_solution;
USE innovative_solution;

CREATE TABLE `items`
(
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `recipe_name` VARCHAR
(255) NOT NULL,
    `category` VARCHAR
(255) NOT NULL,
    `price` DECIMAL
(10,2) NOT NULL,
    `details` TEXT NOT NULL
);

ALTER Table items ADD COLUMN image VARCHAR(255);

CREATE TABLE `users`
(
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR
(255) NOT NULL,
    `email` VARCHAR
(255) NOT NULL UNIQUE,
    `password` VARCHAR
(255) NOT NULL
);

USE innovative_solution;

CREATE TABLE
IF NOT EXISTS `users`
(
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR
(255) NOT NULL,
    `email` VARCHAR
(255) NOT NULL UNIQUE,
    `password` VARCHAR
(255) NOT NULL
);

SELECT * FROM users;