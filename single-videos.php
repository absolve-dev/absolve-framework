<?php
  /*
    Videos Single Template
  */
  get_header();
?>

<h1>
  <?php the_title(); ?>
</h1>

<?php get_template_part("partials/show-video"); ?>

<?php
  // find related articles (linked articles)
  $args = array(
    "post_type" => "articles",
    "meta_key" => "absolve_video_post_id",
    "meta_value" => $post->ID
  );
  $related_query = new WP_Query($args);
  if( $related_query->have_posts() ):
    echo "<p><b>Related Videos</b></p>";
    while( $related_query->have_posts() ): $related_query->the_post();
      $title = get_the_title();
      $permalink = get_the_permalink();
      echo "<p><a href='$permalink'>$title</a></p>";
    endwhile;
  else:
    echo "No related articles found.";
  endif;
?>

<p>
  <?php the_content(); ?>
</p>

<?php get_footer(); ?>
