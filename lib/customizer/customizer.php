<?php

add_theme_support( 'custom-background' );

// Determine if the user is using the advanced builder or not
$advanced_builder = get_option('shoestrap_advanced_compiler');
// Turn off the advanced builder on multisite
if ( is_multisite() && !is_super_admin() ) {
  $advanced_builder == '';
}

require_once locate_template( '/lib/customizer/functions/textarea-control.php' );     // Textarea Control

require_once locate_template( '/lib/customizer/navbar/functions.php' );               // NavBar Customizer
require_once locate_template( '/lib/customizer/hero/functions.php' );                 // Hero Customizer
require_once locate_template( '/lib/customizer/typography/functions.php' );           // Typography Customizer

require_once locate_template( '/lib/customizer/functions/sections.php' );             // Create Customizer Sections
require_once locate_template( '/lib/customizer/functions/settings.php' );             // Create Customizer Settings
require_once locate_template( '/lib/customizer/functions/controls.php' );             // Create Customizer Controls
require_once locate_template( '/lib/customizer/functions/remove-controls.php' );               // Extra Functions for the customizer
require_once locate_template( '/lib/customizer/functions/logo.php' );                 // Customizer Logo functions
require_once locate_template( '/lib/customizer/functions/social.php' );               // Customizer Social functions
require_once locate_template( '/lib/customizer/functions/social-script.php' );        // Social Script
require_once locate_template( '/lib/customizer/functions/login.php' );                // Login screen customizations
require_once locate_template( '/lib/customizer/functions/fluid-classes.php' );        // Functions to make fluid layouts work
require_once locate_template( '/lib/customizer/functions/color-functions.php' );      // Color functions

// Apply the selected styles:
require_once locate_template( '/lib/customizer/styles/branding.php' );                // Branding (header) region, containing the logo etc.
require_once locate_template( '/lib/customizer/styles/background.php' );              // Page and wrap background

if ( $advanced_builder != 1 ) {
  require_once locate_template( '/lib/customizer/navbar/styles.php' );                // NavBar styles
  require_once locate_template( '/lib/customizer/typography/styles.php' );            // Typography styling
  require_once locate_template( '/lib/customizer/styles/buttons.php' );               // Buttons
}
require_once locate_template( '/lib/customizer/hero/styles.php' );                    // Hero
require_once locate_template( '/lib/customizer/styles/footer.php' );                  // Footer
require_once locate_template( '/lib/customizer/styles/advanced.php' );                // Custom CSS and/or JS on the head and the footer
require_once locate_template( '/lib/customizer/styles/sidebar.php' );                 // Sidebar Class
require_once locate_template( '/lib/customizer/styles/social.php' );                  // Social Sharing Styles

//Templating changes
require_once locate_template( '/lib/customizer/templates/social-links.php' );         // Social Links
require_once locate_template( '/lib/customizer/templates/branding.php' );             // Customizer Branding functions
require_once locate_template( '/lib/customizer/templates/footer-icon.php' );          // Customizer footer icon
require_once locate_template( '/lib/customizer/templates/hero.php' );                 // Hero Region
require_once locate_template( '/lib/customizer/templates/loginbutton.php' );          // Login button
require_once locate_template( '/lib/customizer/templates/nav_searchbox.php' );        // Searchbox on navbars

if ( $advanced_builder == 1 ) {
  require_once locate_template( '/lib/customizer/custom-builder/custom-builder.php'); // Custom Bootstrap Builder
}
