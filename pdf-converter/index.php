<?php require __DIR__ . '/../config.php'; ?> 

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Free online PDF Converter by Toolsify. Convert PDFs to Word, Excel, images and more while preserving layout and formatting.">
    <meta name="keywords"
        content="PDF Converter, Convert PDF to Word, PDF to Excel, PDF to JPG, Online PDF Tools, Free PDF Converter">

    <meta property="og:title" content="Free Online PDF Converter - Toolsify">
    <meta property="og:description"
        content="Convert your PDF files to Word, Excel, images and more. Fast, free, and keeps the original formatting intact.">
    <meta property="og:type" content="website">
    <meta property="og:image" content="https://tuodominio.it/images/preview-pdf-converter.png">
    <meta property="og:url" content="https://usetoolsify.com/pdf-converter">
    <meta name="twitter:card" content="summary_large_image">

    <title>PDF Converter Online Free | Convert PDF to Word, Excel & Images | Toolsify</title>

    <link rel="icon" type="image/x-icon" href="<?= IMG_URL ?>icons/favicon.ico">
    <link rel="stylesheet" href="<?= CSS_URL ?>">
    <link rel="canonical" href="https://usetoolsify.com/pdf-converter/">

    <!-- WebApplication (PDF Converter) -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "WebApplication",
      "name": "PDF Converter",
      "url": "https://usetoolsify.com/pdf-converter",
      "applicationCategory": "UtilityApplication",
      "operatingSystem": "All",
      "inLanguage": "en",
      "description": "Free online PDF Converter by Toolsify. Convert PDFs to Word, Excel, images and more while preserving layout and formatting.",
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

    <style>
        .converter-form input[type="file"] {
            width: 100%;
            padding: 0.8rem 1rem;
            border: 1px solid #ccc;
            border-radius: 8px;
            background-color: #f9f9f9;
            font-size: 1rem;
            font-weight: 500;
            cursor: pointer;
            transition: border 0.2s ease, box-shadow 0.2s ease;
            color: #444;
        }

        .converter-form input[type="file"]:hover {
            border-color: #0073e6;
        }

        .converter-form input[type="file"]:focus {
            border-color: #0073e6;
            box-shadow: 0 0 0 3px rgba(0, 115, 230, 0.2);
            outline: none;
        }

        .converter-form input[type="file"]::file-selector-button {
            padding: 0.6rem 1rem;
            margin-right: 1rem;
            border: none;
            border-radius: 6px;
            background: #0073e6;
            color: #fff;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.2s ease;
        }

        .converter-form input[type="file"]::file-selector-button:hover {
            background: #005bb5;
        }

        .intro-text {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            width: 90%;
            max-width: 1000px;
            margin: 50px auto;
            gap: 2rem;
            text-align: center;
        }

        .intro-text p {
            font-size: 0.85em;
            text-align: center;
        }

        .pdf-converter-container {
            margin: 2rem auto;
            max-width: 1100px;
            padding: 1rem;
        }

        .pdf-converter-container form {
            display: flex;
            gap: 2rem;
            flex-direction: row;
            align-items: flex-start;
            justify-content: space-between;
        }

        .left-panel,
        .right-panel {
            flex: 1;
            background: #fff;
            padding: 1.5rem;
            border-radius: 12px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        }

        .preview-wrapper {
            margin: 1rem 0;
            text-align: center;
        }

        .preview-wrapper iframe {
            width: 100%;
            max-width: 350px;
            height: 400px;
            border: 1px solid #ddd;
            border-radius: 8px;
        }

        .convert-options {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .convert-options button {
            padding: 0.7rem 1rem;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            background: #0073e6;
            color: #fff;
            font-weight: 600;
            transition: background 0.2s ease;
        }

        .convert-options button:hover {
            background: #005bb5;
        }

        @media (max-width: 900px) {
            .pdf-converter-container form {
                flex-direction: column;
            }
        }
    </style>
</head>

<body>
    <?php include COMPONENTS_PATH . 'header.php'; ?>

    <div class="intro-text">
        <h1>PDF Converter</h1>
        <h2>Free Online PDF Converter – Convert to Word, Excel, Images & More</h2>
        <p class="description">
            With Toolsify’s free PDF Converter, you can easily convert your PDF files into multiple formats like Word, Excel, JPG or PNG without losing layout or content. 
            Fast, secure and free – perfect for work, study or personal use.
        </p>
    </div>

    <main class="pdf-converter-container">
        <form action="converter.php" method="POST" enctype="multipart/form-data" class="converter-form">

            <!-- Colonna sinistra -->
            <div class="left-panel">
                <h2 style="padding-bottom: 15px;">Upload PDF</h2>
                <input type="file" name="pdf" accept="application/pdf" required>

                <!-- Anteprima PDF -->
                <div class="preview-wrapper" style="display:none;">
                    <iframe id="pdf-preview"></iframe>
                </div>

                <p class="disclaimer">
                    Supported format: <strong>PDF</strong>.
                </p>
            </div>

            <!-- Colonna destra -->
            <div class="right-panel">
                <h2 style="padding-bottom: 15px;">Choose Conversion</h2>
                <div class="convert-options">
                    <button type="submit" name="convert" value="word">Convert to Word (.docx)</button>
                    <button type="submit" name="convert" value="excel">Convert to Excel (.xlsx)</button>
                    <button type="submit" name="convert" value="jpg">Convert to JPG</button>
                    <button type="submit" name="convert" value="png">Convert to PNG</button>
                </div>
            </div>

        </form>
    </main>

    <?php include COMPONENTS_PATH . 'footer.php'; ?>

    <!-- Script per preview PDF -->
    <script defer>
        const input = document.querySelector('input[name="pdf"]');
        const preview = document.getElementById('pdf-preview');
        const wrapper = document.querySelector('.preview-wrapper');

        input.addEventListener('change', function () {
            const file = this.files[0];
            if (file && file.type === "application/pdf") {
                const url = URL.createObjectURL(file);
                preview.src = url;
                wrapper.style.display = 'block';
            } else {
                wrapper.style.display = 'none';
                preview.src = "";
            }
        });
    </script>
</body>
</html>
