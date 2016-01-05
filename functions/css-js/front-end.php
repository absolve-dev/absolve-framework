<?php
  /*
    CSS and JS - Front End
  */

  add_action("init", "frontend_enqueue");
  function frontend_enqueue(){
    if( !is_admin() ){
      // using CDNs latest versions as of: 4 Jan 2016

      // jquery - already included in wordpress
      wp_enqueue_script("jquery");

      // angular
      wp_register_script("angular", "https://ajax.googleapis.com/ajax/libs/angularjs/1.3.15/angular.min.js");
      wp_enqueue_script("angular");

      // bootstrap
      wp_register_script("bootstrap", "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js");
      wp_enqueue_script("bootstrap");
      wp_register_style("bootstrap", "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css");
      wp_enqueue_style("bootstrap");

      // base style include
      wp_register_style('base-style', get_template_directory_uri() . '/style.css');
			wp_enqueue_style('base-style');
    }
  }

?>
