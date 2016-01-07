<?php

$section_style = get_field('section-style', $page->ID);

?>
<div class="kodlabb-section <?php get_section_style($section_style) ?>">
  <div class="container text-center">
    <?php if ($section_style == 'header') { ?>
      <h1><?php echo $page->post_title ?></h1>
    <? } else { ?>
      <h2><?php echo $page->post_title ?></h2>
    <?php } ?>
    <?php echo wpautop($page->post_content);?>
  </div>
</div>
