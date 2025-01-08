<?php include 'config.php' ?>
<?php $query = new Database(); ?>
<?php $lessons = $query->select('lessons', '*') ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lessons - Letter edu</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        .section {
            padding: 5rem 2rem;
            text-align: center;
        }

        .section__title {
            font-size: 3rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
            letter-spacing: -1.5px;
        }

        .section__content {
            font-size: 1.6rem;
            font-weight: 400;
            margin-bottom: 2.5rem;
            opacity: 0.9;
            letter-spacing: 0.5px;
        }

        .lessons-list {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            justify-items: center;
        }

        .lesson-card {
            background: linear-gradient(135deg, #6c5ce7, #a29bfe);
            padding: 2.5rem;
            border-radius: 15px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
            width: 300px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            overflow: hidden;
            color: white;
            position: relative;
            opacity: 0;
            animation: slideUpFade 1s ease forwards;
        }

        .lesson-card:hover {
            transform: translateY(-15px);
            box-shadow: 0 12px 25px rgba(0, 0, 0, 0.2);
        }

        .lesson-card h3 {
            font-size: 2.2rem;
            color: #fff;
            margin-bottom: 1rem;
            text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.3);
        }

        .lesson-card p {
            font-size: 1.4rem;
            color: #f7f7f7;
            margin-bottom: 2rem;
            opacity: 0.9;
        }

        .features {
            border-bottom-right-radius: 15px;
            border-bottom-left-radius: 15px;
            background: linear-gradient(135deg, #ff6b81, #ff9a9e);
            color: white;
            animation: slideUpFade 1s ease forwards;
        }

        .call-to-action {
            border-top-right-radius: 15px;
            border-top-left-radius: 15px;
            background: linear-gradient(135deg, #6c5ce7, #a29bfe);
            color: white;
            animation: slideUpFade 1s ease forwards;
        }

        .btn {
            font-size: 1.6rem;
            font-weight: 600;
            padding: 1rem 2.5rem;
            background-color: #ff6b81;
            color: white;
            border-radius: 50px;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
        }

        .btn:hover {
            background-color: #d65a71;
            transform: scale(1.05);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
        }

        @keyframes slideUpFade {
            0% {
                opacity: 0;
                transform: translateY(30px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @media (max-width: 768px) {
            .section__title {
                font-size: 2.5rem;
            }

            .section__content {
                font-size: 1.4rem;
            }
        }
    </style>
</head>

<body>
    <?php include 'includes/header.php' ?>
    <div class="container">

        <section class="section call-to-action">
            <h2 class="section__title">Our Lessons</h2>
            <p class="section__content">Explore our lessons designed to help you master the English language at every level. Choose a lesson below to get started!</p>
        </section>

        <br>

        <section class="section features">
            <p class="section__content">Discover our carefully crafted lessons designed to help you improve your English skills at every level, from beginner to advanced. Whether you're looking to build a solid foundation or enhance your fluency, we’ve got the perfect lesson for you. Start your journey below and unlock your potential to speak and write with confidence!</p>
        </section>

    </div>

    <section class="section lessons-list">
        <?php

        $delay = 0;

        foreach ($lessons as $lesson): ?>
            <div class="lesson-card" style="animation-delay: <?= $delay ?>s;">
                <h3><?= $lesson['title'] ?></h3>
                <p><?= $lesson['description'] ?></p>
                <a href="lesson_detail.php?lessonid=<?= urlencode($lesson['id']) ?>">
                    <button class="btn">Start Learning</button>
                </a>
            </div>
        <?php
            $delay += 0.3;
        endforeach;

        ?>
    </section>

    <?php include 'includes/footer.php' ?>
</body>

</html>