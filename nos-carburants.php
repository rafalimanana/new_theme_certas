<?php
/**
 * Template Name: Page Nos Carburants
 */

$context = Timber::context();

$timber_post = new Timber\Post();
$context['post'] = $timber_post;
Timber::render( array( 'page-nos-carburants.twig' ), $context ); 