<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Platform</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
</head>

<style>
    body {
        font-family: 'Poppins', sans-serif;
    }

    .hero {
        width: 100%;
        text-align: center;
        padding: 5rem 2rem;
        background: linear-gradient(135deg, #003366, #004d80);
        color: white;
        border-top-right-radius: 15px;
        border-top-left-radius: 15px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        margin: 0 auto;
        transform: translateY(0);
        opacity: 0;
        animation: fadeInUp 1s ease-out forwards;
    }

    @keyframes fadeInUp {
        0% {
            opacity: 0;
            transform: translateY(50px);
        }

        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .hero__title {
        font-size: 3rem;
        font-weight: 600;
        margin-bottom: 1.5rem;
        letter-spacing: -1.5px;
        text-shadow: 3px 3px 10px rgba(0, 0, 0, 0.3);
        line-height: 1.2;
    }

    .hero__subtitle {
        font-size: 1.6rem;
        font-weight: 400;
        margin-bottom: 2rem;
        opacity: 0.9;
        letter-spacing: 0.5px;
    }

    .hero__button {
        font-size: 1.5rem;
        font-weight: 600;
        padding: 1rem 2.5rem;
        background-color: #0066cc;
        color: white;
        border-radius: 50px;
        border: none;
        cursor: pointer;
        transition: all 0.3s ease;
        letter-spacing: 1px;
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
    }

    .hero__button:hover {
        background-color: #005bb5;
        transform: scale(1.05);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
    }

    .hero__button:focus {
        outline: none;
    }

    .features {
        background: linear-gradient(135deg, #004d80, #003366);
        color: white;
        text-align: center;
        padding: 5rem 2rem;
        border-bottom-right-radius: 15px;
        border-bottom-left-radius: 15px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        width: 100%;
        margin: 0 auto;
        transform: translateY(0);
        opacity: 0;
        animation: fadeInUp 1s ease-out forwards;
    }

    @media (max-width: 768px) {
        .hero__title {
            font-size: 2.5rem;
        }

        .hero__subtitle {
            font-size: 1.4rem;
        }

        .hero__button {
            font-size: 1.4rem;
            padding: 1rem 2rem;
        }
    }
</style>

<body>
    <?php include 'includes/header.php' ?>
    <div class="container">

        <section class="hero">
            <h1 class="hero__title">Welcome to Test Platform</h1>
            <p class="hero__subtitle">Test your knowledge, improve your skills, and track your progress.</p>
            <a href="about.php"><button class="hero__button">Learn More</button></a>
        </section>

        <br>

        <section class="features">
            <p class="hero__subtitle">Test Platform is designed to provide individuals with a comprehensive platform to test their knowledge in various fields. Whether you're preparing for exams or looking to sharpen your skills, our interactive quizzes and exercises will help you measure your progress and achieve your learning goals. Join us today and start testing your knowledge!</p>
        </section>

    </div>
    <?php include 'includes/footer.php' ?>
</body>

</html>