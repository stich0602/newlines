<?php
get_header();

if (have_posts()) {
  the_post();
?>
<div class="row post-title">
  <div class="span10 offset1">
    <h1><?php echo single_cat_title(); ?></h1>
    <p><em><?php echo category_description(); ?></em></p>
  </div>
</div>
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
</div>

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