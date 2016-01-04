<?php
  /*
    Absolve Framework Post Types
  */

  // remove posts from admin panel
  function remove_posts_menu() {
      remove_menu_page("edit.php");
  }
  add_action("admin_init", "remove_posts_menu");

  // add support for post thumbnails
  add_theme_support('post-thumbnails');

  // create articles post type
  require "post-types/articles.php";

  // create videos post type
  require "post-types/videos.php"

?>
