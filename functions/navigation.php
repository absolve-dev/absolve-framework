<?php
  /*
    Register Navigation
  */
  add_action("init", "register_main_nav");
  function register_main_nav() {
    register_nav_menu("main-navbar","Main Navbar");
  }
?>
