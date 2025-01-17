<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Platform</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
</head>

<style>
    .hero {
        width: 100%;
        text-align: center;
        padding: 60px 20px;
        background: #34495e;
        color: #f39c12;
        border-top-right-radius: 15px;
        border-top-left-radius: 15px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        margin: 0 auto;
        transform: translateY(0);
        opacity: 0;
        animation: fadeInUp 1s ease-out forwards;
    }

    @keyframes fadeInUp {
        0% {
            opacity: 0;
            transform: translateY(30px);
        }

        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .hero__title {
        font-size: 48px;
        font-weight: 600;
        margin-bottom: 20px;
        text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.3);
        line-height: 1.2;
    }

    .hero__subtitle {
        font-size: 22px;
        font-weight: 400;
        margin-bottom: 30px;
        opacity: 0.9;
        letter-spacing: 1px;
        color: #ecf0f1;
    }

    .hero__button {
        font-size: 20px;
        font-weight: 600;
        padding: 14px 28px;
        border-radius: 50px;
        border: none;
        cursor: pointer;
        transition: all 0.3s ease;
        letter-spacing: 1px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        margin: 10px;
    }

    .create-test-btn {
        background-color: #e67e22;
        color: white;
    }

    .create-test-btn:hover {
        background-color: #d35400;
        transform: scale(1.05);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
    }

    .start-test-btn {
        background-color: #3498db;
        color: white;
    }

    .start-test-btn:hover {
        background-color: #2980b9;
        transform: scale(1.05);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
    }

    .hero__button:focus {
        outline: none;
    }

    .features {
        background: #f39c12;
        color: white;
        text-align: center;
        padding: 60px 20px;
        border-bottom-right-radius: 15px;
        border-bottom-left-radius: 15px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        width: 100%;
        margin: 0 auto;
        transform: translateY(0);
        opacity: 0;
        animation: fadeInUp 1s ease-out forwards;
    }

    @media (max-width: 768px) {
        .hero__title {
            font-size: 36px;
        }

        .hero__subtitle {
            font-size: 18px;
        }

        .hero__button {
            font-size: 16px;
            padding: 12px 24px;
        }
    }
</style>

<body>
    <?php include 'includes/header.php' ?>
    <div class="container">

        <section class="hero">
            <h1 class="hero__title">Welcome to Test Platform</h1>
            <p class="hero__subtitle">Create your own tests, improve your skills, and share them with others.</p>

            <a href="./admin/"><button class="hero__button create-test-btn">Create Test</button></a>
            <a href="my_tests.php"><button class="hero__button start-test-btn">My Tests</button></a>

        </section>

        <br>

        <section class="features">
            <p class="hero__subtitle">Test Platform provides a comprehensive environment where you can create
                personalized tests on various topics. Whether you're preparing for exams or enhancing your skills, you
                can design quizzes, share them with others, and track progress. Join us to create, share, and test your
                knowledge while helping others do the same!</p>
        </section>

    </div>
    <?php include 'includes/footer.php' ?>
</body>

</html>