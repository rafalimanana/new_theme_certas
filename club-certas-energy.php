<?php
/**
 * Template Name: Page Club Certas Energy
 */

$context = Timber::context();

$timber_post = new Timber\Post();
$context['post'] = $timber_post;
Timber::render( array( 'page-club-certas-energy.twig' ), $context ); 