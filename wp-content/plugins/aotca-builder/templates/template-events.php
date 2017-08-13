<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
/**
 * Template Events
 *
 * Access original fields: $mod_settings
 */

wp_enqueue_style('event-page', plugin_dir_url( __FILE__ ) . '/assets/events.css');
wp_enqueue_script('event-page', plugin_dir_url( __FILE__ ) . '/assets/events.js');

$events_default = array(
	'page' => 12,
);

$fields_args = wp_parse_args( $mod_settings, $events_default );

extract( $fields_args );

$container_class = implode( ' ', apply_filters( 'themify_builder_module_classes', array(
	'module', 'module-' . $mod_name, $module_ID
	), $mod_name, $module_ID, $fields_args )
);

$settings = get_fields(get_the_ID());
$box_background_image = $settings["box_background_image"]['url'];
$upper_left_text = $settings['upper_left_text'];
$conference_title = $settings['conference_title'];
$conference_description = $settings['conference_description'];
$button_text = $settings['button_text'];
$button_link = $settings['button_link'];
$header = $settings['header'];
$header_main = $settings['header_main_description'];
$header_secondary = $settings['header_secondary_description'];
$table_information = $settings['past_meetings_table'];

?>

<script
  src="https://code.jquery.com/jquery-3.2.1.js"
  integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
  crossorigin="anonymous">
</script>
<script>
  $(document).ready(function(){
    handleSelectChange();
  });
</script>
<script type="text/javascript" src="<?php echo get_template_directory_uri();?>/event.js"></script>

<div id="<?php echo $module_ID; ?>" class="<?php echo esc_attr( $container_class ); ?>">
	<div class="aotca-viewport">
	    <div id = "event_update" style = "background: linear-gradient(to right, rgba(255, 255, 255, 1) 55%, rgba(255, 255, 255, 0)), url(<?php echo $box_background_image?>); background-repeat: no-repeat; background-size: contain; background-position: right center; border-radius: 10px; box-shadow: 5px 10px 30px rgba(0, 0, 0, 0.2), 5px 10px 30px rgba(0, 0, 0, 0.15);">
	        <div id = "bg_image">
	            <div id = "main_text">
	              <h6 id="upper_left_text"> <?php echo $upper_left_text?> </h6>
	              <h1> <?php echo $conference_title?> </h1>
	              <p> <?php echo $conference_description?></p>
	              <button class="btn-primary bold upper"onclick = "window.location.href= <?php echo $button_link;?>"> <?php echo $button_text?> </button>
	            </div>
	        </div>
	    </div>

	    <div id = "past_meetings">
	      <div id = "past_meetings_descriptions">
	        <h1><?php echo $header?> </h1>
	        <p id="main"><?php echo $header_main?></p>
	        <p id="secondary"><?php echo $header_secondary?></p>
	        <ul class="naked">
	            <?php for($i=0; $i<count($table_information); $i++):?>
	                <li>
	                    <p id = "date">
	                      <?php echo $table_information[$i]['year'];?>
	                    </p>
	                    <p id = "month">
	                      <?php echo $table_information[$i]['month'];?>
	                    </p>
	                    <p id = "location">
	                      <?php echo $table_information[$i]['location'];?>
	                    </p>
	                </li>
	            <?php endfor ;?>
	        </ul>
	      </div>
	    </div>
		<div id="members_events">
			<!-- Start of Member Events Section -->

		      <h1> Members' Events </h1>

		        <div id="form_container">
		          <select id="select_month" onchange="handleSelectChange(<?php echo $page?>)" name="s_month">
		            <option value="months">Months</option>
					<?php for ($month=1; $month <=12; $month++):?>
						<?php if ($month == date("n")):?>
							<option value="<?php echo date("M", mktime(0, 0, 0, $month))?>" selected><?php echo date("F", mktime(0, 0, 0, $month))?></option>
						<?php else:?>
							<option value="<?php echo date("M", mktime(0, 0, 0, $month))?>"><?php echo date("F", mktime(0, 0, 0, $month))?></option>
						<?php endif;?>

					<?php endfor;?>
		          </select>
		          <select id="select_year" onchange="handleSelectChange(<?php echo $page?>)" name="s_year">
		            <option value="years">Years</option>
		            <?php for ($year = 2020; $year >= 1990; $year--):?>
						<?php if ($year == date("Y")):?>
							 <option value="<?php echo $year?>"selected><?php echo $year?></option>
						<?php else:?>
							 <option value="<?php echo $year?>"><?php echo $year?></option>
						<?php endif;?>
		            <?php endfor;?>
		          </select>
		        </div>


		      <div id="post_container">
		      </div> <!--post_container ending div here -->


		      <!-- Pagination Starts Here (Defualt 10 per page) -->
		      <?php
		      $pages = count($document_objects)/$page;?>

		      <div id = "pagination_wrapper">
		      </div>
		</div>
	</div>
</div>
