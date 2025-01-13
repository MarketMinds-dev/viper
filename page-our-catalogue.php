<?php get_header(); ?>

<?php viper_hero_section(); ?>
<section class="catalogue">
    <div class="button-container">
        <button id="languageSwitcher">Switch to AR</button>
    </div>
    <div id="shortcodeContainer">
        <?php
        $lang = isset($_GET['lang']) ? $_GET['lang'] : 'en';
        if ($lang === 'ar') {
            echo do_shortcode('[dflip id="427"][/dflip]');
        } else {
            echo do_shortcode('[dflip id="249"][/dflip]');
        }
        ?>
    </div>
</section>

<style>
    /* Style the button container */
    .button-container {
        text-align: right; /* Align button to the right */
        padding: 20px; /* Add padding around the button */
    }

    /* Style the button */
    #languageSwitcher {
        background-color: #f9d131;
        border: none;
        color: black; /* Black text */
        padding: 10px 20px; /* Some padding */
        text-align: center; /* Centered text */
        text-decoration: none; /* Remove underline */
        display: inline-block; /* Make it inline-block */
        font-size: 16px; /* Increase font size */
        margin: 10px 2px; /* Some margin */
        cursor: pointer; /* Pointer/hand icon */
        border-radius: 5px; /* Rounded corners */
        transition: background-color 0.3s ease; /* Smooth transition */
    }

    /* Add a darker background on mouse-over */
    #languageSwitcher:hover {
        background-color: #3d543f;
        color: white;
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const languageSwitcher = document.getElementById('languageSwitcher');
    const urlParams = new URLSearchParams(window.location.search);
    let currentLang = urlParams.get('lang') || 'en';

    languageSwitcher.textContent = currentLang === 'ar' ? 'Switch to ENG' : 'Switch to AR';

    languageSwitcher.addEventListener('click', function() {
        const newLang = currentLang === 'ar' ? 'en' : 'ar';
        urlParams.set('lang', newLang);
        window.location.search = urlParams.toString();
    });
});
</script>

<?php get_footer(); ?>
