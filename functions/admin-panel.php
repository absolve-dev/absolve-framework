<?php
  /*
    Absolve Framework Settings
  */

  // add absolve framework to the options menu
  add_action("admin_menu", "framework_menu");
  function framework_menu(){
    add_options_page(
      "Absolve Framework",
      "Absolve Framework",
      "manage_options",
      "absolve-options",
      "absolve_options_page"
    );
  }

  // google tag manager
  require "admin-panel/g-tag-manager.php";

  // aws s3 for media library sync
  require "admin-panel/aws-s3.php";

  // actual options page
  function absolve_options_page(){
    require "admin-panel/settings.php";
?>

<div class="wrap">
  <h2>Absolve Framework Options</h2>
  <form action="options.php" method="POST">
    <?php settings_fields( $absolve_options_group ); ?>
    <?php do_settings_sections( "absolve-options" ); ?>
    <?php submit_button(); ?>
  </form>
</div>

<?php } ?>
