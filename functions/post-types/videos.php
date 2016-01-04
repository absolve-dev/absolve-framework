<?php
  /*
    Videos Post Type
  */

  // create videos post type
  add_action("init", "videos_type_register");
	function videos_type_register(){
		$args = array(
      "labels" => array(
        "name" => "Videos",
        "singular_name" => "Video",
        "add_new_item" => "Add New Video",
        "add_new" => "New Video",
        "new_item" => "New Video",
        "view_item" => "View Video",
        "edit_item" => "Edit Video",
        "search_items" => "Search Videos",
        "not_found" => "No videos found",
        "not_found_in_trash" => "No videos found in trash"
      ),
      "public" => true,
      "menu_position" => 5,
      "menu_icon" => "dashicons-video-alt3",
      "hierarchal" => false,
      "supports" => array(
        "title",
        "editor",
        "page-attributes"
      ),
      "taxonomies" => array("category"),
      "has_archive" => true
		);
		register_post_type("videos", $args);
	}

  // add meta box to link articles to videos
  add_action("add_meta_boxes_videos", "yt_video_meta_init");
  function yt_video_meta_init(){
    add_meta_box(
      "yt-video",             // html id
      "Add a youtube video",  // title
      "yt_video_meta_box",    // callback
      "videos",               // screen
      "normal"                // context
    );
  }
  function yt_video_meta_box(){
    wp_nonce_field( basename( __FILE__ ), 'absolve_video_post_nonce' );
    global $post;
    $value = get_post_meta($post->ID, "absolve_yt_video_id", true);
    echo "Youtube Video ID: ";
    echo "<input type='text' name='absolve_yt_video_id' value='$value' />";
  }

  // save video link meta data
  function save_yt_video_id(){
    global $post;
    if( isset($_POST["absolve_yt_video_id"]) ){
      update_post_meta($post->ID, "absolve_yt_video_id", $_POST["absolve_yt_video_id"]);
    }
  }
  add_action("save_post_videos", "save_yt_video_id");
?>
