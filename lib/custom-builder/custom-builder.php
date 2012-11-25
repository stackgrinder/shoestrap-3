<?php

require_once locate_template( '/lib/customizer/functions/extras.php' );                   // Extra Functions for the customizer
require_once locate_template( '/lib/custom-builder/components/customizer-sections.php' ); // Create Customizer Sections
require_once locate_template( '/lib/custom-builder/components/customizer-settings.php' ); // Create Customizer Settings
require_once locate_template( '/lib/custom-builder/components/customizer-controls.php' ); // Create Customizer Controls

/*
 * The content below is a copy of bootstrap's variables.less file.
 * 
 * Some options are user-configurable and stored as theme mods.
 * We try to minimize the options and simplify the user environment.
 * In order to do that, we 'll have to provide a minimum amount of options 
 * and calculate the rest based on the user's selections.
 * 
 * based on the textcolor and bodybackground, we can calculate the following options:
 * @black, @grayDarker, @grayDark, @gray, @grayLight, @grayLighter, @white
 * 
 * based on the baseBorderRadius we can calculate the borderRadiusLarge and borderRadiusSmall.
 * 
 * Only one option per button color is necessary.
 * 
 * The forms and dropdowns can both be derived from the text and background colors.
 * baseLineHeight can also be calculated from the baseFontSize,
 * but it's preferable to have a separate setting for that,
 * since some fonts have weird line height (especially if using Google Webfonts.)
 * 
 * The "form states and alerts" section can also be completely automated.
 * We can derive colors from other settings and based on the bodyBackground,
 * make the colors we need. :)
 * 
 * Responsive and layouts in general will be a little trickier,
 * we'll have to find a way to make is a simple and intuitive as possible.
 */
function shoestrap_custom_builder_rewrite_variables() {
  // main body & text colors
  $bodyBackground       = get_theme_mod( 'strp_cb_bodybackground' );
  $textColor            = get_theme_mod( 'strp_cb_textcolor' );
  
  // accent colors
  $blue                 = get_theme_mod( 'strp_cb_blue' );
  $blueDark             = get_theme_mod( 'strp_cb_bluedark' );
  $green                = get_theme_mod( 'strp_cb_green' );
  $red                  = get_theme_mod( 'strp_cb_red' );
  $yellow               = get_theme_mod( 'strp_cb_yellow' );
  $orange               = get_theme_mod( 'strp_cb_orange' );
  $pink                 = get_theme_mod( 'strp_cb_pink' );
  $purple               = get_theme_mod( 'strp_cb_purple' );
  
  // links
  $linkColor            = get_theme_mod( 'strp_cb_linkcolor' );
  
  // fonts
  $sansFontFamily       = get_theme_mod( 'strp_cb_sansfont' );
  $serifFontFamily      = get_theme_mod( 'strp_cb_serifont' );
  $monoFontFamily       = get_theme_mod( 'strp_cb_monofont' );
  $baseFontSize         = get_theme_mod( 'strp_cb_basefontsize' );
  $baseLineHeight       = get_theme_mod( 'strp_cb_baselineheight' );
  $fontSizeLarge        = get_theme_mod( 'strp_cb_fontsizelarge' );
  $fontSizeSmall        = get_theme_mod( 'strp_cb_fontsizesmall' );
  $fontSizeMini         = get_theme_mod( 'strp_cb_fontsizemini' );
  
  // border
  $baseBorderRadius     = get_theme_mod( 'strp_cb_baseborderradius' );
  
  // buttons
  $btnPrimaryBackground = get_theme_mod( 'strp_cb_btn_primary' );
  $btnInfoBackground    = get_theme_mod( 'strp_cb_btn_info' );
  $btnSuccessBackground = get_theme_mod( 'strp_cb_btn_success' );
  $btnWarningBackground = get_theme_mod( 'strp_cb_btn_warning' );
  $btnDangerBackground  = get_theme_mod( 'strp_cb_btn_danger' );
  
  // grids
  $gridWidthNormal      = get_theme_mod( 'strp_cb_gridwidth_normal' );
  $gridWidthWide        = get_theme_mod( 'strp_cb_gridwidth_wide' );
  $gridWidthNarrow      = get_theme_mod( 'strp_cb_gridwidth_narrow' );
  $gridGutterNormal     = get_theme_mod( 'strp_cb_gridgutter_normal' );
  $gridGutterWide       = get_theme_mod( 'strp_cb_gridgutter_wide' );

  $gridColumns          = 12;
  
  // navbar
  $navbarBackgroundHighlight = get_theme_mod( 'strp_cb_navbar_background' );
  
  $btnBackgroundHighlight = 'darken(' . $bodyBackground . ', 10%)';
  
  // calculate shadows of gray, depending on background and textcolor
  if ( shoestrap_get_brightness( $bodyBackground ) >= 128 ) {
    $black        = shoestrap_adjust_brightness( $textColor, -64 );
    $grayDarker   = shoestrap_adjust_brightness( $textColor, -17 );
  } else {
    $black        = shoestrap_adjust_brightness( $textColor, 64 );
    $grayDarker   = shoestrap_adjust_brightness( $textColor, 17 );
  }
  $grayDark     = shoestrap_adjust_brightness( $textColor, 0 );
  $gray         = shoestrap_mix_colors( $textColor, $bodyBackground, 83 );
  $grayLight    = shoestrap_mix_colors( $textColor, $bodyBackground, 50 );
  $grayLighter  = shoestrap_mix_colors( $textColor, $bodyBackground, 8 );
  $white        = shoestrap_adjust_brightness( $bodyBackground, 0 );
  
  $borderRadiusLarge  = round( $baseBorderRadius * 1.5 );
  $borderRadiusSmall  = round( $baseBorderRadius * 3 / 4 );

  // Link color (on hover) based on background brightness
  if ( shoestrap_get_brightness( $bodyBackground ) >= 50 ) {
    $linkColorHover = 'darken(@linkColor, 15%)';
  } else {
    $linkColorHover = 'lighten(@linkColor, 15%)';
  }
  
  // Table accents and border based on bodyBackground
  if ( shoestrap_get_brightness( $bodyBackground ) >= 50 ) {
    $tableBackgroundAccent  = shoestrap_adjust_brightness( $bodyBackground, -6 );
    $tableBackgroundHover   = shoestrap_adjust_brightness( $bodyBackground, -10 );
    $tableBorder            = shoestrap_adjust_brightness( $bodyBackground, -34 );
  } else {
    $tableBackgroundAccent  = shoestrap_adjust_brightness( $bodyBackground, 6 );
    $tableBackgroundHover   = shoestrap_adjust_brightness( $bodyBackground, 10 );
    $tableBorder            = shoestrap_adjust_brightness( $bodyBackground, 34 );
  }
  
  $inputBorder = shoestrap_mix_colors( $grayLight, $grayLighter, 50 );

  // Grid Columns
  $gridColumnNormal = number_format( ( $gridWidthNormal - ( $gridGutterNormal * ( $gridColumns - 1 ) ) ) / $gridColumns, 0 );
  $gridColumnWide   = number_format( ( $gridWidthWide - $gridGutterWide * $gridColumns ) / $gridColumns, 0 );
  $gridColumnNarrow = number_format( ( $gridWidthNarrow - $gridGutterNormal * ( $gridColumns + 1 ) ) / $gridColumns, 0 );
  
  // width of input elements
  $horizontalComponentOffset = 3 * $gridColumnNormal;
  
  // NavBar width
  $navbarCollapseWidth = ( ( $gridWidthNormal + ( 2 * $gridGutterNormal ) ) - 1 );
  
  // Calculate the text color of navbars based on the navbar background color.
  // Dark backgrounds call for light-colored text and vice-versa.
  if ( shoestrap_get_brightness( $navbarBackgroundHighlight ) >= 150 ) {
    $navbarText                 = shoestrap_adjust_brightness( $navbarBackgroundHighlight, -150 );
    $navbarLinkColorHover       = shoestrap_adjust_brightness( $navbarBackgroundHighlight, -190 );
    $navbarLinkColorActive      = shoestrap_adjust_brightness( $navbarBackgroundHighlight, -120 );
    $navbarLinkBackgroundActive = 'darken(@navbarBackground, 5%)';
  } else {
    $navbarText             = shoestrap_adjust_brightness( $navbarBackgroundHighlight, 150 );
    $navbarLinkColorHover   = shoestrap_adjust_brightness( $navbarBackgroundHighlight, 190 );
    $navbarLinkColorActive  = shoestrap_adjust_brightness( $navbarBackgroundHighlight, 120 );
    $navbarLinkBackgroundActive = 'lighten(@navbarBackground, 5%)';
  }

  // locate the variables file
  $variables_file = locate_template( 'assets/css/bootstrap-less/variables.less' );
  // open the variables file
  $fh = fopen($variables_file, 'w');
  // the content of the variables file
  $variables_content = '//
// Variables
// --------------------------------------------------


// Global values
// --------------------------------------------------


// Grays
// -------------------------
@black:                 ' . $black . ';
@grayDarker:            ' . $grayDarker . ';
@grayDark:              ' . $grayDark . ';
@gray:                  ' . $gray . ';
@grayLight:             ' . $grayLight . ';
@grayLighter:           ' . $grayLighter . ';
@white:                 ' . $white . ';


// Accent colors
// -------------------------
@blue:                  ' . $blue . ';
@blueDark:              ' . $blueDark . ';
@green:                 ' . $green . ';
@red:                   ' . $red . ';
@yellow:                ' . $yellow . ';
@orange:                ' . $orange . ';
@pink:                  ' . $pink . ';
@purple:                ' . $purple . ';


// Scaffolding
// -------------------------
@bodyBackground:        ' . $bodyBackground . ';
@textColor:             ' . $textColor . ';


// Links
// -------------------------
@linkColor:             ' . $linkColor . ';
@linkColorHover:        ' . $linkColorHover . ';


// Typography
// -------------------------
@sansFontFamily:        ' . $sansFontFamily . ';
@serifFontFamily:       ' . $serifFontFamily . ';
@monoFontFamily:        ' . $monoFontFamily . ';

@baseFontSize:          ' . $baseFontSize . 'px;
@baseFontFamily:        @sansFontFamily;
@baseLineHeight:        ' . $baseLineHeight . 'px;
@altFontFamily:         @serifFontFamily;

@headingsFontFamily:    inherit; // empty to use BS default, @baseFontFamily
@headingsFontWeight:    bold;    // instead of browser default, bold
@headingsColor:         inherit; // empty to use BS default, @textColor


// Component sizing
// -------------------------
// Based on 14px font-size and 20px line-height

@fontSizeLarge:         @baseFontSize * ' . $fontSizeLarge . '; // ~18px
@fontSizeSmall:         @baseFontSize * ' . $fontSizeSmall . '; // ~12px
@fontSizeMini:          @baseFontSize * ' . $fontSizeMini . '; // ~11px

@paddingLarge:          11px 19px; // 44px
@paddingSmall:          2px 10px;  // 26px
@paddingMini:           1px 6px;   // 24px

@baseBorderRadius:      ' . $baseBorderRadius . 'px;
@borderRadiusLarge:     ' . $borderRadiusLarge . 'px;
@borderRadiusSmall:     ' . $borderRadiusSmall . 'px;


// Tables
// -------------------------
@tableBackground:                   transparent; // overall background-color
@tableBackgroundAccent:             ' . $tableBackgroundAccent . '; // for striping
@tableBackgroundHover:              ' . $tableBackgroundHover . '; // for hover
@tableBorder:                       ' . $tableBorder . '; // table and cell border

// Buttons
// -------------------------
@btnBackground:                     ' . $bodyBackground . ';
@btnBackgroundHighlight:            darken(@white, 10%);
@btnBorder:                         rgba(0,0,0,.2);

@btnPrimaryBackground:              ' . $btnPrimaryBackground . ';
@btnPrimaryBackgroundHighlight:     spin(@btnPrimaryBackground, 20%);

@btnInfoBackground:                 ' . $btnInfoBackground . ';
@btnInfoBackgroundHighlight:        darken(spin(@btnInfoBackground, 15%), 7%);

@btnSuccessBackground:              ' . $btnSuccessBackground . ';
@btnSuccessBackgroundHighlight:     darken(spin(@btnSuccessBackground, 15%), 7%);

@btnWarningBackground:              ' . $btnWarningBackground . ';
@btnWarningBackgroundHighlight:     darken(@btnWarningBackground, 15%);

@btnDangerBackground:               ' . $btnDangerBackground . ';
@btnDangerBackgroundHighlight:      darken(spin(@btnDangerBackground, 15%), 7%);

@btnInverseBackground:              @grayDark;
@btnInverseBackgroundHighlight:     darken(@grayDark, 10%);


// Forms
// -------------------------
@inputBackground:               @white;
@inputBorder:                   ' . $inputBorder . ';
@inputBorderRadius:             @baseBorderRadius;
@inputDisabledBackground:       @grayLighter;
@formActionsBackground:         @tableBackgroundHover;
@inputHeight:                   @baseLineHeight + 10px; // base line-height + 8px vertical padding + 2px top/bottom border


// Dropdowns
// -------------------------
@dropdownBackground:            @white;
@dropdownBorder:                rgba(0,0,0,.2);
@dropdownDividerTop:            @grayLighter;
@dropdownDividerBottom:         @white;

@dropdownLinkColor:             @grayDark;
@dropdownLinkColorHover:        @white;
@dropdownLinkColorActive:       @dropdownLinkColor;

@dropdownLinkBackgroundActive:  @linkColor;
@dropdownLinkBackgroundHover:   @dropdownLinkBackgroundActive;



// COMPONENT VARIABLES
// --------------------------------------------------


// Z-index master list
// -------------------------
// Used for a birds eye view of components dependent on the z-axis
// Try to avoid customizing these :)
@zindexDropdown:          1000;
@zindexPopover:           1010;
@zindexTooltip:           1030;
@zindexFixedNavbar:       1030;
@zindexModalBackdrop:     1040;
@zindexModal:             1050;


// Sprite icons path
// -------------------------
@iconSpritePath:          "../img/glyphicons-halflings.png";
@iconWhiteSpritePath:     "../img/glyphicons-halflings-white.png";


// Input placeholder text color
// -------------------------
@placeholderText:         @grayLight;


// Hr border color
// -------------------------
@hrBorder:                @grayLighter;


// Horizontal forms & lists
// -------------------------
@horizontalComponentOffset:       ' . $horizontalComponentOffset . 'px;


// Wells
// -------------------------
@wellBackground:                  @tableBackgroundHover;


// Navbar
// -------------------------
@navbarCollapseWidth:             ' . $navbarCollapseWidth . 'px;
@navbarCollapseDesktopWidth:      @navbarCollapseWidth + 1;

@navbarHeight:                    40px;
@navbarBackgroundHighlight:       ' . $navbarBackgroundHighlight . ';
@navbarBackground:                darken(@navbarBackgroundHighlight, 5%);
@navbarBorder:                    darken(@navbarBackground, 12%);

@navbarText:                      ' . $navbarText . ';
@navbarLinkColor:                 @navbarText;
@navbarLinkColorHover:            ' . $navbarLinkColorHover . ';
@navbarLinkColorActive:           ' . $navbarLinkColorActive . ';
@navbarLinkBackgroundHover:       transparent;
@navbarLinkBackgroundActive:      ' . $navbarLinkBackgroundActive . ';

@navbarBrandColor:                @navbarLinkColor;

// Inverted navbar
@navbarInverseBackground:                #111111;
@navbarInverseBackgroundHighlight:       #222222;
@navbarInverseBorder:                    #252525;

@navbarInverseText:                      @grayLight;
@navbarInverseLinkColor:                 @grayLight;
@navbarInverseLinkColorHover:            @white;
@navbarInverseLinkColorActive:           @navbarInverseLinkColorHover;
@navbarInverseLinkBackgroundHover:       transparent;
@navbarInverseLinkBackgroundActive:      @navbarInverseBackground;

@navbarInverseSearchBackground:          lighten(@navbarInverseBackground, 25%);
@navbarInverseSearchBackgroundFocus:     @white;
@navbarInverseSearchBorder:              @navbarInverseBackground;
@navbarInverseSearchPlaceholderColor:    #ccc;

@navbarInverseBrandColor:                @navbarInverseLinkColor;


// Pagination
// -------------------------
@paginationBackground:                @white;
@paginationBorder:                    @tableBorder;
@paginationActiveBackground:          @tableBackgroundHover;


// Hero unit
// -------------------------
@heroUnitBackground:              @grayLighter;
@heroUnitHeadingColor:            inherit;
@heroUnitLeadColor:               inherit;


// Form states and alerts
// -------------------------
@warningText:             #c09853;
@warningBackground:       #fcf8e3;
@warningBorder:           darken(spin(@warningBackground, -10), 3%);

@errorText:               #b94a48;
@errorBackground:         #f2dede;
@errorBorder:             darken(spin(@errorBackground, -10), 3%);

@successText:             #468847;
@successBackground:       #dff0d8;
@successBorder:           darken(spin(@successBackground, -10), 5%);

@infoText:                #3a87ad;
@infoBackground:          #d9edf7;
@infoBorder:              darken(spin(@infoBackground, -10), 7%);


// Tooltips and popovers
// -------------------------
@tooltipColor:            @white;
@tooltipBackground:       @black;
@tooltipArrowWidth:       5px;
@tooltipArrowColor:       @tooltipBackground;

@popoverBackground:       @white;
@popoverArrowWidth:       10px;
@popoverArrowColor:       @white;
@popoverTitleBackground:  darken(@popoverBackground, 3%);

// Special enhancement for popovers
@popoverArrowOuterWidth:  @popoverArrowWidth + 1;
@popoverArrowOuterColor:  rgba(0,0,0,.25);



// GRID
// --------------------------------------------------


// Default 940px grid
// -------------------------
@gridColumns:             ' . $gridColumns . ';
@gridColumnWidth:         ' . $gridColumnNormal . 'px;
@gridGutterWidth:         ' . $gridGutterNormal . 'px;
@gridRowWidth:            ' . $gridWidthNormal . 'px;

// 1200px min
@gridColumnWidth1200:     ' . $gridColumnWide . 'px;
@gridGutterWidth1200:     ' . $gridGutterWide . 'px;
@gridRowWidth1200:        ' . $gridWidthWide . 'px;

// 768px-979px
@gridColumnWidth768:      ' . $gridColumnNarrow . 'px;
@gridGutterWidth768:      ' . $gridGutterNormal . 'px;
@gridRowWidth768:         ' . $gridWidthNarrow . 'px;


// Fluid grid
// -------------------------
@fluidGridColumnWidth:    percentage(' . number_format( ( $gridColumnNormal / $gridWidthNormal ), 4 ). ');
@fluidGridGutterWidth:    percentage(' . number_format( ( $gridGutterNormal / $gridWidthNormal ), 4 ) . ');

// 1200px min
@fluidGridColumnWidth1200:     percentage(' . number_format( ( $gridColumnWide / $gridWidthWide ), 4 ) . ');
@fluidGridGutterWidth1200:     percentage(' . number_format( ( $gridGutterWide / $gridWidthWide ), 4 ) . ');

// 768px-979px
@fluidGridColumnWidth768:      percentage(' . number_format( ( $gridColumnNarrow / $gridWidthNarrow ), 4 ) . ');
@fluidGridGutterWidth768:      percentage(' . number_format( ( $gridGutterNormal / $gridWidthNarrow), 4 ) . ');
';
  
  // write the content to the variations file
  fwrite( $fh, $variables_content );
  // close the file
  fclose( $fh );
}
add_action( 'wp', 'shoestrap_custom_builder_rewrite_variables' );
