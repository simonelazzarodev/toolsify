<footer class="footer">
    <div class="footer__inner">
        <div class="footer__top">
            <div class="footer__brand">
                <img src="images/logo.png" alt="Toolsify Logo" class="footer__logo" width="100" height="100">
                <p class="footer__tagline">
                    Free tools to manage your files, images, audio and videos online.
                </p>
            </div>

            <nav class="footer__col" aria-label="Quick Links">
                <h3 class="footer__title">Quick Links</h3>
                <ul class="footer__list">
                    <li><a href="#">All Tools</a></li>
                    <li><a href="#">Blog</a></li>
                    <li><a href="#">About Us</a></li>
                </ul>
            </nav>

            <nav class="footer__col" aria-label="Legal">
                <h3 class="footer__title">Legal</h3>
                <ul class="footer__list">
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Terms of Service</a></li>
                    <li><a href="#">Disclaimer</a></li>
                </ul>
            </nav>

            <nav class="footer__col" aria-label="Contact Us">
                <h3 class="footer__title">Contact Us</h3>
                <ul class="footer__list">
                    <li><a href="mailto:hello@toolsify.com">Send us an Email</a></li>
                    <li><a href="#">Fill out the form</a></li>
                </ul>
            </nav>
        </div>

        <hr class="footer__divider" />

        <div class="footer__bottom">
            <p>© 2025 ToolSify – All rights reserved.</p>
        </div>
    </div>

    <!-- Tracker Arrow -->
    <button id="scrollTop" class="scrolltop" aria-label="Torna all'inizio" title="Torna su">
        <svg class="progress" viewBox="0 0 40 40" aria-hidden="true">
            <circle class="track" cx="20" cy="20" r="16"></circle>
            <circle class="fill" cx="20" cy="20" r="16" pathLength="1"></circle>
        </svg>
        <span class="arrow" aria-hidden="true">↑</span>
    </button>

</footer>

<style>
    :root {
        --brand: #2f6df6;
    }

    .footer {
        background: #f7f7f7;
        color: #0a0a0a;
        border-top: 4px solid var(--brand);
    }

    .footer__inner {
        max-width: 1200px;
        margin: 0 auto;
        padding: 24px 16px 32px;
    }

    .footer__top {
        display: grid;
        gap: 24px;
        text-align: center;
    }

    .footer__brand {
        display: grid;
        gap: 8px;
        justify-items: center;
    }

    .footer__tagline {
        max-width: 42ch;
        margin: 0;
        font-size: 16px;
        color: #0a0a0a;
    }

    .footer__col {
        display: grid;
        gap: 8px;
        text-align: center;
    }

    .footer__title {
        margin: 0 0 4px;
        font-size: 18px;
        font-weight: 700;
        color: var(--btn-blue, var(--brand));
    }

    .footer__list {
        list-style: none;
        margin: 0;
        padding: 0;
        display: grid;
        gap: 8px;
    }

    .footer__list a {
        text-decoration: none;
        color: #0a0a0a;
        font-size: 15px;
    }

    .footer__list a:hover,
    .footer__list a:focus-visible {
        text-decoration: underline;
    }

    .footer__divider {
        margin: 24px 0;
        border: 0;
        border-top: 1px solid #848484;
    }

    .footer__bottom {
        text-align: center;
        color: #666;
        font-size: 14px;
    }

    @media (min-width:768px) {
        .footer__inner {
            padding: 40px 24px;
        }

        .footer__top {
            grid-template-columns: repeat(3, minmax(180px, 1fr));
            gap: 32px;
            text-align: left;
            align-items: start;
        }

        .footer__brand {
            grid-column: 1 / -1;
            justify-items: start;
        }

        .footer__tagline {
            margin: 0;
            font-size: 17px;
            max-width: 60ch;
        }

        .footer__top>nav.footer__col:nth-of-type(1) {
            grid-column: 1;
        }

        .footer__top>nav.footer__col:nth-of-type(2) {
            grid-column: 2;
        }

        .footer__top>nav.footer__col:nth-of-type(3) {
            grid-column: 3;
        }

    }

    @media (min-width:1024px) {
        .footer__inner {
            padding: 50px;
        }

        .footer__top {
            gap: clamp(32px, 6vw, 72px);
        }

        .footer__tagline {
            max-width: 65ch;
        }
    }

    .footer__list a {
        outline: none;
    }

    .footer__list a:focus-visible {
        box-shadow: 0 0 0 2px var(--brand);
        border-radius: 4px;
    }

    /* START Tracker Arrow */
    .scrolltop {
        position: fixed;
        right: 20px;
        bottom: 20px;
        width: 56px;
        height: 56px;
        border: 0;
        border-radius: 50%;
        background: #fff;
        /* sfondo bianco */
        color: #0d6efd;
        /* colore anello/freccia */
        box-shadow: 0 8px 24px rgba(0, 0, 0, .12);
        cursor: pointer;
        display: grid;
        place-items: center;
        z-index: 9999;

        opacity: 0;
        transform: scale(.9);
        pointer-events: none;
        transition: opacity .2s ease, transform .2s ease, box-shadow .2s ease;
    }

    .scrolltop.show {
        opacity: 1;
        transform: scale(1);
        pointer-events: auto;
    }

    .scrolltop:focus-visible {
        outline: 3px solid rgba(13, 110, 253, .5);
        outline-offset: 2px;
    }

    .scrolltop:hover {
        box-shadow: 0 10px 28px rgba(0, 0, 0, .16);
    }

    .scrolltop .arrow {
        font-size: 20px;
        line-height: 1;
        position: relative;
        z-index: 2;
    }

    .scrolltop .progress {
        position: absolute;
        inset: 0;
        transform: rotate(-90deg);
    }

    .scrolltop .track,
    .scrolltop .fill {
        fill: none;
        stroke-width: 4;
        vector-effect: non-scaling-stroke;
    }

    .scrolltop .track {
        stroke: #e9ecef;
    }

    .scrolltop .fill {
        stroke: currentColor;
        stroke-linecap: butt;
    }

    /* END Tracker Arrow */
</style>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const btn = document.getElementById('scrollTop');
        if (!btn) return;

        const fill = btn.querySelector('.fill');
        const r = 16;
        const C = 2 * Math.PI * r;

        const EPS = 1;                      
        fill.style.strokeDashoffset = '0';   
        fill.style.strokeDasharray = `0 ${1 + EPS}`; 

        const showThreshold = 25;

        function progress() {
            const root = document.scrollingElement || document.documentElement;

            const scrollTop = root.scrollTop;
            const maxScroll = Math.max(root.scrollHeight - root.clientHeight, 1);

            let frac = scrollTop / maxScroll;
            if (frac < 0) frac = 0;
            if (frac > 1) frac = 1;

            if (frac >= 0.999) {
                fill.style.strokeDasharray = `${1 + EPS} 0`;     
            } else if (frac <= 0.001) {
                fill.style.strokeDasharray = `0 ${1 + EPS}`;     
            } else {
                fill.style.strokeDasharray = `${frac} ${1 + EPS}`;
            }

            btn.classList.toggle('show', scrollTop > showThreshold);
        }

        btn.addEventListener('click', (e) => {
            e.preventDefault();
            const prefersReduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
            if (prefersReduced) {
                window.scrollTo(0, 0);
            } else {
                window.scrollTo({ top: 0, behavior: 'smooth' });
            }
        });

        window.addEventListener('scroll', progress, { passive: true });
        window.addEventListener('resize', progress);

        progress();
    });

</script>