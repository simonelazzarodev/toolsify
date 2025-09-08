<?php
require __DIR__ . '/../config.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF Merge & Split | Combine or Separate PDFs Online Free</title>
    <meta name="description"
        content="Easily merge multiple PDFs into one or split large PDFs in seconds. Free, fast, and without formatting loss. Try our PDF Merge & Split tool online now.">
    <meta name="keywords"
        content="PDF merge, PDF split, combine PDFs, split PDF, merge PDF online, split PDF online, free PDF tool">

    <!-- Open Graph -->
    <meta property="og:title" content="PDF Merge & Split | Free Online Tool">
    <meta property="og:description"
        content="Combine multiple PDFs into one or split them instantly, free and without formatting loss.">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://yourdomain.com/pdf-merge-split">
    <meta property="og:image" content="https://yourdomain.com/images/pdf-tool.jpg">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?= IMG_URL ?>icons/favicon.ico">
    <link rel="stylesheet" href="<?= CSS_URL ?>">

    <style>
        .hero {
            text-align: center;
            padding: 40px 20px;
        }

        .hero h1 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 10px;
            color: #111827;
        }

        .hero p {
            font-size: 1.1rem;
            color: #374151;
        }

        .tool-section {
            padding: 20px 20px 40px;
        }

        .tool-box {
            max-width: 600px;
            margin: 0 auto;
            background: #fff;
            border-radius: 16px;
            padding: 30px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.08);
            text-align: center;
        }

        .tool-box h2 {
            margin-bottom: 10px;
            font-size: 1.6rem;
            color: #111827;
        }

        .tool-box p {
            font-size: 0.95rem;
            color: #4b5563;
            margin-bottom: 25px;
        }

        .form-group {
            margin-bottom: 20px;
            text-align: left;
        }

        .form-group label {
            display: block;
            font-weight: 600;
            margin-bottom: 8px;
            color: #111827;
        }

        input[type="file"] {
            display: block;
            width: 100%;
            padding: 10px;
            border: 2px dashed #93c5fd;
            border-radius: 12px;
            background: #f9fafb;
            cursor: pointer;
        }

        input[type="file"]:hover {
            border-color: #3b82f6;
        }

        .file-preview {
            list-style: none;
            margin-top: 12px;
            padding: 0;
            font-size: 14px;
            color: #374151;
        }

        .file-preview li {
            background: #f3f4f6;
            margin: 5px 0;
            padding: 8px 12px;
            border-radius: 8px;
            font-family: monospace;
        }

        .actions {
            display: flex;
            justify-content: center;
            gap: 15px;
        }

        .btn-primary,
        .btn-secondary {
            padding: 12px 28px;
            border-radius: 12px;
            border: none;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .btn-primary {
            background: #2563eb;
            color: #fff;
        }

        .btn-primary:hover {
            background: #1e40af;
        }

        .btn-secondary {
            background: #f3f4f6;
            color: #111827;
            border: 1px solid #d1d5db;
        }

        .btn-secondary:hover {
            background: #e5e7eb;
        }
    </style>

    <script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "WebApplication",
    "name": "PDF Merge & Split",
    "url": "https://yourdomain.com/pdf-merge-split",
    "applicationCategory": "UtilityApplication",
    "operatingSystem": "All",
    "inLanguage": "en",
    "description": "Combine multiple PDFs into one or split them in seconds with no formatting loss. Free, fast, and secure online tool.",
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

<body>

    <?php include COMPONENTS_PATH . 'header.php'; ?>

    <section class="hero">
        <div class="container">
            <h1>PDF Merge & Split</h1>
            <p>Combine multiple PDFs into one or split them in seconds with no formatting loss.</p>
        </div>
    </section>

    <section id="tool" class="tool-section">
        <div class="container">
            <div class="tool-box">
                <h2>Upload Your PDFs</h2>
                <p>Select multiple files to merge or choose a single PDF to split into separate pages.</p>

                <form action="process.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">

                        <div class="custom-file-upload">
                            <label for="pdfUpload" class="btn-upload">Choose Files</label>
                            <input type="file" id="pdfUpload" name="pdfs[]" accept="application/pdf" multiple required>
                        </div>

                        <ul id="filePreview" class="file-preview"></ul>
                    </div>

                    <div class="form-group actions">
                        <button type="submit" name="action" value="merge" class="btn-primary">Merge PDFs</button>
                        <small>Combine all selected PDFs into one document.</small>
                        <button type="submit" name="action" value="split" class="btn-secondary">Split PDF</button>
                        <small>Separate a multi-page PDF into individual pages.</small>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <?php include COMPONENTS_PATH . 'footer.php'; ?>

    <!-- JavaScript to handle file preview -->
    <script defer>
        document.getElementById('pdfUpload').addEventListener('change', function (e) {
            const fileList = e.target.files;
            const preview = document.getElementById('filePreview');
            preview.innerHTML = "";

            if (fileList.length > 0) {
                Array.from(fileList).forEach(file => {
                    const li = document.createElement("li");
                    li.textContent = file.name;
                    preview.appendChild(li);
                });
            }
        });
    </script>

</body>

</html>