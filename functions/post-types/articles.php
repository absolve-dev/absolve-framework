<?php
  /*
    Articles Post Type
  */

  // create articles post type
  add_action("init", "articles_type_register");
	function articles_type_register(){
		$args = array(
      "labels" => array(
        "name" => "Articles",
        "singular_name" => "Article",
        "add_new_item" => "Add New Article",
        "add_new" => "New Article",
        "new_item" => "New Article",
        "view_item" => "View Article",
        "edit_item" => "Edit Article",
        "search_items" => "Search Articles",
        "not_found" => "No articles found",
        "not_found_in_trash" => "No articles found in trash"
      ),
      "public" => true,
      "menu_position" => 5,
      "menu_icon" => "dashicons-admin-post",
      "hierarchal" => false,
      "supports" => array(
        "title",
        "editor",
        "thumbnail",
        "page-attributes"
      ),
      "taxonomies" => array("category"),
      "has_archive" => true
		);
		register_post_type("articles", $args);
	}

  // add meta box to link articles to videos
  add_action("add_meta_boxes_articles", "video_link_meta_init");
  function video_link_meta_init(){
    add_meta_box(
      "video-link",           // html id
      "Link to a video",      // title
      "video_link_meta_box",  // callback
      "articles",             // screen
      "normal"                // context
    );
  }
  function video_link_meta_box(){
    wp_nonce_field( basename( __FILE__ ), 'absolve_video_link_nonce' );
    global $post;
    $value = get_post_meta($post->ID, "absolve_video_post_id", true);
    echo "Video Post ID: ";
    echo "<input type='text' name='absolve_video_post_id' value='$value' />";
  }

  // save video link meta data
  function save_video_post_id(){
    global $post;
    if( isset($_POST["absolve_video_post_id"]) ){
      update_post_meta($post->ID, "absolve_video_post_id", $_POST["absolve_video_post_id"]);
    }
  }
  add_action("save_post_articles", "save_video_post_id");

?>
