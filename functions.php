<?php
add_action( 'after_setup_theme', 'kodlabb_wp_theme_setup' );
function kodlabb_wp_theme_setup()
{
  remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
  remove_action( 'wp_print_styles', 'print_emoji_styles' );
  load_theme_textdomain( 'kodlabb_wp_theme', get_template_directory() . '/languages' );
  add_theme_support( 'title-tag' );
  //add_theme_support( 'automatic-feed-links' );
  //add_theme_support( 'post-thumbnails' );
  global $content_width;
  if ( ! isset( $content_width ) ) $content_width = 640;
  register_nav_menus(
    array( 'main-menu' => __( 'Main Menu', 'kodlabb_wp_theme' ) )
  );
}

add_action( 'wp_enqueue_scripts', 'kodlabb_wp_theme_load_scripts' );
function kodlabb_wp_theme_load_scripts()
{
  wp_enqueue_script( 'html5shiv', get_template_directory_uri() . '/js/html5shiv.js' );
  wp_script_add_data( 'html5shiv', 'conditional', 'lt IE 9' );
  wp_enqueue_script( 'respond', get_template_directory_uri() . '/js/respond.min.js' );
  wp_script_add_data( 'respond', 'conditional', 'lt IE 9' );
  wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css' );
  wp_enqueue_style( 'flat-ui', get_template_directory_uri() . '/css/flat-ui.min.css' );
  wp_enqueue_style( 'kodlabb', get_template_directory_uri() . '/css/kodlabb.css' );
  wp_enqueue_style( 'montserrat', 'http://fonts.googleapis.com/css?family=Montserrat:400' );
	wp_enqueue_script( 'jquery-1.11.1', get_template_directory_uri() . '/js/jquery.min.js', array(), null, true );
  wp_enqueue_script( 'flat-ui', get_template_directory_uri() . '/js/flat-ui.min.js', array(), null, true );
  wp_enqueue_script( 'application', get_template_directory_uri() . '/js/application.js', array(), null, true );
}
add_action( 'comment_form_before', 'kodlabb_wp_theme_enqueue_comment_reply_script' );
function kodlabb_wp_theme_enqueue_comment_reply_script()
{
if ( get_option( 'thread_comments' ) ) { wp_enqueue_script( 'comment-reply' ); }
}
add_filter( 'the_title', 'kodlabb_wp_theme_title' );
function kodlabb_wp_theme_title( $title ) {
if ( $title == '' ) {
return '&rarr;';
} else {
return $title;
}
}
add_filter( 'wp_title', 'kodlabb_wp_theme_filter_wp_title' );
function kodlabb_wp_theme_filter_wp_title( $title )
{
return $title . esc_attr( get_bloginfo( 'name' ) );
}
add_action( 'widgets_init', 'kodlabb_wp_theme_widgets_init' );
function kodlabb_wp_theme_widgets_init()
{
register_sidebar( array (
'name' => __( 'Sidebar Widget Area', 'kodlabb_wp_theme' ),
'id' => 'primary-widget-area',
'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
'after_widget' => "</li>",
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
) );
}
function kodlabb_wp_theme_custom_pings( $comment )
{
$GLOBALS['comment'] = $comment;
?>
<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>"><?php echo comment_author_link(); ?></li>
<?php
}
add_filter( 'get_comments_number', 'kodlabb_wp_theme_comments_number' );
function kodlabb_wp_theme_comments_number( $count )
{
if ( !is_admin() ) {
global $id;
$comments_by_type = &separate_comments( get_comments( 'status=approve&post_id=' . $id ) );
return count( $comments_by_type['comment'] );
} else {
return $count;
}
}

function get_section_style($style){
  switch ($style) {
    case 'red':
      echo "kodlabb-section-white palette-alizarin";
      break;
    case 'blue':
      echo "kodlabb-section-white palette-belize-hole";
      break;
    case 'grey':
      echo "kodlabb-section-white palette-concrete";
      break;
    case 'header':
      echo "kodlabb-section-white kodlabb-pageheader palette-belize-hole";
      break;
  }
}
