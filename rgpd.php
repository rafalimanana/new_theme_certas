<?php
/**
 * Template Name: Page RGPD
 */

$context = Timber::context();

$timber_post = new Timber\Post();
$context['post'] = $timber_post;
Timber::render( array( 'page-rgpd.twig' ), $context ); 