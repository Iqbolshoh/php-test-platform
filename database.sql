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
    url VARCHAR(255) NOT NULL,
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

CREATE TABLE IF NOT EXISTS matching (
    id INT PRIMARY KEY AUTO_INCREMENT,
    subject_id INT,
    left_side TEXT NOT NULL,
    right_side TEXT NOT NULL,
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

INSERT INTO
    subjects (user_id, title, description, url)
VALUES
    (
        1,
        'Mathematics',
        'Learn advanced mathematics including calculus, algebra, and geometry.',
        'mathematics'
    ),
    (
        1,
        'Physics',
        'Explore the fundamentals of physics, including mechanics, thermodynamics, and optics.',
        'physics'
    ),
    (
        1,
        'Computer Science',
        'Study programming, data structures, algorithms, and web development.',
        'computer-science'
    ),
    (
        1,
        'Chemistry',
        'Dive into organic, inorganic, and physical chemistry with hands-on experiments.',
        'chemistry'
    ),
    (
        1,
        'History',
        'Learn about world history from ancient civilizations to modern times.',
        'history'
    );

-- Inserting test questions into the 'test' table
INSERT INTO
    test (subject_id, question)
VALUES
    (1, 'What is the derivative of x^2?'),
    (2, 'What is Newtons Second Law of Motion?'),
    (
        3,
        'What is the time complexity of a binary search?'
    ),
    (4, 'What is the chemical formula of water?'),
    (
        5,
        'Who was the first president of the United States?'
    );

INSERT INTO
    test_options (test_id, option_text, is_correct)
VALUES
    (1, '2x', TRUE),
    (1, 'x^2', FALSE),
    (1, 'x', FALSE),
    (1, '1/x', FALSE),
    (2, 'F = ma', TRUE),
    (2, 'F = m/v', FALSE),
    (2, 'F = mv', FALSE),
    (2, 'F = m^2', FALSE),
    (3, 'O(log n)', TRUE),
    (3, 'O(n)', FALSE),
    (3, 'O(n^2)', FALSE),
    (3, 'O(1)', FALSE),
    (4, 'H2O', TRUE),
    (4, 'CO2', FALSE),
    (4, 'O2', FALSE),
    (4, 'CH4', FALSE),
    (5, 'George Washington', TRUE),
    (5, 'Abraham Lincoln', FALSE),
    (5, 'Thomas Jefferson', FALSE),
    (5, 'Franklin Pierce', FALSE);

INSERT INTO
    tru_false (subject_id, statement, is_true)
VALUES
    (
        1,
        'The sum of angles in a triangle is always 180 degrees.',
        TRUE
    ),
    (
        2,
        'Einstein developed the theory of relativity after Newton.',
        FALSE
    ),
    (
        3,
        'The binary search algorithm works on unsorted arrays.',
        FALSE
    ),
    (4, 'Water expands when it freezes.', TRUE),
    (
        5,
        'The Roman Empire was founded in 27 BC.',
        TRUE
    );

-- Inserting dropdown questions into the 'dropdown' table
INSERT INTO
    dropdown (subject_id, question, correct_answer)
VALUES
    (1, 'What is the integral of 1/x?', 'ln(x)'),
    (2, 'What is the unit of force?', 'Newton'),
    (
        3,
        'What is the main feature of object-oriented programming?',
        'Encapsulation'
    ),
    (
        4,
        'What is the symbol for gold in the periodic table?',
        'Au'
    ),
    (5, 'When did World War II end?', '1945');

-- Inserting fill-in-the-blank questions into the 'fill_in_the_blank' table
INSERT INTO
    fill_in_the_blank (subject_id, sentence, correct_answer)
VALUES
    (
        1,
        'The area of a circle is calculated using the formula ___.',
        'πr^2'
    ),
    (
        2,
        'Einstein\'s famous equation is E = ___.',
        'mc^2'
    ),
    (
        3,
        'The best programming language for web development is ___.',
        'JavaScript'
    ),
    (
        4,
        'The chemical element with the atomic number 6 is ___.',
        'Carbon'
    ),
    (
        5,
        'The Declaration of Independence was signed in the year ___.',
        '1776'
    );

-- Inserting matching questions into the 'matching' table
INSERT INTO
    matching (subject_id, left_side, right_side)
VALUES
    (1, 'Pythagoras Theorem', 'a^2 + b^2 = c^2'),
    (
        2,
        'Law of Inertia',
        'An object will remain at rest or in motion unless acted upon by an external force'
    ),
    (
        3,
        'Sorting Algorithm',
        'O(n log n) time complexity'
    ),
    (4, 'Element H', 'Hydrogen'),
    (5, 'Ancient Egypt', 'Pyramids');