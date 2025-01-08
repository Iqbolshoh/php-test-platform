<footer>
    <div class="max-width-container">
        <div class="footer-content">
            <div class="footer-logo">
                <h1>Letter edu</h1>
                <p>Start learning English.</p>
            </div>

            <div class="footer-links">
                <h3>Quick Links</h3>
                <ul>
                    <li><a href="./">Home</a></li>
                    <li><a href="about.php">About Us</a></li>
                    <li><a href="lessons.php">Lessons</a></li>
                    <li><a href="https://iqbolshoh.uz">iqbolshoh.uz</a></li>
                </ul>
            </div>

            <div class="footer-social">
                <h3>Follow Us</h3>
                <ul>
                    <li><a href="https://www.instagram.com/iqbolshoh_777" target="_blank">Instagram</a></li>
                    <li><a href="https://twitter.com/iqbolshoh_777" target="_blank">Twitter</a></li>
                    <li><a href="https://www.facebook.com/iqbolshoh_777" target="_blank">Facebook</a></li>
                    <li><a href="https://www.linkedin.com/in/iqbolshoh_777" target="_blank">LinkedIn</a></li>
                </ul>
            </div>
        </div>

        <div class="footer-bottom">
            <p>&copy; 2024 Letter edu. All Rights Reserved.</p><br>
        </div>
    </div>
</footer>

<style>
    footer {
        background-color: #2c3e50;
        color: #ecf0f1;
        padding-top: 3rem;
        padding-bottom: 3rem;
        margin-top: auto;
        width: 100%;
    }

    .max-width-container {
        padding: 1.2rem 2.5rem;
    }

    .footer-content {
        display: flex;
        justify-content: space-between;
        width: 100%;
        flex-wrap: wrap;
        margin-bottom: 2rem;
    }

    .footer-logo h1 {
        font-size: 2.5rem;
        margin-bottom: 1rem;
        font-weight: 600;
        color: #3498db;
        /* Accent color */
    }

    .footer-logo p {
        font-size: 1.4rem;
        opacity: 0.8;
        margin-bottom: 2rem;
    }

    .footer-links,
    .footer-social {
        width: 30%;
        margin-bottom: 2rem;
    }

    .footer-links h3,
    .footer-social h3 {
        font-size: 2rem;
        margin-bottom: 1rem;
        font-weight: 600;
        color: #3498db;
        /* Accent color */
    }

    .footer-links ul,
    .footer-social ul {
        list-style: none;
        padding: 0;
    }

    .footer-links ul li,
    .footer-social ul li {
        margin: 0.5rem 0;
    }

    .footer-links ul li a,
    .footer-social ul li a {
        text-decoration: none;
        color: #ecf0f1;
        /* Light text color */
        font-size: 1.4rem;
        opacity: 0.8;
        transition: opacity 0.3s;
    }

    .footer-links ul li a:hover,
    .footer-social ul li a:hover {
        opacity: 1;
        color: #3498db;
        /* Accent color */
    }

    .footer-bottom {
        text-align: center;
        font-size: 1.2rem;
        color: #ecf0f1;
        /* Light text color */
    }

    @media (max-width: 768px) {
        .footer-content {
            flex-direction: column;
            align-items: center;
        }

        .footer-links,
        .footer-social {
            width: 100%;
            text-align: center;
        }
    }
</style>