<?php
/**
 * Template Name: Page carte de nos stations
 */

$context = Timber::context();

$timber_post = new Timber\Post();
$context['post'] = $timber_post;
Timber::render( array( 'page-carte-de-nos-stations.twig' ), $context ); 