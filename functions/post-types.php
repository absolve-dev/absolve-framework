<?php
  /*
    Absolve Framework Post Types
  */

  // add support for post thumbnails
  add_theme_support('post-thumbnails');

  // create articles post type
  require "post-types/articles.php";

  // create videos post type
  require "post-types/videos.php"

?>
