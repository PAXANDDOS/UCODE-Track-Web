USE ucode_web;

CREATE TABLE IF NOT EXISTS heroes(
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL UNIQUE,
    description TEXT NOT NULL,
    race VARCHAR(20) NOT NULL DEFAULT 'human',
    class_role ENUM('tankman', 'healer', 'dps') NOT NULL
);