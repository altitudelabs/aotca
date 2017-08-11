<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
/**
 * Template Events Detail
 *
 * Access original fields: $mod_settings
 */

include(get_template_directory_uri() . '/lib/bxslider.php');
wp_enqueue_script('bxslider', get_template_directory_uri() . '/lib/jquery.bxslider/jquery.bxslider.min.js');
wp_enqueue_style('bxslider', get_template_directory_uri() . '/lib/jquery.bxslider/jquery.bxslider.min.css');

wp_enqueue_style('events-detail', plugin_dir_url( __FILE__ ) . '/assets/events-detail.css');

$events_itinerary_default = array(
  'start_date' => '',
  'end_date' => '',
  'timezone' => '',
  'location' => '',
  'event_detail' => 'detail!',
);

$fields_args = wp_parse_args( $mod_settings, $events_itinerary_default );

extract( $fields_args );

$container_class = implode( ' ', apply_filters( 'themify_builder_module_classes', array(
	'module', 'module-' . $mod_name, $module_ID
	), $mod_name, $module_ID, $fields_args )
);

function render_documents($name, $list_title = "", $render_divider = true) {
  /*Repeater General Documents */
  $documents = get_fields(get_the_ID())[$name];
  ?>
    <div class="documents">
  <?php
  if ($list_title) {
    ?>
    <h4><?php echo $list_title ?></h4>
    <?php
  }
  if(!$documents || count($documents) == 0) {
    ?>
      <div>There are no documents available.</div>
    <?php
    if ($render_divider) {
      ?>
        <div class="divider" style="margin: 46px 0px;"></div>
      <?php
    }
    return;
  }
  if($documents) {
    ?>
      <ul class="naked">
    <?php
    for ($i = 0; $i < count($documents); $i++) {
      $document = $documents[$i];
      ?>
        <li>
          <span class="title">
            <?php echo $document['title'] ?>
          </span>
          <form method="get" target="_blank" action="<?php echo $document['file'] ?>" class="download">
             <button class="btn-outline-primary cap"type="submit">
               Download Now
             </button>
          </form>
        </li>
      <?php
    }
    ?>
      </ul>
    <?php
  }
  ?>
  </div>
  <?php
}
?>

<div id="<?php echo $module_ID; ?>" class="<?php echo esc_attr( $container_class ); ?>">
  <div class="events-detail-container aotca-viewport">
    <section class="events-itinerary">
      <div class="date-time">
        <h6 class="title">
          Date and Time
      </h6>
        <div class="start-date">
          <?php echo $start_date ?>
        </div>
        <div class="end-date">
          <?php echo $end_date . " " . $timezone ?>
        </div>
      </div>
      <div class="location">
        <h6 class="title">
          Location
      </h6>
        <div class="address">
          <?php echo $location ?>
        </div>
      </div>
      <div class="itinerary">
        <h6 class="title">
          Program Itinerary
      </h6>
        <form method="get" target="_blank" action="<?php echo get_fields(get_the_ID())['itinerary_document'] ?>">
           <button class="btn-primary cap"type="submit">
             Download Now
           </button>
        </form>
      </div>
    </section>
    <div class="events-info">
      <section class="sections">
        <h2>Sections</h2>
        <ul>
          <li><a class="naked" href="#event-detail">Event Detail</a></li>
          <li><a class="naked" href="#general-documents">General Information Documents</a></li>
          <li><a class="naked" href="#conference-documents">International Tax Conference Documents</a></li>
          <li><a class="naked" href="#general-council-documents">General Council Meeting</a></li>
          <li><a class="naked" href="#general-meeting-documents">General Meeting</a></li>
          <li><a class="naked" href="#sgatar-documents">SGATAR</a></li>
          <li><a class="naked" href="#event-images">Event Photographs</a></li>
        </ul>
      </section>
      <div class="divider" style="margin: 46px 0px;"></div>

      <section class="event-detail" id="event-detail">
        <h2>Event Detail</h2>
        <p>
          <?php echo $event_detail ?>
        </p>
      </section>
      <div class="divider" style="margin: 40px 0px;"></div>

      <section class="general-documents" id="general-documents">
        <h2>General Information Documents</h2>
        <p>
          <?php echo $general_info_detail ?>
        </p>
        <?php echo render_documents("general_information_documents") ?>
      </section>

      <section class="conference-documents" id="conference-documents">
        <h2>International Tax Conference Documents</h2>
        <?php echo render_documents("conference_documents") ?>
      </section>

      <section class="general-council-documents" id="general-council-documents">
        <h2>General Council Meeting</h2>
        <?php echo render_documents("council_agenda_documents", "Agenda", false) ?>
        <?php echo render_documents("council_minutes_documents", "Minutes") ?>
      </section>
      <section class="general-meeting-documents" id="general-meeting-documents">
        <h2>General Meeting</h2>
        <?php echo render_documents("meeting_agenda_documents", "Agenda", false) ?>
        <?php echo render_documents("meeting_minutes_documents", "Minutes") ?>
      </section>
      <section class="sgatar-documents" id="sgatar-documents">
        <h2>SGATAR Documents</h2>
        <?php echo render_documents("sgatar_documents") ?>
      </section>
      <section class="event-images" id="event-images">
        <h2>Event Photographs</h2>
        <div class="photo-slider">
          <ul class="bxslider">
            <?php
              $images = get_fields(get_the_ID())['event_photographs'];
              for ($i = 0; $i < count($images); $i++) {
            ?>
              <li><img src=<?php echo $images[$i]['url'] ?> /></li>
            <?php } ?>
          </ul>

          <div id="bx-pager">
            <?php
              for ($i = 0; $i < count($images); $i++) {
            ?>
              <a data-slide-index="<?php echo $i ?>" href="" >
                <div
                  class="thumbnail"
                  style="background-image: url(<?php echo $images[$i]['url'] ?>)"
                ></div>
              </a>
            <?php } ?>
          </div>
        </div>
      </section>
      <script>
      var $ = window.jQuery;
      $(document).ready(function() {
        $('.bxslider').bxSlider({
          pagerCustom: '#bx-pager',
          controls: false
        });
      });
      </script>
      <!-- <form method="post">
        <label>Enter Application ID:</label>
        <input type="text" name="application_id">
        <label>Enter Password:</label>
        <input type="password" name="application_pass">
        <center style="margin: 10px 0;"><input type="submit" name="submit" value="search"></center>
      </form> -->
      <?php
          // $application_id = $_POST["application_id"];
          // $entered_pass = $_POST["application_pass"];
          //
          // echo $entered_pass;
      ?>
    </div>
  </div>
</div>
