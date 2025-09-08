<?php require __DIR__ . '/config.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Compress, convert, merge and download files online for free. Tools for images, videos, audio and PDFs—fast, secure and unlimited on any device.">

    <meta name="robots" content="index,follow,max-image-preview:large">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Compress, Convert & Manage Files Online | Toolsify">
    <meta property="og:description"
        content="Free tools for images, videos, audio and PDFs: compress, convert, merge and download—fast and unlimited.">
    <meta property="og:url" content="https://www.tuodominio.tld/">
    <meta property="og:image" content="https://www.tuodominio.tld/images/og-home.png">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Toolsify — Free File Tools">
    <meta name="twitter:description" content="Compress, convert, merge and download files online. Free & fast.">

    <title>Toolsify — Free File Tools: Compress, Convert & Merge</title>

    <link rel="canonical" href="https://www.usetoolsify.com/">
    <link rel="icon" type="image/x-icon" href="images/icons/favicon.ico">
    <link rel="stylesheet" href="style.css">

    <!-- WebSite -->
    <script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "WebSite",
  "name": "Toolsify",
  "url": "https://usetoolsify.com/",
  "inLanguage": "en",
  "publisher": {
    "@type": "Organization",
    "name": "Toolsify",
    "url": "https://usetoolsify.com/"
  }
  /* Se in futuro aggiungi una pagina di ricerca, puoi riattivare questa parte:
  ,
  "potentialAction": {
    "@type": "SearchAction",
    "target": "https://usetoolsify.com/search?q={query}",
    "query-input": "required name=query"
  }
  */
}
</script>

    <!-- Organization -->
    <script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Organization",
  "name": "Toolsify",
  "url": "https://usetoolsify.com/",
  "logo": "https://usetoolsify.com/images/logo.png",
  "email": "support@usetoolsify.com",
  "contactPoint": [{
    "@type": "ContactPoint",
    "contactType": "customer support",
    "email": "support@usetoolsify.com",
    "availableLanguage": ["en","it"]
  }],
  "sameAs": [
    /* Inserisci eventuali profili social pubblici, es.:
    "https://www.linkedin.com/company/toolsify",
    "https://twitter.com/toolsify"
    */
  ]
}
</script>

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

    <section class="filters-section" id="filters-section">
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

        <div class="btn-filters" role="group" aria-label="Filtri strumenti">
            <a href="#" class="filter-btn blue-btn" data-filter="all" aria-pressed="true">All Tools</a>
            <a href="#" class="filter-btn" data-filter="file" aria-pressed="false">File</a>
            <a href="#" class="filter-btn" data-filter="image" aria-pressed="false">Image</a>
            <a href="#" class="filter-btn" data-filter="video" aria-pressed="false">Video</a>
            <a href="#" class="filter-btn" data-filter="audio" aria-pressed="false">Audio</a>
            <a href="#" class="filter-btn" data-filter="utilities" aria-pressed="false">Utilities</a>
        </div>

    </section>

    <section class="tools-section" id="tools-section">

        <div class=" tools-container">
            <div class="tool-item file-tools">
                <img src="images/icons/file-compressor.svg" alt="File Tool Icon" width="75" height="75" loading="lazy"
                    decoding="async">
                <h3>File Compressor</h3>
                <p>Reduce file size while keeping original quality, perfect for faster sharing and storage.</p>
                <a href="file-compressor/?type=pdf" class="tool-btn">Use Tool</a>
            </div>

            <div class="tool-item file-tools">
                <img src="images/icons/file-merge-split.svg" alt="File Tool Icon" width="75" height="75" loading="lazy"
                    decoding="async">
                <h3>PDF Merge & Split</h3>
                <p>Combine multiple PDFs into one or split them in seconds with no formatting loss.</p>
                <a href="pdf-merge-split/" class="tool-btn">Use Tool</a>
            </div>

            <div class="tool-item file-tools">
                <img src="images/icons/file-converter.svg" alt="File Tool Icon" width="75" height="75" loading="lazy"
                    decoding="async">
                <h3>PDF Converter</h3>
                <p>Convert PDFs to Word, Excel, images, and more, preserving layout and content.</p>
                <a href="in-progress.php" class="tool-btn">Use Tool</a>
            </div>

            <div class="tool-item image-tools">
                <img src="images/icons/img-compressor.svg" alt="Image Tool Icon" width="75" height="75" loading="lazy"
                    decoding="async">
                <h3>Image Compressor</h3>
                <p>Compress JPG, PNG, and WebP images while keeping high visual quality.</p>
                <a href="file-compressor/?type=image" class="tool-btn">Use Tool</a>
            </div>

            <div class="tool-item image-tools">
                <img src="images/icons/img-resizer.svg" alt="Image Tool Icon" width="75" height="75" loading="lazy"
                    decoding="async">
                <h3>Image Resizer</h3>
                <p>Resize images by pixels or proportions without losing quality.</p>
                <a href="image-resizer/" class="tool-btn">Use Tool</a>
            </div>

            <div class="tool-item image-tools">
                <img src="images/icons/back-remover.svg" alt="Image Tool Icon" width="75" height="75" loading="lazy"
                    decoding="async">
                <h3>Background Remover</h3>
                <p>Instantly remove the background from any image, perfect for e-commerce and design.</p>
                <a href="#" class="tool-btn">Use Tool</a>
            </div>

            <div class="tool-item audio-tools">
                <img src="images/icons/extract-mp4.svg" alt="Audio Tool Icon" width="75" height="75" loading="lazy"
                    decoding="async">
                <h3>Extract from MP4</h3>
                <p>Quickly extract audio as MP3 or WAV from any MP4 video.</p>
                <a href="in-progress.php" class="tool-btn">Use Tool</a>
            </div>

            <div class="tool-item audio-tools">
                <img src="images/icons/extract-mp4.svg" alt="Audio Tool Icon" width="75" height="75" loading="lazy"
                    decoding="async">
                <h3>Audio Compressor</h3>
                <p>Compress audio files online for free with Toolsify. Reduce size while maintaining high quality.</p>
                <a href="file-compressor/?type=audio" class="tool-btn">Use Tool</a>
            </div>

            <div class="tool-item audio-tools">
                <img src="images/icons/font.svg" alt="Audio Tool Icon" width="75" height="75" loading="lazy"
                    decoding="async">
                <h3>Speech to Text</h3>
                <p>Transcribe audio or video recordings into editable text with high accuracy.</p>
                <a href="in-progress.php" class="tool-btn">Use Tool</a>
            </div>

            <div class="tool-item video-tools">
                <img src="images/icons/video-converter.svg" alt="Video Tool Icon" width="75" height="75" loading="lazy"
                    decoding="async">
                <h3>Video Converter</h3>
                <p>Convert videos to various formats (MP4, MOV, WebM) for web or mobile devices.</p>
                <a href="in-progress.php" class="tool-btn">Use Tool</a>
            </div>

            <div class="tool-item video-tools">
                <img src="images/icons/video-converter.svg" alt="Video Tool Icon" width="75" height="75" loading="lazy"
                    decoding="async">
                <h3>Video Compressor</h3>
                <p>Compress videos while maintaining high quality for faster loading and sharing.</p>
                <a href="file-compressor/?type=video" class="tool-btn">Use Tool</a>
            </div>

            <div class="tool-item utilities-tools">
                <img src="images/icons/qrcode.svg" alt="Utilities Tool Icon" width="75" height="75" loading="lazy"
                    decoding="async">
                <h3>QR Generator</h3>
                <p>Create custom QR codes for URLs, text, contacts, and more.</p>
                <a href="qr-code/" class="tool-btn">Use Tool</a>
            </div>
        </div>

    </section>

    <div class="divider"></div>

    <section class="contact" id="contact">
        <div class="contact-text">
            <h2>Contact Us</h2>
            <h3>Have questions, suggestions or partnership ideas?<br>Reach out to us anytime.</h3>
            <p>Alternatively, you can reach us at <a href="mailto:support@toolsify.com">support@toolsify.com</a></p>
        </div>
        <div class="form-img">
            <img src="images/formImg.png" alt="Contact Form Image" loading="lazy">
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

    <section class="about-us" id="about-us">
        <img src="images/logo.png" alt="Logo" class="about-logo" height="250" width="125" loading="lazy"
            decoding="async">
        <div class="about-group">
            <div class="about-text">
                <h2>About Us</h2>
                <p>ToolSify is a free online suite of tools designed to make file, image, audio, and video management
                    simple
                    and accessible to everyone.
                    Fast, intuitive, and secure.</p>
            </div>
            <img src="images/aboutUs.png" alt="About Us" width="250" height="auto" loading="lazy" decoding="async">
        </div>

        <div class="about-group">
            <div class="about-text">
                <h2>Our Mission</h2>
                <p>We believe digital tools should be simple, accessible, and free.
                    ToolSify was built to eliminate unnecessary complexity and make everyday tasks like merging PDFs,
                    resizing images, or converting videos just a matter of a few clicks.</p>
            </div>
            <img src="images/mission.png" alt="Our Mission" width="250" height="250" loading="lazy" decoding="async">
        </div>

        <div class="about-group">
            <div class="about-text">
                <h2>Who We Are</h2>
                <p>ToolSify was created by a passionate web developer who wanted to combine modern design, usability,
                    and
                    functionality into one platform. This project is also part of a professional portfolio, showcasing
                    both
                    front-end and back-end development skills.</p>
            </div>
            <img src="images/whoWeAre.png" alt="Who We Are" width="250" height="250" loading="lazy" decoding="async">
        </div>

        <div class="ending-cta">
            <h2>Start Using ToolSify Today!</h2>
            <p>Discover all our free tools and features designed to simplify your digital tasks.</p>
            <a href="#tools-section" class="hero-btn-1">Explore All Tools</a>
        </div>

    </section>

    <?php include 'components/footer.php'; ?>

    <script src="filters.js" defer></script>
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