DROP DATABASE IF EXISTS test_platform;

CREATE DATABASE IF NOT EXISTS test_platform;

USE test_platform;

CREATE TABLE IF NOT EXISTS users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    first_name VARCHAR(30) NOT NULL,
    last_name VARCHAR(30) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    username VARCHAR(30) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    profile_picture VARCHAR(255) DEFAULT 'default.png',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS subjects (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT,
    title VARCHAR(100) NOT NULL,
    description VARCHAR(255) NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS test (
    id INT PRIMARY KEY AUTO_INCREMENT,
    subject_id INT,
    question TEXT NOT NULL,
    FOREIGN KEY (subject_id) REFERENCES subjects(id) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS test_options (
    id INT PRIMARY KEY AUTO_INCREMENT,
    test_id INT NOT NULL,
    option_text VARCHAR(255) NOT NULL,
    is_correct BOOLEAN DEFAULT FALSE,
    FOREIGN KEY (test_id) REFERENCES test(id) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS tru_false (
    id INT PRIMARY KEY AUTO_INCREMENT,
    subject_id INT,
    statement TEXT NOT NULL,
    is_true BOOLEAN NOT NULL,
    FOREIGN KEY (subject_id) REFERENCES subjects(id) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS dropdown (
    id INT PRIMARY KEY AUTO_INCREMENT,
    subject_id INT,
    question TEXT NOT NULL,
    correct_answer VARCHAR(255) NOT NULL,
    FOREIGN KEY (subject_id) REFERENCES subjects(id) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS fill_in_the_blank (
    id INT PRIMARY KEY AUTO_INCREMENT,
    subject_id INT,
    sentence TEXT NOT NULL,
    correct_answer VARCHAR(255) NOT NULL,
    FOREIGN KEY (subject_id) REFERENCES subjects(id) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS results (
    id INT PRIMARY KEY AUTO_INCREMENT,
    subject_id INT,
    participant_name VARCHAR(255) NOT NULL,
    total_questions INT NOT NULL,
    answered_questions INT NOT NULL,
    FOREIGN KEY (subject_id) REFERENCES subjects(id) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS questions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    subject_id INT,
    question_text TEXT NOT NULL,
    FOREIGN KEY (subject_id) REFERENCES subjects(id) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS answers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    question_id INT,
    answer_text VARCHAR(255) NOT NULL,
    FOREIGN KEY (question_id) REFERENCES questions(id)
);

-- Login: iqbolshoh
-- Password: 1
INSERT INTO
    users (
        first_name,
        last_name,
        email,
        username,
        password
    )
VALUES
    (
        'Iqbolshoh',
        'Ilhomjonov',
        'iilhomjonov777@gmail.com',
        'iqbolshoh',
        '65c2a32982abe41b1e6ff888d351ee6b7ade33affd4a595667ea7db910aecaa8'
    );

INSERT INTO subjects (user_id, title, description) 
VALUES
(1, 'Mathematics', 'Learn advanced mathematics including calculus, algebra, and geometry.'),
(1, 'Physics', 'Explore the fundamentals of physics, including mechanics, thermodynamics, and optics.'),
(1, 'Computer Science', 'Study programming, data structures, algorithms, and web development.'),
(1, 'Chemistry', 'Dive into organic, inorganic, and physical chemistry with hands-on experiments.'),
(1, 'History', 'Learn about world history from ancient civilizations to modern times.');
