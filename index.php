<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Compress, convert and download files online for free. Tools for images, videos, audio and PDFs: fast, easy and unlimited.">
    <title>Toolsify | Compress, Convert & Download Files Free</title>

    <link rel="icon" type="image/x-icon" href="images/icons/favicon.ico">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php include 'components/header.php'; ?>

    <div class="cerchio"></div>

    <div class="hero">
        <div class="hero-text">
            <h1>All the tools you need, in one place</h1>
            <h2>You can compress, convert and download files, for free</h2>
            <p>Fast, intuitive tools to manage images, videos, and audio in just a few clicks, from compression to
                format
                conversion and social media downloads, all in one accessible platform.</p>
            <p class="hero-tagline">Free • Unlimited usage • Works on any device</p>
        </div>
        <div class="hero-cta">
            <a href="#tools-section" class="hero-btn-1">Explore All Tools</a>
            <a href="#" class="hero-btn-2">Learn More</a>
        </div>
    </div>

    <section class="filters-section">
        <div class="filter-select">
            <select name="tools" id="tools">
                <option value="all">All Tools</option>
                <option value="file">File</option>
                <option value="image">Image</option>
                <option value="video">Video</option>
                <option value="audio">Audio</option>
                <option value="utilities">Utilities</option>
            </select>
        </div>

        <div class="btn-filters">
            <a href="#" class="filter-btn blue-btn" data-filter="all">All Tools</a>
            <a href="#" class="filter-btn" data-filter="file">File</a>
            <a href="#" class="filter-btn" data-filter="image">Image</a>
            <a href="#" class="filter-btn" data-filter="video">Video</a>
            <a href="#" class="filter-btn" data-filter="audio">Audio</a>
            <a href="#" class="filter-btn" data-filter="utilities">Utilities</a>
        </div>

    </section>

    <section class="tools-section" id="tools-section">

        <div class=" tools-container">
            <div class="tool-item file-tools">
                <img src="images/icons/file-compressor.svg" alt="File Tool Icon" width="75" height="75">
                <h3>File Compressor</h3>
                <p>Reduce file size while keeping original quality, perfect for faster sharing and storage.</p>
                <a href="#" class="tool-btn">Use Tool</a>
            </div>

            <div class="tool-item file-tools">
                <img src="images/icons/file-merge-split.svg" alt="File Tool Icon" width="75" height="75">
                <h3>PDF Merge & Split</h3>
                <p>Combine multiple PDFs into one or split them in seconds with no formatting loss.</p>
                <a href="#" class="tool-btn">Use Tool</a>
            </div>

            <div class="tool-item file-tools">
                <img src="images/icons/file-converter.svg" alt="File Tool Icon" width="75" height="75">
                <h3>PDF Converter</h3>
                <p>Convert PDFs to Word, Excel, images, and more, preserving layout and content.</p>
                <a href="#" class="tool-btn">Use Tool</a>
            </div>

            <div class="tool-item image-tools">
                <img src="images/icons/img-compressor.svg" alt="Image Tool Icon" width="75" height="75">
                <h3>Image Compressor</h3>
                <p>Compress JPG, PNG, and WebP images while keeping high visual quality.</p>
                <a href="#" class="tool-btn">Use Tool</a>
            </div>

            <div class="tool-item image-tools">
                <img src="images/icons/img-resizer.svg" alt="Image Tool Icon" width="75" height="75">
                <h3>Image Resizer</h3>
                <p>Resize images by pixels or proportions without losing quality.</p>
                <a href="#" class="tool-btn">Use Tool</a>
            </div>

            <div class="tool-item image-tools">
                <img src="images/icons/back-remover.svg" alt="Image Tool Icon" width="75" height="75">
                <h3>Background Remover</h3>
                <p>Instantly remove the background from any image, perfect for e-commerce and design.</p>
                <a href="#" class="tool-btn">Use Tool</a>
            </div>

            <div class="tool-item audio-tools">
                <img src="images/icons/extract-mp4.svg" alt="Audio Tool Icon" width="75" height="75">
                <h3>Extract from MP4</h3>
                <p>Quickly extract audio as MP3 or WAV from any MP4 video.</p>
                <a href="#" class="tool-btn">Use Tool</a>
            </div>

            <div class="tool-item audio-tools">
                <img src="images/icons/font.svg" alt="Audio Tool Icon" width="75" height="75">
                <h3>Speech to Text</h3>
                <p>Transcribe audio or video recordings into editable text with high accuracy.</p>
                <a href="#" class="tool-btn">Use Tool</a>
            </div>

            <div class="tool-item video-tools">
                <img src="images/icons/video-converter.svg" alt="Video Tool Icon" width="75" height="75">
                <h3>Video Converter</h3>
                <p>Convert videos to various formats (MP4, MOV, WebM) for web or mobile devices.</p>
                <a href="#" class="tool-btn">Use Tool</a>
            </div>

            <div class="tool-item utilities-tools">
                <img src="images/icons/qrcode.svg" alt="Utilities Tool Icon" width="75" height="75">
                <h3>QR Generator</h3>
                <p>Create custom QR codes for URLs, text, contacts, and more.</p>
                <a href="#" class="tool-btn">Use Tool</a>
            </div>
        </div>

    </section>

    <div class="divider"></div>

    <section class="contact">
        <div class="contact-text">
            <h2>Contact Us</h2>
            <h3>Have questions, suggestions or partnership ideas?<br>Reach out to us anytime.</h3>
            <p>Alternatively, you can reach us at <a href="mailto:support@toolsify.com">support@toolsify.com</a></p>
        </div>
        <div class="form-img">
            <img src="images/formImg.png" alt="Contact Form Image">
            <div class="contact-form">
                <form action="form-validator.php" method="post" novalidate>
                    <div class="form-group">
                        <label for="name">Name / Company Name*</label>
                        <input type="text" id="name" name="name" placeholder="Enter your name or company name" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email*</label>
                        <input type="email" id="email" name="email" placeholder="Enter your email" required>
                    </div>

                    <div class="form-group">
                        <label for="phone">Phone (optional)</label>
                        <input type="tel" id="phone" name="phone" placeholder="Enter your phone number">
                    </div>

                    <div class="form-group">
                        <label for="message">Message*</label>
                        <textarea id="message" name="message" rows="4" placeholder="Enter your message"
                            required></textarea>
                    </div>

                    <div class="privacy-policy">
                        <input type="checkbox" id="privacy" name="privacy" required>
                        <span>By submitting, you agree to our <a href="privacy-policy.php" target="_blank"
                                rel="noopener noreferrer">Privacy Policy</a></span>
                    </div>

                    <button type="submit" class="submit-btn">Contact Us Now</button>
                </form>
            </div>
        </div>
    </section>

    <?php include 'components/footer.php'; ?>

    <script src="tracker.js" defer></script>
    <script src="script.js" defer></script>

    <!-- Form Validation Script -->
    <script defer>
        const form = document.querySelector('form');

        form.addEventListener('submit', (e) => {
            if (!form.checkValidity()) {
                e.preventDefault();
                form.reportValidity();
                return;
            }

            const nameEl = document.getElementById('name');
            const nameVal = nameEl.value.trim();
            const nameRegex = /^(?!.*\d)[A-Za-zÀ-ÖØ-öø-ÿ .,'’-]{2,}$/;

            if (!nameRegex.test(nameVal)) {
                e.preventDefault();
                nameEl.setCustomValidity('Il nome non può contenere numeri.');
                nameEl.reportValidity();
            } else {
                nameEl.setCustomValidity('');
            }

            const email = document.getElementById('email');
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/;

            if (!emailRegex.test(email.value.trim())) {
                e.preventDefault();
                email.setCustomValidity('Inserisci una email valida nel formato xxx@xxx.xx');
                email.reportValidity();
            } else {
                email.setCustomValidity('');
            }

        });

        document.getElementById('name').addEventListener('input', (e) => {
            e.target.setCustomValidity('');
        });

        document.getElementById('email').addEventListener('input', (e) => {
            e.target.setCustomValidity('');
        });
    </script>


</html>