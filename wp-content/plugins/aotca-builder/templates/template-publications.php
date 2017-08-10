<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
/**
 * Template publications
 *
 * Access original fields: $mod_settings
 */

wp_enqueue_style('publications-page', plugin_dir_url( __FILE__ ) . '/assets/publications.css');

$publications_default = array(
  'publications_section_desc' => '',
  'publications_list' => array(
    array(
      'thumbnail' => '',
      'title' => '',
      'password' => 'false',
      'link' => '',
    ),
  ),
);

$fields_args = wp_parse_args( $mod_settings, $publications_default );

extract( $fields_args );

$container_class = implode( ' ', apply_filters( 'themify_builder_module_classes', array(
	'module', 'module-' . $mod_name, $module_ID
	), $mod_name, $module_ID, $fields_args )
);
?>

<div id="<?php echo $module_ID; ?>" class="<?php echo esc_attr( $container_class ); ?>">
  <div id="aotca-content-container">
    <div class="header-wrapper">
        <p><?php echo $publications_section_desc ?></p>
    </div>
    <section class="publications-container">
      <?php
        for($i = 0; $i < count($publications_list); $i++) {
      ?>
        <?php print_r( $publications_list[$i]->thumbnail ); ?>
        <div class="publication-container">
          <a class="naked publication" href="<?php echo $publications_list[$i][link]?>">
            <div class="logo-wrapper" style="height:200px; background: url(<?php echo $publications_list[$i][thumbnail]?>); background-size: cover;
    background-position: center; border-top-left-radius: 10px;border-top-right-radius: 10px; ">
            </div>
            <div class="title">
                <?php echo $publications_list[$i][title]?>
                <?php if ($publications_list[$i][password]=="true"):?>
                    <span class="lock"><i class="fa fa-lock fa-2x" aria-hidden="true"></i></span>
                <?php endif ;?>
            </div>
          </a>
        </div>
      <?php }?>
    </section>
  </div>
</div>
