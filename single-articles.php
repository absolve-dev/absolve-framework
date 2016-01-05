<?php
  /*
    Articles Single Template
  */
  get_header();

  // strangely, post data does not work without this
  setup_postdata($post);
?>

<h1>
  <?php the_title(); ?>
</h1>

<?php get_template_part("partials/show-video", "article"); ?>

<p>
  <?php the_content(); ?>
</p>

<?php get_footer(); ?>
