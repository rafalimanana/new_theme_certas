<?php
/**
 * Template Name: Page détail services
 */

$context = Timber::context();

$timber_post = new Timber\Post();
$context['post'] = $timber_post;
Timber::render( array( 'page-lavage.twig' ), $context ); 