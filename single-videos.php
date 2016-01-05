<?php
  /*
    Videos Single Template
  */
  get_header();
?>
<div class="container">
  <h1>
    <?php the_title(); ?> <small>Video</small>
  </h1>

  <div class="panel panel-default">
    <div class="panel-body">
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
          echo "<p><b>Related Articles</b></p>";
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
    </div>
  </div>
</div>
<?php get_footer(); ?>
