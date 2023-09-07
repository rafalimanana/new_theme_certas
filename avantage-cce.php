<?php
/**
 * Template Name: Page Avantages CCE
 */

$context = Timber::context();

$timber_post = new Timber\Post();
$context['post'] = $timber_post;
Timber::render( array( 'page-avantage-cce.twig' ), $context ); 
