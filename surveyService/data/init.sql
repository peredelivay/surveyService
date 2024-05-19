CREATE DATABASE IF NOT EXISTS db;
USE db;

CREATE USER IF NOT EXISTS 'user'@'%' IDENTIFIED BY 'password';
GRANT ALL PRIVILEGES ON db.* TO 'user'@'%';
FLUSH PRIVILEGES;

CREATE TABLE IF NOT EXISTS surveys (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL
);

INSERT INTO surveys (title) VALUES
('1 Survey'),
('2 Survey');

CREATE TABLE IF NOT EXISTS questions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    survey_id INT NOT NULL,
    text TEXT NOT NULL,
    FOREIGN KEY (survey_id) REFERENCES surveys(id) ON DELETE CASCADE
);

INSERT INTO questions (survey_id, text) VALUES
(1, '1 Question'),
(1, '2 Question'),
(1, '3 Question'),
(2, '1 Question'),
(2, '2 Question'),
(2, '3 Question');

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username TEXT NOT NULL
);

CREATE TABLE IF NOT EXISTS responses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    question_id INT,
    username TEXT NOT NULL,
    response_text TEXT NOT NULL,
    FOREIGN KEY (question_id) REFERENCES questions(id) ON DELETE CASCADE
);
