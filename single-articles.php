<?php
  /*
    Articles Single Template
  */
  get_header();

  // strangely, post data does not work without this
  setup_postdata($post);
?>
<div class="container">
  <h1><?php the_title(); ?> <small>Article</small></h1>
  <div class="panel panel-default">
    <div class="panel-body">
      <?php get_template_part("partials/show-video", "article"); ?>
      <p>
        <?php the_content(); ?>
      </p>
    </div>
  </div>
</div>
<?php get_footer(); ?>
