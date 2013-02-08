<?php
get_header();

if (have_posts()) {
  the_post();
?>
<div class="row post-title">
  <div class="span10 offset1">
    <h1><?php the_author(); ?></h1>
    <p><em><?php the_author_meta('description'); ?> <?php the_author_link(); ?></em></p>
    <p><small>Disclaimer: The opinions expressed here are the views of the writer and do not necessarily reflect the views and opinions of the writer’s employer(s.)</small></p>
  </div><!--/span-->
</div><!--/row-->
<hr class="featurette-divider">
<?php
  rewind_posts();
}
?>
<div class="container" id="posts-container">
  <?php
    while (have_posts()) {
      the_post();
      the_newlines_post($REDIRECT_TOP);
    }
  ?>
</div> <!-- /container -->

<div class="container">
  <div class="row">
    <div class="span4 offset1">
      
    </div>
    <div class="span2 older-container">
      <p class="newline nav-older">
        <?php next_posts_link('Older Entries'); ?>
      </p>
    </div>
    <div class="span4">
      
    </div>
  </div>
  <?php get_footer(); ?>