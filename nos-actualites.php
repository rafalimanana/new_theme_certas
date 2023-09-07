<?php
/**
 * Template Name: Page actualités
 */

global $paged;
if (!isset($paged) || !$paged){
    $paged = 1;
}


$context = Timber::context();

$l_args = array(
    'post_type' => 'post',
    'posts_per_page' => 1,
    // 'category_name' => 'actualites',
    'post_status' => 'publish',
    'orderby' => array(
        'date' => 'DESC'
    )
);
$last_posts = new Timber\PostQuery($l_args);
$last_id=0;
if (!empty($last_posts)) {
	$last_id = $last_posts[0]->ID;
}
$args = array(
    'post_type' => 'post',
    'posts_per_page' => 10,
    // 'category_name' => 'actualites',
    'post__not_in'      => array($last_id),
    'post_status' => 'publish',
    'paged' => $paged,
    'orderby' => array(
        'date' => 'DESC'
    )
);
$context['last_posts'] = $last_posts;
$context['posts'] = new Timber\PostQuery($args);
$timber_post = new Timber\Post();
$context['post'] = $timber_post;
Timber::render( array( 'page-nos-actualites.twig' ), $context );