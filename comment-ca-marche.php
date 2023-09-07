<?php
/**
 * Template Name: Page comment ça marche
 */

$context = Timber::context();

$timber_post = new Timber\Post();
$context['post'] = $timber_post;
Timber::render( array( 'page-comment-ca-marche.twig' ), $context ); 