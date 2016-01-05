<?php
  /*
    "Show Video" Partial for Articles
  */

  /*
    changes video retrieval method based on post type:
      article - gets video of associated post
  */
  global $post;
  $linked_video_post_id = get_post_meta($post->ID, "absolve_video_post_id", true);
  $yt_video_id = get_post_meta($linked_video_post_id, "absolve_yt_video_id", true);
  if($yt_video_id){
    echo "<iframe width='560' height='315' src='https://www.youtube.com/embed/$yt_video_id' frameborder='0' allowfullscreen></iframe>";
  }
?>
<p>
  <a href="<?php the_permalink($linked_video_post_id); ?>">
    <?php echo get_the_title($linked_video_post_id); ?>
  </a>
</p>
