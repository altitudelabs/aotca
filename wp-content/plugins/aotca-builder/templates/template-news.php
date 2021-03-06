<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
/**
 * Template News
 *
 * Access original fields: $mod_settings
 */

wp_enqueue_style('news-page', plugin_dir_url( __FILE__ ) . '/assets/news.css');

$news_default = array(
  'news_list' => array(
    array(
      'title' => '',
      'address' => '',
      'link' => '',
    ),
  ),
);

$fields_args = wp_parse_args( $mod_settings, $news_default );

extract( $fields_args );

$container_class = implode( ' ', apply_filters( 'themify_builder_module_classes', array(
	'module', 'module-' . $mod_name, $module_ID
	), $mod_name, $module_ID, $fields_args )
);
?>

<div id="<?php echo $module_ID; ?>" class="<?php echo esc_attr( $container_class ); ?>">
  <div id="aotca-content-container">
    <section class="news-list-container">
      <?php
        for($i = 0; $i < count($news_list); $i++) {
      ?>
        <div class="news-container">
          <a class="naked news" href="<?php echo $news_list[$i][link]?>">
            <span class="date"><?php echo $news_list[$i][date]?></span>
            <h2 class="title"><?php echo $news_list[$i][title]?></h2>
            <span class="description"><?php echo $news_list[$i][description]?></span>
          </a>
        </div>
      <?php }?>
    </section>
  </div>
</div>
