<?php
/**
 * Template Name: Page Nos Partenaires
 */

$context = Timber::context();

$timber_post = new Timber\Post();
$context['post'] = $timber_post;
Timber::render( array( 'page-nos-partenaires.twig' ), $context ); 