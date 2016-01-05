<?php
  /*
    "Show Video" Partial for Current Post
  */

  // gets video from meta data of current $post
  global $post;
  $yt_video_id = get_post_meta($post->ID, "absolve_yt_video_id", true);
  if($yt_video_id){
    echo "<iframe width='560' height='315' src='https://www.youtube.com/embed/$yt_video_id' frameborder='0' allowfullscreen></iframe>";
  }

?>
