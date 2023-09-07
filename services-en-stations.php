<?php
/**
 * Template Name: Page services en stations
 */

$context = Timber::context();

$timber_post = new Timber\Post();
$context['post'] = $timber_post;
Timber::render( array( 'page-services-en-stations.twig' ), $context ); 