<?php

/*thomas added to test (need to look into this more)*/
/*add_action( 'wp_enqueue_scripts', 'enqueue_parent_theme_style' );
function enqueue_parent_theme_style() 
{
    wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
}
*/
add_action( 'wp_enqueue_scripts', 'laread_child_style' );
function laread_child_style()
{
    wp_enqueue_style( 'laread-child-style', get_stylesheet_uri() );
    // ^ \/ either of these enqueue the child style correctly
    // wp_enqueue_style( 'style', get_stylesheet_uri() );

    // For either a plugin or a theme, you can then enqueue the script:
}



function dequeue_laread_script() {
	wp_dequeue_script('laread-script');
	wp_deregister_script('laread-script');
}
add_action('wp_enqueue_scripts','dequeue_laread_script',100);

function enqueue_child_laread_script(){
    wp_enqueue_script('laread-script.js', get_stylesheet_directory_uri().'/assets/js/laread-script.js', array('jquery'));
}
add_action('wp_enqueue_scripts','enqueue_child_laread_script',100);

function union_scripts() {
    wp_enqueue_script('union-script', get_stylesheet_directory_uri().'/assets/js/union-script.js', array('jquery'));

}
//priority 100 to make sure it loads after parent (just to be safe)
//add_action('wp_enqueue_scripts','union_scripts',100);