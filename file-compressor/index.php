<?php
require __DIR__ . '/../config.php';

$type = $_GET['type'] ?? 'pdf'; // default: pdf

if ($type === 'image') {
    $seo_title = "Free Online Image Compressor - Toolsify";
    $seo_description = "Compress JPG, PNG, and WebP images online for free with Toolsify. Reduce size while keeping high visual quality.";
    $seo_keywords = "Image Compressor, Compress Images, JPG PNG WebP, Free Online Image Tool, Optimize Images";
    $seo_url = "https://usetoolsify.com/file-compressor/?type=image";
    $seo_image = "https://tuodominio.it/images/preview-image-compressor.png";
    $app_name = "Image Compressor";
    $app_desc = "Free online Image Compressor by Toolsify. Compress JPG, PNG, and WebP images instantly without losing quality.";
} else {
    $seo_title = "Free Online File Compressor - Toolsify";
    $seo_description = "Compress files online for free with Toolsify. Reduce size of images, PDFs, videos and audio instantly.";
    $seo_keywords = "File Compressor, Compress PDF, Compress Video, Compress Audio, Free Online File Tool";
    $seo_url = "https://usetoolsify.com/file-compressor/";
    $seo_image = "https://tuodominio.it/images/preview-file-compressor.png";
    $app_name = "File Compressor";
    $app_desc = "Free online File Compressor by Toolsify. Compress images, PDFs, videos and audio instantly while keeping high quality.";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="<?= $seo_description ?>">
    <meta name="keywords" content="<?= $seo_keywords ?>">

    <meta property="og:title" content="<?= $seo_title ?>">
    <meta property="og:description" content="<?= $seo_description ?>">
    <meta property="og:type" content="website">
    <meta property="og:image" content="<?= $seo_image ?>">
    <meta property="og:url" content="<?= $seo_url ?>">
    <meta name="twitter:card" content="summary_large_image">

    <title><?= $seo_title ?></title>

    <link rel="icon" type="image/x-icon" href="<?= IMG_URL ?>icons/favicon.ico">
    <link rel="stylesheet" href="<?= CSS_URL ?>">
    <link rel="canonical" href="<?= $seo_url ?>">

    <!-- WebApplication (Dynamic) -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "WebApplication",
      "name": "<?= $app_name ?>",
      "url": "<?= $seo_url ?>",
      "applicationCategory": "UtilityApplication",
      "operatingSystem": "All",
      "inLanguage": "en",
      "description": "<?= $app_desc ?>",
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
        .compressor-main {
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

        .compressor-form {
            display: flex;
            flex-direction: column;
            gap: 2rem;
            width: 100%;
            max-width: 700px;
            background: #fff;
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        }

        .compressor-form input[type="file"] {
            padding: 0.7rem;
            border: 1px solid #ccc;
            border-radius: 6px;
        }

        .compressor-form button {
            padding: 0.8rem 1rem;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            background: #0073e6;
            color: #fff;
            font-weight: 600;
            transition: background 0.2s ease;
        }

        .compressor-form button:hover {
            background: #005bb5;
        }

        .options {
            display: flex;
            flex-direction: column;
            gap: 1rem;
            text-align: left;
        }

        .options label {
            font-weight: 600;
        }

        /* Stile uniforme per select e file upload */
        .compressor-form select,
        .compressor-form input[type="file"] {
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
        }

        /* Hover e focus */
        .compressor-form select:hover,
        .compressor-form input[type="file"]:hover {
            border-color: #0073e6;
        }

        .compressor-form select:focus,
        .compressor-form input[type="file"]:focus {
            border-color: #0073e6;
            box-shadow: 0 0 0 3px rgba(0, 115, 230, 0.2);
            outline: none;
        }

        /* Iconcina ▼ per select */
        .compressor-form select {
            background-image: url("data:image/svg+xml;charset=UTF-8,<svg xmlns='http://www.w3.org/2000/svg' width='14' height='14' fill='%230073e6'><path d='M7 10l5-5H2z'/></svg>");
            background-repeat: no-repeat;
            background-position: right 1rem center;
            background-size: 1rem;
            padding-right: 2.5rem;
        }

        /* Personalizzazione input file */
        .compressor-form input[type="file"] {
            color: #444;
            background-color: #f9f9f9;
        }

        /* Bottone del file upload */
        .compressor-form input[type="file"]::file-selector-button {
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
        .compressor-form input[type="file"]::file-selector-button:hover {
            background: #005bb5;
        }

        #compression-result {
            display: none;
            margin: 30px auto;
            max-width: 600px;
            padding: 2rem;
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            text-align: center;
            transition: all 0.3s ease-in-out;
        }

        #compression-result h3 {
            font-size: 1.5rem;
            margin-bottom: 1rem;
            color: #0073e6;
        }

        #compression-result p {
            font-size: 1rem;
            margin: 0.5rem 0;
            color: #333;
        }

        #saving-info {
            font-size: 1.2rem;
            font-weight: bold;
            color: #28a745;
            /* verde per enfatizzare risparmio */
        }

        #compression-result .btn {
            display: inline-block;
            margin-top: 1.5rem;
            padding: 0.8rem 1.5rem;
            background: #0073e6;
            color: #fff;
            font-weight: 600;
            text-decoration: none;
            border-radius: 8px;
            transition: background 0.2s ease;
        }

        #compression-result .btn:hover {
            background: #005bb5;
        }

        .saving-bar {
            width: 100%;
            max-width: 400px;
            height: 20px;
            background: #e9ecef;
            border-radius: 10px;
            margin: 1rem auto;
            overflow: hidden;
        }

        .saving-progress {
            height: 100%;
            width: 0;
            background: linear-gradient(90deg, #28a745, #6fdc8c);
            transition: width 0.4s ease-in-out;
            border-radius: 10px;
        }
    </style>
</head>

<body>
    <?php include COMPONENTS_PATH . 'header.php'; ?>

    <section class="compressor-main">
        <h1>
            <?php if ($type === 'image'): ?>
                Image Compressor
            <?php else: ?>
                File Compressor
            <?php endif; ?>
        </h1>

        <h2>
            <?php if ($type === 'image'): ?>
                Free Online Image Compressor – Reduce JPG, PNG, WebP Instantly
            <?php else: ?>
                Free Online File Compressor – Reduce File Size Instantly
            <?php endif; ?>
        </h2>

        <p class="description">
            <?php if ($type === 'image'): ?>
                With Toolsify’s free Image Compressor you can shrink JPG, PNG and WebP images without losing quality.
                Perfect for websites, social media and faster sharing.
            <?php else: ?>
                With Toolsify’s free File Compressor you can reduce the size of your files in seconds.
                Upload images, PDFs, videos or audio, choose the compression level, and download instantly.
            <?php endif; ?>
        </p>

        <form class="compressor-form" action="file-compressor.php" method="post" enctype="multipart/form-data">
            <label for="file">Upload File*</label>
            <input type="file" id="file" name="file" required>

            <div class="options">
                <label for="type">File Type:</label>
                <select id="type" name="type" required>
                    <option value="image" <?= $type === 'image' ? 'selected' : '' ?>>Image (JPEG, PNG, WebP)</option>
                    <option value="pdf" <?= $type === 'pdf' ? 'selected' : '' ?>>PDF</option>
                    <option value="video" <?= $type === 'video' ? 'selected' : '' ?>>Video (MP4, AVI, MOV)</option>
                    <option value="audio" <?= $type === 'audio' ? 'selected' : '' ?>>Audio (MP3, WAV, AAC)</option>
                </select>

                <label for="quality">Compression Level:</label>
                <select id="quality" name="quality">
                    <option value="high">High (Smaller Size)</option>
                    <option value="medium" selected>Medium (Balanced)</option>
                    <option value="low">Low (Better Quality)</option>
                </select>
            </div>

            <div id="compression-result" style="display:none; margin-top:20px; text-align:center;">
                <h3>Compression Result</h3>
                <p id="file-info"></p>
                <p id="saving-info"></p>
                <div class="saving-bar">
                    <div class="saving-progress" id="saving-progress"></div>
                </div>
                <a id="download-link" href="#" download class="btn">Download Compressed File</a>
            </div>

            <button type="submit">Compress & Download</button>
        </form>
    </section>

    <!-- Verifica estensione + cambio select -->
    <script defer>
        document.addEventListener("DOMContentLoaded", () => {
            const fileInput = document.getElementById("file");
            const typeSelect = document.getElementById("type");

            const validTypes = {
                image: ["jpg", "jpeg", "png", "webp"],
                pdf: ["pdf"],
                video: ["mp4", "avi", "mov"],
                audio: ["mp3", "wav", "aac"]
            };

            fileInput.addEventListener("change", () => {
                if (!fileInput.files.length) return;

                const file = fileInput.files[0];
                const fileName = file.name.toLowerCase();
                const extension = fileName.split(".").pop();

                let matchedCategory = null;

                for (const [category, extensions] of Object.entries(validTypes)) {
                    if (extensions.includes(extension)) {
                        matchedCategory = category;
                        break;
                    }
                }

                if (!matchedCategory) {
                    alert("⚠️ Formato non supportato. Seleziona un file valido (PDF, Image, Video, Audio).");
                    fileInput.value = "";
                    return;
                }

                // Se la select non corrisponde → aggiorna
                if (typeSelect.value !== matchedCategory) {
                    typeSelect.value = matchedCategory;
                }
            });
        });
    </script>

    <!-- Script per compression-result -->
    <script defer>
        document.addEventListener("DOMContentLoaded", () => {
            const fileInput = document.getElementById("file");
            const typeSelect = document.getElementById("type");
            const qualitySelect = document.getElementById("quality");

            const resultBox = document.getElementById("compression-result");
            const fileInfo = document.getElementById("file-info");
            const savingInfo = document.getElementById("saving-info");
            const downloadLink = document.getElementById("download-link");

            let originalSize = 0;

            const savingsMap = {
                image: { high: 70, medium: 50, low: 30 },
                pdf: { high: 60, medium: 40, low: 20 },
                video: { high: 50, medium: 35, low: 15 },
                audio: { high: 60, medium: 40, low: 20 }
            };

            function updateEstimate() {
                if (!originalSize) return;

                const type = typeSelect.value;
                const quality = qualitySelect.value;

                const savingPercent = savingsMap[type]?.[quality] ?? 0;
                const compressedSize = originalSize * (1 - savingPercent / 100);

                fileInfo.textContent = `Original: ${(originalSize / 1024).toFixed(1)} KB → Estimated: ${(compressedSize / 1024).toFixed(1)} KB`;
                savingInfo.textContent = `Estimated saving: ${savingPercent}%`;

                const progress = document.getElementById("saving-progress");
                if (progress) {
                    progress.style.width = savingPercent + "%";
                }

                resultBox.style.display = "block";
                downloadLink.style.display = "none";
            }

            fileInput.addEventListener("change", () => {
                if (fileInput.files.length) {
                    originalSize = fileInput.files[0].size;
                    updateEstimate();
                } else {
                    originalSize = 0;
                    resultBox.style.display = "none";
                }
            });

            typeSelect.addEventListener("change", updateEstimate);
            qualitySelect.addEventListener("change", updateEstimate);
        });
    </script>

    <?php include COMPONENTS_PATH . 'footer.php'; ?>
</body>

</html>