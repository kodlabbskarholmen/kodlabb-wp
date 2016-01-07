<?php /* Template Name: Kodlabb start */ ?>
<?php get_header(); ?>
<section id="content" role="main">
<?php $args = array(
	'child_of'     => $post->ID,
	'post_type'    => 'page',
	'post_status'  => 'publish',
	'sort_column'  => 'menu_order, post_title',
);
$pages = get_pages($args);
foreach ( $pages as $page ) {
  set_query_var( 'page', $page );
  get_template_part( 'template-parts/section' );
}
?>
</section>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
