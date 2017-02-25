<?php

    // Make composer installed php libraries available
    require_once(get_theme_root() . "/../plugins/composer-libs/autoload.php");

    //
    // Load WP Config files
    //

    // Theme Options
    function theme_options( $wp_customize ) {
        include_once 'footer.php';
        include_once 'integrations.php';
        include_once 'social.php';
    }

    add_action('customize_register', 'theme_options');


    // Post Types
    // include_once 'setup/post-types/heroes.php';


    // Taxonomies
    // include_once 'setup/taxonomies/featured.php';


    // Custom Twig filters
    include_once 'setup/twig-filters/dummy.php';
    include_once 'setup/twig-filters/slugify.php';
    include_once 'setup/twig-filters/twitterify.php';

    add_filter('get_twig', 'add_to_twig');

    function add_to_twig($twig) {
        /* this is where you can add your own fuctions to twig */
        $twig->addFilter('dummy', new Twig_Filter_Function('apply_dummy_filter'));
        $twig->addFilter('slugify', new Twig_Filter_Function('slugify'));
        $twig->addFilter('twitterify', new Twig_Filter_Function('twitterify'));
        return $twig;
    }


    // WP Helpers

    include_once 'setup/helpers/admin.php';
    include_once 'setup/helpers/env.php';
    include_once 'setup/helpers/global-variables.php';
    include_once 'setup/helpers/menus.php';
    include_once 'setup/helpers/rev.php';


    // Wordpress Theme Support Config
    // REMOVAL OF THESE = POTIENTAL LOSS OF DATA

    add_theme_support('post-formats');
    add_theme_support('post-thumbnails');
    add_theme_support('menus');


    // Enable Roots Soil

    add_theme_support('soil-clean-up');
    add_theme_support('soil-relative-urls');
    add_theme_support('soil-disable-trackbacks');
    add_theme_support('soil-nice-search');

?>
