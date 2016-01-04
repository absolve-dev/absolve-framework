<?php
  /*
    Google Tag Manager Settings
  */

  // add gtm to absolve settings
  add_action( 'admin_init', 'absolve_gtm_init' );
  function absolve_gtm_init() {
    require "settings.php";
    register_setting($absolve_options_group, $absolve_options["gtm"]);
    add_settings_section("absolve-gtm-section", "Google Tag Manager", 'absolve_gtm_section', 'absolve-options' );
    add_settings_field("absolve-gtm-container-field", 'Container ID', 'absolve_gtm_container_id_field', 'absolve-options', "absolve-gtm-section");
    add_settings_field("absolve-gtm-enabled-field", 'Enabled', 'absolve_gtm_enabled_field', 'absolve-options', "absolve-gtm-section");
  }

  function absolve_gtm_section(){
    echo "Insert your GTM container ID below.<br>
      Do not include the 'GTM-' portion of the ID.";
  }

  function absolve_gtm_container_id_field(){
    require "settings.php";
    $option_name = $absolve_options["gtm"];
    $settings = (array) get_option($option_name);
    $value = esc_attr($settings["container_id"]);
    echo "<input type='text' name='" . $option_name . "[container_id]' value='$value' />";
  }

  function absolve_gtm_enabled_field(){
    require "settings.php";
    $option_name = $absolve_options["gtm"];
    $settings = (array) get_option($option_name);
    $value = esc_attr($settings["enabled"]);
    echo "<input type='checkbox' name='" . $option_name . "[enabled]' value='1' " . checked( 1, $value, false ) . "/>";
    echo "<i>" . (($value == '1') ? "Currently enabled" : "Currently disabled") . "</i>";
  }
?>
