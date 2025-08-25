<header>
    <div class="header-img">
        <a href="index.php"><img src="images/logo.png" alt="toolsify-logo" class="logo-header" width="150" height="75"></a>
    </div>
    <div class="link-header">
        <a href="#tools-section">ALL TOOLS</a>
        <a href="#about-us">ABOUT</a>
        <a href="#contact" class="contact-header hero-btn-2">CONTACT</a>
    </div>
    <div class="hamburger-btn" aria-controls="mobile-menu" aria-expanded="false" role="button" tabindex="0">
        <img src="images/icons/hamburger-menu.svg" alt="Open menu" width="30" height="30">
    </div>
</header>

<section id="mobile-menu" class="menu-opened">
    <button class="close-btn" aria-label="Close menu">&times;</button>
    <div class="menu">
        <div class="menu-img">
            <img src="images/logo.png" alt="toolsify-logo" class="logo-header" width="150" height="75">
        </div>
        <div class="link-menu">
            <a href="#tools-section">ALL TOOLS</a>
            <a href="#about-us">ABOUT</a>
        </div>
        <div class="contact-btn">
            <a href="#contact" class="contact-header hero-btn-2" id="contact-menu">CONTACT</a>
        </div>
    </div>
</section>

<style>
    header {
        display: flex;
        justify-content: space-around;
        align-items: center;
        background-color: var(--header-background);
        height: 100px;
        box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.25);
    }

    .header-img {
        padding-left: 50px;
    }

    .logo-header {
        width: 150px;
        height: 75px;
    }

    .link-header {
        display: none;
        align-items: center;
    }

    .link-header .hero-btn-2 {
        width: 150px !important;
    }

    @media (min-width:768px) {

        header {
            justify-content: space-between;
            padding: 0 24px;
        }

        .header-img {
            padding-left: 0px !important;
        }

        .logo-header {
            justify-self: center;
        }

        .link-header {
            display: flex;
            gap: 5em;
        }

        .hamburger-btn {
            display: none;
        }
    }

    @media (min-width:1024px) {

        header {
            justify-content: space-between;
            padding: 0 24px;
        }

        .logo-header {
            justify-self: center;
        }

        .link-header {
            padding-right: 50px;
            display: flex;
            gap: 5em;
        }

        .hamburger-btn {
            display: none;
        }
    }

    /* MENU SECTION */
    .menu-opened {
        position: fixed;
        inset: 0;
        height: 100vh;
        width: 100vw;
        background: #0f172a;
        color: #fff;
        display: grid;
        place-items: center;
        z-index: 9999;
        transform: translateX(-100%);
        opacity: 0;
        pointer-events: none;
        transition: transform 0.4s ease, opacity 0.4s ease;
    }

    .menu-opened.is-open {
        transform: translateX(0);
        opacity: 0.97;
        pointer-events: auto;
    }

    .menu {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: space-between;
        height: 40vh;
        width: min(720px, 90vw);
        text-align: center;
    }

    .link-menu a {
        display: block;
        font-size: clamp(1.2rem, 4vw, 2rem);
        padding: .8rem 0;
        text-decoration: none;
        color: inherit;
    }

    .menu-opened .contact-header{
        padding: 15px 35px !important;
    }

    .close-btn {
        position: absolute;
        top: 1rem;
        right: 1rem;
        font-size: 2rem;
        background: none;
        border: none;
        color: white;
        cursor: pointer;
        z-index: 10000;
    }

    .close-btn:focus {
        outline: 2px solid #fff;
    }
</style>

<script defer>
    document.addEventListener('DOMContentLoaded', () => {
        const hamburgerBtn = document.querySelector('.hamburger-btn');
        const menu = document.getElementById('mobile-menu');
        const links = menu.querySelectorAll('.link-menu a');
        const contactBtn = document.getElementById('contact-menu');

        const closeBtn = document.querySelector('.close-btn');

        if (closeBtn) {
            closeBtn.addEventListener('click', () => {
                closeMenu();
            });
        }

        function openMenu() {
            menu.classList.add('is-open');
            document.body.style.overflow = 'hidden';
            hamburgerBtn.setAttribute('aria-expanded', 'true');
            links[0]?.focus();
        }

        function closeMenu() {
            menu.classList.remove('is-open');
            document.body.style.overflow = '';
            hamburgerBtn.setAttribute('aria-expanded', 'false');
            hamburgerBtn.focus();
        }

        function toggleMenu() {
            if (menu.classList.contains('is-open')) {
                closeMenu();
            } else {
                openMenu();
            }
        }

        hamburgerBtn.addEventListener('click', (e) => {
            e.preventDefault();
            toggleMenu();
        });

        hamburgerBtn.addEventListener('keydown', (e) => {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                toggleMenu();
            }
        });

        links.forEach(a => a.addEventListener('click', closeMenu));

        contactBtn?.addEventListener('click', closeMenu);

    });
</script>