<?php
$REDIRECT_TOP = 1;
$REDIRECT_HOME = 2;

function the_newlines_post($redirect) {
  global $REDIRECT_TOP;
  global $REDIRECT_HOME;
  
  switch ($redirect) {
    case $REDIRECT_TOP: {
      $redirect_link = "#top";
    } break;
    case $REDIRECT_HOME:
    default: {
      $redirect_link = get_settings('home');
    } break;
  }
  ?>
  <div class="post-container">
    <div class="row">
      <div class="span10 offset1">
        <div>
          <h1><?php the_title(); ?></h1>
        </div>
        <div>
          <p class="post-details">
            <em>
              By: <?php the_author_posts_link(); ?> | Categories: <?php the_category(", "); ?>
            </em>
          </p>
        </div>
        <div class="post-excerpt">
          <p class="lead">
            <?php the_excerpt(); ?>
          </p>
        </div>
        <div class="post-image">
          <?php the_post_thumbnail(get_the_ID(), 'full', array('class'=>'img')); ?>
        </div>
        <div class="post-body">
          <?php the_content(); ?>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="span4 offset1 side-rule">
        <hr />
      </div>
      <div class="span2">
        <p class="newline">
          <a href="<?php echo $redirect_link; ?>">\r\n</a>
        </p>
      </div>
      <div class="span4 side-rule">
        <hr />
      </div>
    </div>
  </div>
  <?php
}

function bootstrap_scripts() {
  wp_register_script('bootstrap', get_template_directory_uri().'/js/bootstrap.min.js', array('jquery'));

  wp_enqueue_script('bootstrap');
}

function analytics_scripts() {
  
}

function social_scripts() {

}

function infinite_scroll_scripts() {
  wp_register_script('infinite_scroll', get_template_directory_uri().'/js/jquery.infinitescroll.min.js', array('jquery'), null, true);
  if (!is_singular()) {
      wp_enqueue_script('infinite_scroll');
  }
}

add_action('wp_enqueue_scripts', 'bootstrap_scripts');
add_action('wp_enqueue_scripts', 'analytics_scripts');
add_action('wp_enqueue_scripts', 'social_scripts');
add_action('wp_enqueue_scripts', 'infinite_scroll_scripts');

function custom_infinite_scroll_js() {
  if(!is_singular()) { ?>
  <script>
  var infinite_scroll = {
      loading: {
          img: "<?php echo get_template_directory_uri(); ?>/img/ajax-loader.gif",
          msgText: "",
          finishedMsg: "All posts loaded."
      },
      "nextSelector": ".nav-older a",
      "navSelector": ".nav-older",
      "itemSelector": ".post-container",
      "contentSelector": "#posts-container"
  };
  jQuery(infinite_scroll.contentSelector).infinitescroll(infinite_scroll);
  </script>
  <?php
  }
}
add_action( 'wp_footer', 'custom_infinite_scroll_js',100 );

?>