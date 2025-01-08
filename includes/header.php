<head>
    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,500;1,400&display=swap" rel="stylesheet">
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,500;1,400&display=swap");

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            font-family: "Roboto", sans-serif;
        }

        li {
            list-style: none;
        }

        a {
            text-decoration: none;
        }

        header {
            border-bottom: 1px solid #d6e4f1;
        }

        .navbar {
            background-color: #2c3e50;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            padding: 1rem 2rem;
        }

        .lines {
            display: none;
            cursor: pointer;
        }

        .line {
            display: block;
            width: 30px;
            height: 4px;
            margin: 6px auto;
            transition: all 300ms ease-in-out;
            background-color: #ecf0f1;
        }

        .nav-menu {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .nav-item {
            margin-left: 30px;
        }

        .nav-link {
            font-size: 18px;
            font-weight: 500;
            color: #ecf0f1;
            transition: color 0.3s ease;
        }

        .nav-link:hover {
            color: #f39c12;
        }

        .nav-logo {
            font-size: 24px;
            font-weight: 600;
            color: #f39c12;
            letter-spacing: 1px;
        }

        @media only screen and (max-width: 768px) {
            header {
                margin-bottom: 50px;
            }

            .navbar {
                position: fixed;
                width: 100%;
                justify-content: space-between;
                z-index: 1000;
                background-color: #2c3e50;
                box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
            }

            .nav-menu {
                position: fixed;
                left: -100%;
                top: 50px;
                flex-direction: column;
                background-color: #34495e;
                width: 100%;
                border-radius: 8px;
                text-align: center;
                transition: left 300ms ease;
                box-shadow: 0 8px 20px rgba(0, 0, 0, 0.05);
                z-index: 1000;
            }

            .nav-menu.active {
                left: 0;
            }

            .nav-item {
                margin: 30px 0;
            }

            .lines {
                display: block;
            }

            .lines.active .line:nth-child(2) {
                opacity: 0;
            }

            .lines.active .line:nth-child(1) {
                transform: translateY(6px) rotate(45deg);
            }

            .lines.active .line:nth-child(3) {
                transform: translateY(-6px) rotate(-45deg);
            }
        }

        .menu-item:hover,
        .menu-item.active {
            color: #f39c12;
            font-weight: bold;
        }

        .container {
            width: 100%;
            min-height: 50vh;
            margin: auto;
            margin-top: 27px;
            margin-bottom: 40px;
            padding: 1.2rem 2.5rem;
            border-radius: 11px;
            background-color: #ffffff;
        }

        .nav-link.active {
            color: #f39c12;
            font-weight: bold;
        }
    </style>
</head>

<header class="header">
    <nav class="navbar">
        <a href="./" class="nav-logo">Test Platform</a>

        <?php
        $current_page = basename($_SERVER['PHP_SELF']);
        ?>

        <ul class="nav-menu">
            <li class="nav-item">
                <a href="./" class="nav-link <?php echo ($current_page == 'index.php') ? 'active' : ''; ?>">Home</a>
            </li>
            <li class="nav-item">
                <a href="about.php" class="nav-link <?php echo ($current_page == 'about.php') ? 'active' : ''; ?>">About Us</a>
            </li>
            <li class="nav-item">
                <a href="lessons.php" class="nav-link <?php echo ($current_page == 'lessons.php') ? 'active' : ''; ?>">Lessons</a>
            </li>
        </ul>

        <div class="lines">
            <span class="line"></span>
            <span class="line"></span>
            <span class="line"></span>
        </div>
    </nav>
</header>

<script>
    const lines = document.querySelector(".lines");
    const navMenu = document.querySelector(".nav-menu");

    lines.addEventListener("click", () => {
        lines.classList.toggle("active");
        navMenu.classList.toggle("active");
    });
</script>