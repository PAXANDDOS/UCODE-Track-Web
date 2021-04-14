CREATE DATABASE marvel_heroes;

CREATE USER 'marvel'@'localhost' IDENTIFIED BY 'securepass'; 
GRANT ALL ON marvel_heroes.* TO 'marvel'@'localhost';

USE marvel_heroes;
CREATE TABLE IF NOT EXISTS users(
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL UNIQUE,
    name VARCHAR(20) NOT NULL,
    email VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(32) NOT NULL,
    avatar_name INT(2) UNSIGNED DEFAULT 1 NOT NULL,
    total_games INT(3) UNSIGNED DEFAULT 0 NOT NULL,
    total_wins INT(3) UNSIGNED DEFAULT 0 NOT NULL,
    total_loses INT(3) UNSIGNED  DEFAULT 0 NOT NULL,
    role ENUM('user', 'admin') DEFAULT 'user' NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;
