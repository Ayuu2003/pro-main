<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- FAVICON -->
    <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon">

    <!-- REMIX ICONS -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="styles.css">
    <title>Feedback</title>
</head>
<body style="background-image: url('https://img.freepik.com/free-photo/abstract-marble-texture-black-white-grey-background-handmade-technique_1258-99671.jpg');">
    <main class="main">
        <section class="contact section container" id="contact">
            <div class="contact__container grid">
                <div class="contact__box">
                    <h2 class="section__title">Give Us Your Valuable Feedback :)</h2>
                    <div class="contact__data">
                        <div class="contact__information">
                            <h3 class="contact__subtitle">Call us for instant support</h3>
                            <span class="contact__description">
                                <i class="ri-phone-line contact__icon"></i>
                                +91-999823456
                            </span>
                        </div>
                    </div>
                </div>
                <form action="submit.php" method="POST" class="contact__form" onsubmit="return submitFeedback(event)">
                    <div class="contact__inputs">
                        <div class="contact__content">
                            <input type="email" name="email" placeholder=" " class="contact__input" required>
                            <label for="" class="contact__label">Email</label>
                        </div>
                        <div class="contact__content">
                            <input type="text" name="feedback" placeholder=" " class="contact__input" required>
                            <label for="" class="contact__label">Write Your Feedback</label>
                        </div>
                        <div class="contact__content contact__area">
                            <textarea name="suggestion" placeholder=" " class="contact__input"></textarea>
                            <label for="" class="contact__label">Suggestions</label>
                        </div>
                    </div>
                    <button class="button button--flex" type="submit">
                        Send Message
                        <i class="ri-arrow-right-up-line button__icon"></i>
                    </button>
                </form>
                <div id="feedback-message" style="color: green;"></div>
            </div>
        </section>
    </main>
    <script src="assets/js/main.js"></script>
    <script>
        function submitFeedback(event) {
            event.preventDefault(); // Prevent default form submission

            // Simulate a successful submission
            const messageDiv = document.getElementById("feedback-message");
            messageDiv.innerText = "Feedback submitted successfully! Redirecting to the index page...";

            // Delay the redirection to the index page
            setTimeout(function() {
                window.location.href = "index.php";
            }, 1000); // 2000 milliseconds = 1 seconds
        }
    </script>
    <footer>
        <p class="footer__copy">&#169; Paudha2k23. All rights reserved</p>
    </footer>
</body>
</html>
