<?php require __DIR__ . '/../config.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Free online Image Resizer by Toolsify. Resize, compress and optimize images in JPEG, PNG or WebP format without losing quality.">
    <meta name="keywords"
        content="Image Resizer, Resize Images Online, Free Image Resizer, Compress Images, Optimize Images, JPEG PNG WebP, Online Image Tool">

    <meta property="og:title" content="Free Online Image Resizer - Toolsify">
    <meta property="og:description"
        content="Resize and optimize your images online for free. Adjust width, height, format and quality instantly.">
    <meta property="og:type" content="website">
    <meta property="og:image" content="https://tuodominio.it/images/preview-image-resizer.png">
    <meta property="og:url" content="https://tuodominio.it/image-resizer">
    <meta name="twitter:card" content="summary_large_image">

    <title>Image Resizer Online Free | Resize & Optimize Images | Toolsify</title>


    <link rel="icon" type="image/x-icon" href="<?= IMG_URL ?>icons/favicon.ico">
    <link rel="stylesheet" href="<?= CSS_URL ?>">
    <link rel="canonical" href="https://usetoolsify.com/image-resizer/">

    <!-- WebApplication (Image Resizer) -->
    <script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "WebApplication",
  "name": "Image Resizer",
  "url": "https://usetoolsify.com/image-resizer",
  "applicationCategory": "UtilityApplication",
  "operatingSystem": "All",
  "inLanguage": "en",
  "description": "Free online Image Resizer by Toolsify. Resize, compress and optimize images in JPEG, PNG or WebP format without losing quality.",
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
        /* Stile uniforme per input file (image-resizer) */
        .resizer-form input[type="file"] {
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;

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

        /* Hover e focus */
        .resizer-form input[type="file"]:hover {
            border-color: #0073e6;
        }

        .resizer-form input[type="file"]:focus {
            border-color: #0073e6;
            box-shadow: 0 0 0 3px rgba(0, 115, 230, 0.2);
            outline: none;
        }

        /* Bottone nativo "Choose File" */
        .resizer-form input[type="file"]::file-selector-button {
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

        /* Hover bottone upload */
        .resizer-form input[type="file"]::file-selector-button:hover {
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
            font-size: 0.75em;
            text-align: center;
        }

        .image-resizer-container {
            margin: 2rem auto;
            max-width: 1100px;
            padding: 1rem;
        }

        .image-resizer-container form {
            display: flex;
            flex-direction: row;
            gap: 2rem;
            align-items: flex-start;
            justify-content: space-between;
            width: 100%;
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

        .preview-wrapper img {
            width: 100% !important;
            max-width: 350px;
            height: auto;
            border: 1px solid #ddd;
            border-radius: 8px;
        }

        .image-actions {
            display: flex;
            gap: 1rem;
            margin: 1rem 0;
        }

        .image-actions button,
        .options-buttons button {
            padding: 0.7rem 1rem;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            background: #0073e6;
            color: #fff;
            transition: background 0.2s ease;
        }

        .image-actions button:hover,
        .options-buttons button:hover {
            background: #005bb5;
        }

        .options-buttons {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .resize-option {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }

        .resize-option input {
            padding: 0.5rem;
            border: 1px solid #ccc;
            border-radius: 6px;
        }

        .left-panel,
        .right-panel {
            width: 100%;
        }

        /* Responsive */
        @media (max-width: 900px) {
            .image-resizer-container form {
                flex-direction: column;
            }
        }
    </style>

</head>

<body>
    <?php include COMPONENTS_PATH . 'header.php'; ?>

    <div class="intro-text">
        <h1>Image Resizer</h1>
        <h2>Free Online Image Resizer – Resize, Compress and Download Instantly</h2>
        <p class="description">
            With Toolsify’s free Image Resizer you can adjust your images in seconds. Upload a picture, set custom
            width, height or percentage, choose the output format (JPEG, PNG or WebP), and download instantly.
            Perfect for websites, social media, presentations, and more.
        </p>
    </div>

    <main class="image-resizer-container">
        <form action="image-resizer.php" method="POST" enctype="multipart/form-data" class="resizer-form">

            <!-- Colonna sinistra -->
            <div class="left-panel">
                <img src="<?= IMG_URL ?>icons/image-resizer-icon.png" alt="Image Resizer Icon" style="width:50px;"
                    loading="lazy" decoding="async">
                <h2>Upload Image</h2>
                <input type="file" name="image" accept="image/*" required>

                <!-- Anteprima immagine -->
                <div class="preview-wrapper">
                    <img id="image-preview" src="" alt="Preview" style="display:none;">
                </div>

                <!-- Pulsanti gestione immagine -->
                <div class="image-actions" style="display:none;">
                    <button type="button" id="upload-another">Upload Another Image</button>
                    <button type="button" id="delete-image">Delete Image</button>
                </div>

                <!-- Disclaimer -->
                <p class="disclaimer">
                    Supported formats: <strong>JPEG, PNG, WebP</strong>.
                </p>
            </div>

            <!-- Colonna destra -->
            <div class="right-panel">
                <img src="<?= IMG_URL ?>icons/img-resizer.svg" alt="Image Resizer Icon" style="width:50px;"
                    loading="lazy" decoding="async">
                <h2>Resize Options</h2>
                <div class="options-buttons">

                    <!-- Resize by Width -->
                    <div class="resize-option">
                        <label>Width (px):</label>
                        <input type="number" name="width">
                        <button type="submit" name="mode" value="width">Resize by Width</button>
                    </div>

                    <!-- Resize by Height -->
                    <div class="resize-option">
                        <label>Height (px):</label>
                        <input type="number" name="height">
                        <button type="submit" name="mode" value="height">Resize by Height</button>
                    </div>

                    <!-- Resize by Percentage -->
                    <div class="resize-option">
                        <label>Percentage (%):</label>
                        <input type="number" name="percent">
                        <button type="submit" name="mode" value="percent">Resize by Percentage</button>
                    </div>

                    <!-- Custom Width & Height -->
                    <div class="resize-option">
                        <label>Width (px):</label>
                        <input type="number" name="custom_width">
                        <label>Height (px):</label>
                        <input type="number" name="custom_height">
                        <button type="submit" name="mode" value="custom">Custom Width & Height</button>
                    </div>

                </div>
            </div>

        </form>
    </main>

    <?php include COMPONENTS_PATH . 'footer.php'; ?>

    <!-- Script per preview + pulsanti -->
    <script defer>
        const input = document.querySelector('input[name="image"]');
        const preview = document.getElementById('image-preview');
        const actions = document.querySelector('.image-actions');

        input.addEventListener('change', function () {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                    actions.style.display = 'flex';
                }
                reader.readAsDataURL(file);
            }
        });

        document.getElementById('upload-another').addEventListener('click', () => {
            input.value = "";
            preview.src = "";
            preview.style.display = "none";
            actions.style.display = "none";
            input.click(); // riapre il file picker
        });

        document.getElementById('delete-image').addEventListener('click', () => {
            input.value = "";
            preview.src = "";
            preview.style.display = "none";
            actions.style.display = "none";
        });
    </script>

    <!-- Script per Validazione Form JS -->
    <script defer>
        document.addEventListener("DOMContentLoaded", () => {
            const form = document.querySelector(".resizer-form");

            form.addEventListener("submit", function (e) {
                const mode = e.submitter?.value;
                let valid = true;

                form.querySelectorAll(".error-message").forEach(el => el.remove());

                function showError(inputName, message) {
                    const input = form.querySelector(`input[name='${inputName}']`);
                    if (input) {
                        let error = document.createElement("div");
                        error.className = "error-message";
                        error.textContent = message;
                        input.insertAdjacentElement("afterend", error);
                    }
                }

                switch (mode) {
                    case "width":
                        const width = form.querySelector("input[name='width']").value;
                        if (!width || width <= 0) {
                            valid = false;
                            showError("width", "Please enter a width greater than 0.");
                        }
                        break;

                    case "height":
                        const height = form.querySelector("input[name='height']").value;
                        if (!height || height <= 0) {
                            valid = false;
                            showError("height", "Please enter a height greater than 0.");
                        }
                        break;

                    case "percent":
                        const percent = form.querySelector("input[name='percent']").value;
                        if (!percent || percent <= 0) {
                            valid = false;
                            showError("percent", "Please enter a percentage greater than 0.");
                        }
                        break;

                    case "custom":
                        const customWidth = form.querySelector("input[name='custom_width']").value;
                        const customHeight = form.querySelector("input[name='custom_height']").value;
                        if (!customWidth || customWidth <= 0) {
                            valid = false;
                            showError("custom_width", "Please enter a width greater than 0.");
                        }
                        if (!customHeight || customHeight <= 0) {
                            valid = false;
                            showError("custom_height", "Please enter a height greater than 0.");
                        }
                        break;
                }

                if (!valid) {
                    e.preventDefault();
                }
            });
        });       
    </script>

</body>

</html>