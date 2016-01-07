<?php get_header(); ?>

<div class="kodlabb-section kodlabb-section-white kodlabb-pageheader palette-belize-hole">
  <div class="container text-center">
    <h1>Kodlabb Skärholmen</h1>
    <h3>Programmering och teknik är kul</h3><br/>
    <div class="row">
      <div class="col-xs-4">
        <a href="#fakelink" class="btn btn-block btn-lg btn-primary">Info Button</a>
      </div>
      <div class="col-xs-4">
        <a href="#fakelink" class="btn btn-block btn-lg btn-primary">Info Button</a>
      </div>
      <div class="col-xs-4">
        <a href="#fakelink" class="btn btn-block btn-lg btn-primary">Info Button</a>
      </div>
    </div>
  </div>
</div>

<section id="content" role="main">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<?php get_template_part( 'entry' ); ?>
<?php comments_template(); ?>
<?php endwhile; endif; ?>
<?php get_template_part( 'nav', 'below' ); ?>
</section>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
