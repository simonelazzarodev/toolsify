<header>
    <div class="link-header">
        <a href="#">ALL TOOLS</a>
        <a href="#">BLOG</a>
    </div>
    <img src="images/logo.png" alt="toolsify-logo" class="logo-header" width="100" height="100">
    <div class="link-header">
        <a href="#">ABOUT</a>
        <a href="#" class="contact-header">CONTACT</a>
    </div>
    <div class="hamburger-btn">
        <img src="images/icons/hamburger-menu.svg" alt="hamburger-menu" width="30" height="30">
    </div>
</header>

<style>
    header {
        display: flex;
        justify-content: space-around;
        align-items: center;
        background-color: var(--header-background);
        height: 100px;
        padding: 0 16px;
    }

    .logo-header {
        width: 100px;
        height: 100px;
    }

    .link-header {
        display: none;
    }

    @media (min-width:1024px) {

        header {
            display: grid;
            grid-template-columns: 1fr auto 1fr;
            align-items: center;
            gap: min(6vw, 64px);
            padding: 0 24px;
        }

        .logo-header {
            justify-self: center;
        }

        .link-header {
            display: flex;
            width: 100%;
            gap: 2rem;
            justify-content: space-evenly;
        }

        .hamburger-btn {
            display: none;
        }
    }
</style>