<?php include 'config.php' ?>
<?php $query = new Database(); ?>
<?php $subjects = $query->select('subjects', '*') ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Tests - Test Platform</title>
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

        .subjects-list {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            justify-items: center;
        }

        .subject-card {
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

        .subject-card:hover {
            transform: translateY(-15px);
            box-shadow: 0 12px 25px rgba(0, 0, 0, 0.2);
        }

        .subject-card h3 {
            font-size: 2.2rem;
            color: #fff;
            margin-bottom: 1rem;
            text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.3);
        }

        .subject-card p {
            font-size: 1.4rem;
            color: #f7f7f7;
            margin-bottom: 2rem;
            opacity: 0.9;
        }

        .features {
            border-bottom-right-radius: 15px;
            border-bottom-left-radius: 15px;
            background: linear-gradient(135deg, #f39c12, #f39c12);
            color: white;
            animation: slideUpFade 1s ease forwards;
        }

        .call-to-action {
            border-top-right-radius: 15px;
            border-top-left-radius: 15px;
            background: linear-gradient(135deg, #34495e, #34495e);
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
            <h2 class="section__title">My Tests</h2>
            <p class="section__content"></p>
        </section>

        <br>

        <section class="section features">
            <p class="section__content">D</p>
        </section>

    </div>

    <section class="section subjects-list">
        <?php

        $delay = 0;

        foreach ($subjects as $subject): ?>
            <div class="subject-card" style="animation-delay: <?= $delay ?>s;">
                <h3><?= $subject['title'] ?></h3>
                <p><?= $subject['description'] ?></p>
                <a href="subject_detail.php?subjectid=<?= urlencode($subject['id']) ?>">
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