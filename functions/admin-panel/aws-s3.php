<?php
  /*
    Amazon Web Services S3 Media Library Sync Settings
  */

  // add aws s3 media library sync to absolve settings
  add_action( 'admin_init', 'absolve_aws_s3_init' );
  function absolve_aws_s3_init() {
    require "settings.php";
    register_setting($absolve_options_group, $absolve_options["aws-s3"]);
    add_settings_section("absolve-aws-s3-section", "AWS S3 Media Library Sync Settings", 'absolve_aws_s3_section', 'absolve-options' );
    add_settings_field("absolve-aws-s3-access-key-field", 'Access Key', 'absolve_aws_s3_access_key_field', 'absolve-options', "absolve-aws-s3-section");
    add_settings_field("absolve-aws-s3-secret-key-field", 'Secret Key', 'absolve_aws_s3_secret_key_field', 'absolve-options', "absolve-aws-s3-section");
    add_settings_field("absolve-aws-s3-region-field", 'Region', 'absolve_aws_s3_region_field', 'absolve-options', "absolve-aws-s3-section");
    add_settings_field("absolve-aws-s3-host-field", 'Host', 'absolve_aws_s3_host_field', 'absolve-options', "absolve-aws-s3-section");
    add_settings_field("absolve-aws-s3-endpoint-field", 'Endpoint', 'absolve_aws_s3_endpoint_field', 'absolve-options', "absolve-aws-s3-section");
    add_settings_field("absolve-aws-s3-enabled-field", 'Enabled', 'absolve_aws_s3_enabled_field', 'absolve-options', "absolve-aws-s3-section");
  }

  function absolve_aws_s3_section(){
    echo "Your AWS S3 container will be used as a CDN for media uploads.<br>
      Insert your AWS S3 settings below.";
  }

  function absolve_aws_s3_access_key_field(){
    require "settings.php";
    $option_name = $absolve_options["aws-s3"];
    $settings = (array) get_option($option_name);
    $value = esc_attr($settings["access_key"]);
    echo "<input type='text' name='" . $option_name . "[access_key]' value='$value' />";
  }

  function absolve_aws_s3_secret_key_field(){
    require "settings.php";
    $option_name = $absolve_options["aws-s3"];
    $settings = (array) get_option($option_name);
    $value = esc_attr($settings["secret_key"]);
    echo "<input type='text' name='" . $option_name . "[secret_key]' value='$value' />";
  }

  function absolve_aws_s3_region_field(){
    require "settings.php";
    $option_name = $absolve_options["aws-s3"];
    $settings = (array) get_option($option_name);
    $value = esc_attr($settings["region"]);
    echo "<input type='text' name='" . $option_name . "[region]' value='$value' />";
  }
  function absolve_aws_s3_host_field(){
    require "settings.php";
    $option_name = $absolve_options["aws-s3"];
    $settings = (array) get_option($option_name);
    $value = esc_attr($settings["host"]);
    echo "<input type='text' name='" . $option_name . "[host]' value='$value' />";
  }
  function absolve_aws_s3_endpoint_field(){
    require "settings.php";
    $option_name = $absolve_options["aws-s3"];
    $settings = (array) get_option($option_name);
    $value = esc_attr($settings["endpoint"]);
    echo "<input type='text' name='" . $option_name . "[endpoint]' value='$value' />";
  }

  function absolve_aws_s3_enabled_field(){
    require "settings.php";
    $option_name = $absolve_options["aws-s3"];
    $settings = (array) get_option($option_name);
    $value = esc_attr($settings["enabled"]);
    echo "<input type='checkbox' name='" . $option_name . "[enabled]' value='1' " . checked( 1, $value, false ) . "/>";
    echo "<i>" . (($value == '1') ? "Currently enabled" : "Currently disabled") . "</i>";
  }
?>
