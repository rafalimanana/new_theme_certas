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
    'posts_per_page' => 16,
    'post__not_in' => array($post->ID),
    'post_status' => 'publish'
);

$timber_post = Timber::query_post();
$context['post'] = $timber_post;
$context['posts'] = new Timber\PostQuery($args);

if ( post_password_required( $timber_post->ID ) ) {
	Timber::render( 'single-password.twig', $context );
} else {
	Timber::render( array( 'single-' . $timber_post->ID . '.twig', 'single-' . $timber_post->post_type . '.twig', 'single-' . $timber_post->slug . '.twig', 'single.twig' ), $context );
}
