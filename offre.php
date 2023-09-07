<?php
/**
 * Template Name: Page offres immobilières
 */

$context = Timber::context();

$timber_post = new Timber\Post();
$context['post'] = $timber_post;
Timber::render( array( 'page-offre.twig' ), $context ); 