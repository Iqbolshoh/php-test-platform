<?php
include './config.php';
$query = new Database();
$subjects = $query->select('subjects', '*');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Tests - Test Platform</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        .section {
            padding: 40px 15px;
            text-align: center;
        }

        .section__title {
            font-size: 36px;
            font-weight: 600;
            margin-bottom: 24px;
        }

        .section__content {
            font-size: 18px;
            font-weight: 400;
            margin-bottom: 30px;
            opacity: 0.9;
            letter-spacing: 0.5px;
        }

        .call-to-action {
            border-top-right-radius: 10px;
            border-top-left-radius: 10px;
            background: linear-gradient(135deg, #2c3e50, #0f3e5c);
            color: white;
            animation: slideUpFade 1s ease forwards;
        }

        .subjects-list {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
            gap: 1.5rem;
            justify-items: center;
            padding: 20px 0;
        }

        .subject-card {
            background: linear-gradient(135deg, #2c3e50, #2980b9);
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 300px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            color: white;
            position: relative;
            opacity: 0;
            animation: slideUpFade 1s ease forwards;
            text-align: center;
            overflow: hidden;
        }

        .subject-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        }

        .subject-card h3 {
            font-size: 18px;
            color: #fff;
            margin-bottom: 12px;
            text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.3);
        }

        .subject-card p {
            font-size: 14px;
            color: #f7f7f7;
            margin-bottom: 15px;
            line-height: 1.4;
            opacity: 0.9;
        }

        .btn {
            font-size: 16px;
            font-weight: 600;
            padding: 12px 24px;
            background-color: #f39c12;
            color: white;
            border-radius: 50px;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
        }

        .btn:hover {
            background-color: #e67e22;
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
                font-size: 28px;
            }

            .section__content {
                font-size: 16px;
            }

            .subject-card h3 {
                font-size: 16px;
            }

            .subject-card p {
                font-size: 12px;
            }

            .btn {
                font-size: 14px;
                padding: 10px 20px;
            }
        }
    </style>

</head>

<body>
    <?php include 'includes/header.php' ?>
    <div class="container">

        <section class="section call-to-action">
            <h2 class="section__title">My Tests</h2>
            <p class="section__content">Explore and start learning through various subjects and tests designed to boost
                your skills.</p>
        </section>

        <br>

        <section class="section subjects-list">
            <?php

            $delay = 0;

            foreach ($subjects as $subject): ?>
                <div class="subject-card" style="animation-delay: <?= $delay ?>s;">
                    <h3><?= $subject['title'] ?></h3>
                    <p><?= $subject['description'] ?></p>
                    <a href="test.php?url=<?= urlencode($subject['url']) ?>">
                        <button class="btn">Start</button>
                    </a>
                </div>
                <?php
                $delay += 0.3;
            endforeach;

            ?>
        </section>

    </div>

    <?php include 'includes/footer.php' ?>
</body>

</html>