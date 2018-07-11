<?php


function megamenuwp_theme_setup_support( $result, $feature = false, $args = false ){
    $current_theme = wp_get_theme();
    $slug = $current_theme->get_template();
    $options = false;

    $themes = array(
        'onepress' => array(
             'custom_css' => '#megamenu-wp-page .megamenu-wp.onepress-menu.onepress-menu-mobile{ position: absolute; };'
        ),
        'wellness' => array(
             'custom_css' => '.nav-menu .menu-item .mega-content { display: none; } .nav-menu .menu-item:hover .mega-content { display: block; } '
        ),
        'wellness-pro' => 'wellness',
        'screenr' => array(
            'mobile_mod'        => 991,
            'parent_level'      => 3,
        ),
        'boston' => array(
            'mobile_mod'        => 991,
            'parent_level'      => 0,
        ),
        'boston-pro' => 'boston',
        'activello' => array(
            'mobile_mod'        => 767,
            'parent_level'      => 3,
        ),
        'alchem' => array(
            'mobile_mod'        => 767,
            'parent_level'      => 2,
        ),
        'athena' => array(
            'mobile_mod'        => 1022,
            'parent_level'      => 0,
            'ul_css'            => ' padding-top: 45px; ',
        ),
        'colormag' => array(
            'mobile_mod'        => 767,
            'parent_level'      => 0,
        ),
        'education-base' => array(
            'mobile_mod'        => 1023,
            'parent_level'      => 0,
        ),
        'education' => 'education-base',
        'mh-magazine-lite' => array(
            'mobile_mod'        => 767,
            'parent_level'      => 0,
        ),
        'sydney' => array(
            'mobile_mod'        => 767,
            'parent_level'      => 0,
            'ul_css'            => ' padding-top: 15px; ',
        ),
        'flash' => array(
            'mobile_mod'        => 980,
            'parent_level'      => 4,
        ),
        'optimizer' => array(
            'mobile_mod'        => 959,
            'parent_level'      => 3,
        ),
        'llorix-one-lite' => array(
            'mobile_mod'        => 767,
            'parent_level'      => 4,
        ),
        'llorix-one' => 'llorix-one-lite',
        'total' => array(
            'mobile_mod'        => 999,
            'custom_css' => '.ht-main-navigation ul ul.mega-content { margin-top: 0px; } .ht-main-navigation ul ul.mega-content .mega-content-inner { margin-top: 27px; }'
        ),
        'storefront' => array(
            'mobile_mod'        => 959,
            'parent_level'      => 1,
        ),
        'twentyseventeen' => array(
            'mobile_mod'        => 767,
            'parent_level'      => 0,
        ),
        'zerif-lite' => array(
            'mobile_mod'        => 767,
            'parent_level'      => 0,
            'margin_top'        => 15
        ),
        'zerif' => 'zerif-lite',
        'one-page-express' => array(
            'mobile_mod'        => 767,
            'parent_level'      => 0,
            //'margin_top'        => 15
        ),
        'shop-isle' => array(
            'mobile_mod'        => 767,
        ),
        'poseidon' => array(
            'mobile_mod'        => 961,
        ),
        'generatepress' => array(
            'mobile_mod'        => 768,
            'custom_css' => '.megamenu-wp-mobile #megamenu-wp-page .megamenu-wp .mega-item .mega-content .mega-tab-post-nav .li { padding: 0px; } .megamenu-wp-mobile #megamenu-wp-page .megamenu-wp .mega-item .mega-content .mega-menu-item a { padding-left: 8px; }'
        ),
    );

    if ( isset( $themes[ $slug ] ) ) {
        $key = $themes[ $slug ];
        if ( is_string( $key ) ) {
            if ( isset( $themes[ $key ] ) ) {
                $options = $themes[ $key ];
            }
        } else {
            $options = $key;
        }
    }

    if ( $options ) {
        if ( is_array( $result ) && ! $feature ) {
            return  array_merge( $result, $options );
        } elseif ( $feature ) {

            if ( isset( $options[ $feature ] )  ) {
                return $options[ $feature ];
            }
            return $result;
        }
    }

    return $result;
}

add_filter( 'megamenu_wp_get_theme_support', 'megamenuwp_theme_setup_support', 10, 3 );