<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">

    <title>Toolsify | Work In Progress</title>

    <link rel="stylesheet" href="style.css">

    <style>
        .in-progress {
            display: flex;
            flex-direction: column-reverse;
            align-items: center;
            justify-content: center;
            gap: 5em;
            text-align: center;
            padding: 50px 20px;
        }

        .progress-img img {
            width: 300px;
        }

        .progress-text {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 3em;
        }

        .progress-text .hero-btn-2 {
            padding: 15px 35px;
        }

        @media (min-width: 768px) {
            .progress-img img {
                width: 500px !important;
            }
        }

        @media (min-width: 1024px){
            .in-progress {
                flex-direction: row-reverse;
            }
            .progress-img img {
                width: 650px !important;
            }
        }
    </style>

</head>

<body>

    <?php include 'components/header.php'; ?>

    <section class="in-progress">
        <div class="progress-img">
            <img src="images/in-progress.png" alt="Progress Image">
        </div>
        <div class="progress-text">
            <div class="text-progress">
                <h1>Work In Progress</h1>
                <p>We're working hard to bring you new features. Stay tuned!</p>
            </div>
            <div class="home-btn">
                <a href="index.php" class="hero-btn-2">Go to Home</a>
            </div>
        </div>
    </section>

    <?php include 'components/footer.php'; ?>

</body>

</html>