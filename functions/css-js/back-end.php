<?php
  /*
    CSS and JS - Back End
  */

  add_action("admin_enqueue_scripts", "admin_enqueue");
  function admin_enqueue(){
    // using CDNs latest versions as of: 4 Jan 2016
    // note: back end already has jquery

    // angular
    wp_register_script("angular", "https://ajax.googleapis.com/ajax/libs/angularjs/1.3.15/angular.min.js");
    wp_enqueue_script("angular");
  }

?>
