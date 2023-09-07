<?php
/**
 * Timber certas-theme
 * https://github.com/timber/certas-theme
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since   Timber 0.1
 */

/**
 * If you are installing Timber as a Composer dependency in your theme, you'll need this block
 * to load your dependencies and initialize Timber. If you are using Timber via the WordPress.org
 * plug-in, you can safely delete this block. 
 */
$composer_autoload = __DIR__ . '/vendor/autoload.php';
if ( file_exists($composer_autoload) ) {
	require_once( $composer_autoload );
	$timber = new Timber\Timber();
}

/**
 * This ensures that Timber is loaded and available as a PHP class.
 * If not, it gives an error message to help direct developers on where to activate
 */
if ( ! class_exists( 'Timber' ) ) {

	add_action( 'admin_notices', function() {
		echo '<div class="error"><p>Timber not activated. Make sure you activate the plugin in <a href="' . esc_url( admin_url( 'plugins.php#timber' ) ) . '">' . esc_url( admin_url( 'plugins.php' ) ) . '</a></p></div>';
	});

	add_filter('template_include', function( $template ) {
		return get_stylesheet_directory() . '/static/no-timber.html';
	});
	return;
}

function remove_editor() {
    if (isset($_GET['post'])) {
        $id = $_GET['post'];
        $template = get_post_meta($id, '_wp_page_template', true);
        switch ($template) {
            case 'a-propos.php':
            case 'avantage-cce.php':
            case 'carte-de-nos-stations.php':
            case 'club-certas-energy.php':
            case 'comment-ca-marche.php':
            case 'contact.php':
            case 'front-page.php':
            case 'lavage.php':
            case 'nos-actualites.php':
            case 'nos-carburants.php':
            case 'nos-partenaires.php':
            case 'nos-promos.php':
            case 'offre.php':
            case 'produits.php':
            case 'services-en-stations.php':
            // the below removes 'editor' support for 'pages'
            // if you want to remove for posts or custom post types as well
            // add this line for posts:
            // remove_post_type_support('post', 'editor');
            // add this line for custom post types and replace 
            // custom-post-type-name with the name of post type:
            // remove_post_type_support('custom-post-type-name', 'editor');
            remove_post_type_support('page', 'editor');
            break;
            default :
            // Don't remove any other template.
            break;
        }
    }
}
add_action('init', 'remove_editor');


/*add_action( 'init', function() {
	remove_post_type_support( 'post', 'editor' );
	remove_post_type_support( 'page', 'editor' );
}, 99);*/

function cpt_archive_posts_per_page( $query ) {

    // for cpt or any post type main archive
    if ( $query->is_main_query() && ! is_admin() && is_post_type_archive( 'produit' ) ) {
        $query->set( 'posts_per_page', '2' );   // number has to be the same like in your query / 'posts_per_page'
    }

    if ( $query->is_main_query() && ! is_admin() && is_post_type_archive( 'promo' ) ) {
        $query->set( 'posts_per_page', '2' );   // number has to be the same like in your query / 'posts_per_page'
    }
}
add_action( 'pre_get_posts', 'cpt_archive_posts_per_page' );




/*function order_posts_by_title( $query ) { 

   if ( $query->is_home() && $query->is_main_query() ) { 

     $query->set( 'orderby', 'title' ); 

     $query->set( 'order', 'ASC' ); 

   } 

} 

add_action( 'pre_get_posts', 'order_posts_by_title' );

add_filter( 'timber_context', 'mytheme_timber_context'  );
function mytheme_timber_context( $context ) {
    $context['options'] = get_fields('option');
    return $context;
}*/

function add_to_timber_context($context) {
    $context['topmenu'] = new TimberMenu('topmenu');
    $context['navigation'] = new TimberMenu('navigation');
    $context['footermenu1'] = new TimberMenu('footermenu1');
    $context['footermenu2'] = new TimberMenu('footermenu2');
    return $context;
}
add_filter('timber_context', 'add_to_timber_context');

/**
 * Sets the directories (inside your theme) to find .twig files
 */
Timber::$dirname = array( 'templates', 'views' );

/**
 * By default, Timber does NOT autoescape values. Want to enable Twig's autoescape?
 * No prob! Just set this value to true
 */
Timber::$autoescape = false;


/**
 * We're going to configure our theme inside of a subclass of Timber\Site
 * You can move this to its own file and include here via php's include("MySite.php")
 */
class StarterSite extends Timber\Site {
	/** Add timber support. */
	public function __construct() {
		add_action( 'after_setup_theme', array( $this, 'theme_supports' ) );
		add_filter( 'timber/context', array( $this, 'add_to_context' ) );
		add_filter( 'timber/twig', array( $this, 'add_to_twig' ) );
		add_action( 'init', array( $this, 'register_post_types' ) );
		add_action( 'init', array( $this, 'register_taxonomies' ) );
		parent::__construct();
	}
	/** This is where you can register custom post types. */
	public function register_post_types() {

	}
	/** This is where you can register custom taxonomies. */
	public function register_taxonomies() {

	}

	/** This is where you add some context
	 *
	 * @param string $context context['this'] Being the Twig's {{ this }}.
	 */
	public function add_to_context( $context ) {
		$context['foo'] = 'bar';
		$context['stuff'] = 'I am a value set in your functions.php file';
		$context['notes'] = 'These values are available everytime you call Timber::context();';
		$context['menu'] = new Timber\Menu();
		$context['site'] = $this;
		return $context;
	}



	public function theme_supports() {
		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5', array(
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			)
		);

		/*
		 * Enable support for Post Formats.
		 *
		 * See: https://codex.wordpress.org/Post_Formats
		 */
		add_theme_support(
			'post-formats', array(
				'aside',
				'image',
				'video',
				'quote',
				'link',
				'gallery',
				'audio',
			)
		);

		add_theme_support( 'menus' );
	}

	/** This Would return 'foo bar!'.
	 *
	 * @param string $text being 'foo', then returned 'foo bar!'.
	 */
	public function myfoo( $text ) {
		$text .= ' bar!';
		return $text;
	}

	/** This is where you can add your own functions to twig.
	 *
	 * @param string $twig get extension.
	 */
	public function add_to_twig( $twig ) {
		$twig->addExtension( new Twig_Extension_StringLoader() );
		$twig->addFilter( new Twig_SimpleFilter( 'myfoo', array( $this, 'myfoo' ) ) );
		return $twig;
	}

}

new StarterSite();
