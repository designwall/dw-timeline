<?php
include_once ABSPATH . 'wp-includes/class-wp-customize-control.php';

class DW_Timeline_Textarea_Custom_Control extends WP_Customize_Control {

  public $type = 'textarea';
  public $statuses;
  public function __construct( $manager, $id, $args = array() ) {

  $this->statuses = array( '' => __( 'Default', 'dw-timeline' ) );
    parent::__construct( $manager, $id, $args );
  }

  public function render_content() {
    ?>
    <label>
      <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
      <textarea class="large-text" cols="20" rows="5" <?php $this->link(); ?>>
        <?php echo esc_textarea( $this->value() ); ?>
      </textarea>
    </label>
    <?php
  }
}

function dw_timeline_customize_register( $wp_customize ) {

  // FAVICON 
  $wp_customize->add_setting('dw_timeline_theme_options[favicon]', array(
    'default' => get_template_directory_uri().'/assets/img/favicon.ico',
    'capability' => 'edit_theme_options',
    'type' => 'option',
  ));
  $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'favicon', array(
    'label' => __('Site Favicon', 'dw-timeline'),
    'section' => 'title_tagline',
    'settings' => 'dw_timeline_theme_options[favicon]',
  )));

  // CUSTOM HEADER
  $wp_customize->add_section('dw_timeline_header_image', array(
    'title'    => __('Custom Header', 'dw-timeline'),
    'priority' => 50,
  ));
  $wp_customize->add_setting('dw_timeline_theme_options[header_image]', array(
    'default' => get_template_directory_uri().'/assets/img/bg.jpg',
    'capability' => 'edit_theme_options',
    'type' => 'option',
  ));
  $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'header_image', array(
    'label' => __('Header Image', 'dw-timeline'),
    'section' => 'dw_timeline_header_image',
    'settings' => 'dw_timeline_theme_options[header_image]',
  )));

  // CUSTOM CODE 
  $wp_customize->add_section('dw_timeline_custom_code', array(
    'title'    => __('Custom Code', 'dw-timeline'),
    'priority' => 200,
  ));
  $wp_customize->add_setting('dw_timeline_theme_options[header_code]', array(
      'default' => '',
      'capability' => 'edit_theme_options',
      'type' => 'option',
  ));
  $wp_customize->add_control( new DW_Timeline_Textarea_Custom_Control($wp_customize, 'header_code', array(
    'label'    => __('Header Code (Meta tags, CSS, etc ...)', 'dw-timeline'),
    'section'  => 'dw_timeline_custom_code',
    'settings' => 'dw_timeline_theme_options[header_code]',
  )));
  $wp_customize->add_setting('dw_timeline_theme_options[footer_code]', array(
    'default' => '',
    'capability' => 'edit_theme_options',
    'type' => 'option',
  ));
  $wp_customize->add_control( new DW_Timeline_Textarea_Custom_Control($wp_customize, 'footer_code', array(
    'label'    => __('Footer Code (Analytics, etc ...)', 'dw-timeline'),
    'section'  => 'dw_timeline_custom_code',
    'settings' => 'dw_timeline_theme_options[footer_code]'
  )));
}
add_action( 'customize_register', 'dw_timeline_customize_register' );

/**
 * Get Theme options
 */
function dw_timeline_get_theme_option( $option_name, $default = false ) {
  $options = get_option( 'dw_timeline_theme_options' );
  if( isset($options[$option_name]) && ! empty( $options[$option_name] ) ) {
    return $options[$option_name];
  }
  return $default; 
}

/**
 * Header image
 */
function dw_timeline_header_image() {
  $header_image = dw_timeline_get_theme_option('header_image');
  if ( $header_image ) {
    ?>
    <style>
    .banner.cover {
      background-image: url(<?php echo $header_image ?>);
    }
    </style>
    <?php
  }
}
add_action( 'wp_head', 'dw_timeline_header_image' );
