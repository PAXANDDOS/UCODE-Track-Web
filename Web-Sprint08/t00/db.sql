CREATE DATABASE ucode_web;

CREATE USER 'plitovka'@'localhost' IDENTIFIED BY 'securepass'; 
GRANT ALL ON ucode_web.* TO 'plitovka'@'localhost';