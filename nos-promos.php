<?php
/**
 * Template Name: Page Nos Promos
 */

global $paged;
if (!isset($paged) || !$paged){
    $paged = 1;
}

$context = Timber::context();
$args = array(
	// 'post_type' => 'post',
    'post_type' => 'promo',
    'order_by' => 'date',
    'order' => 'DESC',
    'posts_per_page' => 5,
    'paged' => $paged,
    // 'category_name' => 'promos',
    'post_status' => 'publish'
);
$timber_post = new Timber\Post();
// $context['promos'] = Timber::get_posts($args);
$context['promos'] = new Timber\PostQuery($args);
$context['post'] = $timber_post;
Timber::render( array( 'page-nos-promos.twig' ), $context ); 