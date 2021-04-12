CREATE DATABASE cardgame;

CREATE USER 'marvel'@'localhost' IDENTIFIED BY 'securepass'; 
GRANT ALL ON cardgame.* TO 'marvel'@'localhost';

USE cardgame;
CREATE TABLE IF NOT EXISTS users(
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL UNIQUE,
    name VARCHAR(20) NOT NULL,
    email VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(32) NOT NULL,
    role ENUM('user', 'admin') DEFAULT 'user' NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
