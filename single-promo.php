<?php
/**
 * The Template for displaying all single posts
 *
 * Methods for TimberHelper can be found in the /lib sub-directory
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since    Timber 0.1
 */

global $post;

$context = Timber::context();

$args = array(
    'post_type' => 'post',
    'orderby' => 'menu_order',
    'order'   => 'DESC',
    'posts_per_page' => 4,
    'post__not_in' => array($post->ID),
    'post_status' => 'publish'
);


$args_promos = array(
    'post_type' => 'promo',
    'orderby' => 'menu_order',
    'order'   => 'DESC',
    // 'posts_per_page' => 10,
    'post__not_in' => array($post->ID),
    'post_status' => 'publish'
);

$timber_post = Timber::query_post();
$context['post'] = $timber_post;
$context['posts'] = new Timber\PostQuery($args);
$context['promos'] = new Timber\PostQuery($args_promos);

if ( post_password_required( $timber_post->ID ) ) {
	Timber::render( 'single-password.twig', $context );
} else {
	Timber::render( array( 'single-' . $timber_post->ID . '.twig', 'single-' . $timber_post->post_type . '.twig', 'single-' . $timber_post->slug . '.twig', 'single.twig' ), $context );
}
