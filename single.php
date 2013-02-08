<?php get_header(); ?>
<div class="container" id="posts-container">
  <?php
    while (have_posts()) {
      the_post();
      the_newlines_post();
    }
  ?>
</div> <!-- /container -->

<div class="container">
  <?php get_footer(); ?>