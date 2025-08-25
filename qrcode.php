<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Compress, convert and download files online for free. Tools for images, videos, audio and PDFs: fast, easy and unlimited.">
    <title>Toolsify | QRCode Generator</title>

    <link rel="icon" type="image/x-icon" href="images/icons/favicon.ico">
    <link rel="stylesheet" href="style.css">

    <style>
        .qr-code-main {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            width: 90%;
            max-width: 1000px;
            margin: 50px auto;
            gap: 2rem;
        }

        .qr-code-main h1,
        .qr-code-main h2 {
            text-align: center;
        }

        form{
            min-width: 85% !important;
            width: inherit !important;
            max-width: 1250px !important;
        }

        .qr-form-group {
            display: flex;
            flex-direction: column;
            justify-content: center;
            gap: 2em;
            width: 325px;
            height: 175px;
            background-color: #F9F9F9;
            border: none;
            border-radius: 1.5em;
            padding: 20px 30px;
            box-shadow: 0px 5px 5px rgba(0, 0, 0, 0.1);
        }

        .form-option input[type="radio"] {
            width: 25px;
            height: auto;
        }

        .form-image {
            display: flex;
            align-items: center;
        }

        .form-image img {
            width: 40px;
            height: 40px;
            margin-right: 15px;
        }

        .hero-btn-1 {
            font-family: 'Poppins', sans-serif;
            border: 0;
            font-weight: 600;
            font-size: 1rem;
            width: 230px;
        }

        .form-qr-option {
            display: flex;
            flex-direction: column;
            gap: 3em;
        }

        @media (min-width: 768px) {
            .qr-form-group {
                width: 375px;
            }
            #qr-content{
                    min-width: 500px;
            }
        }

        @media (min-width: 1024px) and (max-width: 1299px) {
            .form-qr-option {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (min-width: 1300px) {
            .form-qr-option {
                display: flex !important;
                flex-direction: row !important;
            }
            form{
                gap: 6rem !important;
            }
        }
        </style>
</head>

<body>
    <?php include 'components/header.php'; ?>

    <section class="qr-code-main">
        <h1>QR Code Generator</h1>
        <h2>Create and download your QR Code instantly</h2>
        <form id="qrForm" class="qr-form" novalidate>
            <div>
                <label for="qr-content">Link</label>
                <input id="qr-content" name="content" maxlength="2000" placeholder="Enter or paste a URL…" required>
                <small class="help">Up to 2000 characters</small>
            </div>

            <div class="form-qr-option">
                <div class="qr-form-group">
                    <div class="form-image">
                        <img src="images/icons/format.png" alt="Format Icon Image">
                        <h3>Choose format</h3>
                    </div>

                    <div class="form-option">
                        <input type="radio" name="format" value="svg" id="format-svg" checked>
                        <label for="format-svg">SVG</label>
                        <input type="radio" name="format" value="png" id="format-png">
                        <label for="format-png">PNG</label>
                    </div>
                </div>

                <div class="qr-form-group">
                    <div class="form-image">
                        <img src="images/icons/size.png" alt="Size Icon Image">
                        <h3>Choose size</h3>
                    </div>
                    <div class="form-option">
                        <input type="radio" name="size" value="500" id="size-500" checked>
                        <label for="size-500">500 × 500</label>
                        <input type="radio" name="size" value="1000" id="size-1000">
                        <label for="size-1000">1000 × 1000</label>
                    </div>
                </div>

                <div class="qr-form-group">
                    <div class="form-image">
                        <img src="images/icons/margin.png" alt="Margin Icon Image">
                        <h3>Choose margin</h3>
                    </div>
                    <div class="form-option">
                        <input type="number" id="margin" name="margin" min="0" max="40" value="4">
                    </div>
                </div>
            </div>

            <div class="form-actions">
                <button type="submit" id="btn-generate" class="hero-btn-1">GENERATE QR CODE</button>
            </div>

            <p id="qr-error" role="alert" hidden></p>
        </form>
    </section>

    <?php include 'components/footer.php'; ?>
</body>

</html>