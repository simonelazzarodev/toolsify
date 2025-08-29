<?php require __DIR__ . '/../config.php'; ?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Generate QR Codes online for free with Toolsify. Create SVG or PNG QR Codes, customize size and margin, then download instantly.">
    <meta name="keywords"
        content="QR Code Generator, Free QR Code, Create QR, Download QR, SVG QR Code, PNG QR Code, Online QR Generator">

    <meta property="og:title" content="Free QR Code Generator Online - Toolsify">
    <meta property="og:description" content="Create and download custom QR Codes in SVG or PNG format instantly.">
    <meta property="og:type" content="website">
    <meta property="og:image" content="https://tuodominio.it/images/preview-qr.png">
    <meta property="og:url" content="https://tuodominio.it/qr-code-generator">
    <meta name="twitter:card" content="summary_large_image">

    <title>QR Code Generator Online Free | Create & Download | Toolsify</title>

    <link rel="icon" type="image/x-icon" href="<?= IMG_URL ?>icons/favicon.ico">
    <link rel="stylesheet" href="<?= CSS_URL ?>">
    <link rel="canonical" href="https://usetoolsify.com/qrcode.php">

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

        form {
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
            width: 300px;
        }

        .form-qr-option {
            display: flex;
            flex-direction: column;
            gap: 3em;
        }

        .description {
            font-size: 0.75em;
            text-align: justify;
        }

        @media (min-width: 768px) {
            .qr-form-group {
                width: 375px;
                height: 200px;
            }

            #qr-content {
                min-width: 500px;
            }

            .description {
                text-align: center;
            }
        }

        @media (min-width: 1024px) and (max-width: 1299px) {
            .form-qr-option {
                display: grid;
                grid-template-columns: repeat(2, 1fr);
            }

            .qr-form-group {
                height: 225px;
            }
        }

        @media (min-width: 1300px) {
            .form-qr-option {
                display: flex !important;
                flex-direction: row !important;
            }

            form {
                gap: 6rem !important;
            }

            .qr-form-group {
                height: 225px;
            }
        }
    </style>

    <!-- WebApplication (QR Code Generator) -->
    <script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "WebApplication",
  "name": "QR Code Generator",
  "url": "https://usetoolsify.com/qr-code-generator",
  "applicationCategory": "UtilityApplication",
  "operatingSystem": "All",
  "inLanguage": "en",
  "description": "Free online QR Code Generator by Toolsify. Create QR codes in SVG or PNG format, customize size and margin, and download instantly.",
  "publisher": {
    "@type": "Organization",
    "name": "Toolsify",
    "url": "https://usetoolsify.com/"
  },
  "offers": {
    "@type": "Offer",
    "price": "0",
    "priceCurrency": "USD"
  }
}
</script>

</head>

<body>
    <?php include COMPONENTS_PATH . 'header.php'; ?>

    <section class="qr-code-main">
        <h1>QR Code Generator</h1>
        <h2>Free Online QR Code Generator – Create and Download Instantly</h2>
        <p class="description">With Toolsify’s free QR Code Generator you can create custom QR codes in seconds. Enter a
            link or text, choose size and format (SVG or PNG), and download your QR code instantly to use in websites,
            business cards, flyers, and more.</p>
        <form id="qrForm" class="qr-form" action="qr.php" method="post">
            <div style="max-width: 650px;">
                <label for="qr-content">Link*</label>
                <input id="qr-content" name="content" maxlength="2000" placeholder="Enter text or paste a URL…"
                    required>
                <small class="help">Up to 2000 characters</small>
            </div>

            <div class="form-qr-option">
                <div class="qr-form-group">
                    <div class="form-image">
                        <img src="<?= IMG_URL ?>icons/format.png" alt="QR code format icon" loading="lazy">
                        <h3>Choose QR Code Format</h3>
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
                        <img src="<?= IMG_URL ?>icons/size.png" alt="QR code size icon" loading="lazy">
                        <h3>Choose QR Code Size</h3>
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
                        <img src="<?= IMG_URL ?>icons/margin.png" alt="QR code margin icon" loading="lazy">
                        <h3>Choose QR Code Margin <br><span
                                style="font-size: 0.5em !important; font-weight: 400 !important;">Default: 4px up to
                                20px from border</span></h3>
                    </div>
                    <div class="form-option">
                        <input type="number" id="margin" name="margin" min="4" max="20" value="4">
                    </div>
                </div>
            </div>

            <div class="form-actions">
                <button type="submit" id="btn-generate" class="hero-btn-1">Generate & Download QR Code</button>
            </div>

            <p id="qr-error" role="alert" hidden></p>
        </form>
    </section>

    <?php include COMPONENTS_PATH . 'footer.php'; ?>
</body>

</html>