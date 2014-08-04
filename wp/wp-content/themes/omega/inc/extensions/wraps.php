<?php

function omega_wrap_open() {
  echo '<div class="wrap">';
}

function omega_wrap_close() {
  echo '</div><!-- .wrap -->';
}

add_action('omega_header', 'omega_wrap_open', 7 );
add_action('omega_header', 'omega_wrap_close' );

add_action('omega_before_main', 'omega_wrap_open', 7 );
add_action('omega_after_main', 'omega_wrap_close' );

add_action('omega_before_primary_menu', 'omega_wrap_open', 7 );
add_action('omega_after_primary_menu', 'omega_wrap_close' );

add_action('omega_footer', 'omega_wrap_open', 7 );
add_action('omega_footer', 'omega_wrap_close' );

?>