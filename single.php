<?php get_header(); ?>
<div class="container" id="posts-container">
  <?php
    while (have_posts()) {
      the_post();
      the_newlines_post($REDIRECT_HOME);
    }
  ?>
</div>

<div class="container">
  <?php get_footer(); ?>