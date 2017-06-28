<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<link type="text/css" href="<?php echo get_template_directory_uri();?>/event.css" rel="stylesheet">
<script type="text/javascript" src="<?php echo get_template_directory_uri();?>/event.js"></script>

<?php

  //echo var_dump(get_fields(6034));

  $settings = get_fields(6034);
  $banner_background_image = $settings["banner_background_image"]['url'];
  $box_background_image = $settings["box_background_image"]['url'];
  $upper_left_text = $settings['upper_left_text'];
  $conference_title = $settings['conference_title'];
  $conference_description = $settings['conference_description'];
  $button_text = $settings['button_text'];
  $button_link = $settings['button_link'];
  $header = $settings['header'];
  $header_main = $settings['header_main_description'];
  $header_secondary = $settings['header_secondary_description'];


  // echo $banner_background_image;
  // echo $box_background_image;
  // echo $upper_left_text;
  // echo $conference_title;
  // echo $conference_description;
  // echo $button_text;
  // echo $button_link;
  // echo $header;


?>

<div id = "jumbotron">
	<h1>Events</h1>
</div>

<div id = "event_update">
  <div id = "main_text">
    <h2> Upcoming Event </h2>
    <h1> AOTCA International Tax Conference Makati 2017 </h1>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce sollicitudin vitae
      lacus eget mollis. Morbi facilisis mattis velit, eu fringilla orci tempor ac. Vivamus
      pretium elementum lectus, ut rutrum nisl consequat sed. Maecenas vitae dui maximus.</p>
    <button> Learn More </button>
  </div>
</div>

<div id = "past_meetings">
  <h3>AOTCA Past Meetings </h3>
  <p>AOTCA convenes a general council meeting annually and a general meeting bi-annually in collaboration
    with a host organisation. At the time of convening meetings, it holds technical sessions and discussions
    on local and international tax, investments and other matters.
  </p>
  <p>The past AOTCA meetings are set forth below:</p>
  <table>
    <tr id = "border_top">
      <td id = "table_date"> 1992 </td>
      <td id = "table_month"> February </td>
      <td id = "table_location"> Tokyo, Japan (Inaugural Meeting) </td>
    <tr id = "border_top">
      <td id = "table_date"> 1992 </td>
      <td id = "table_month"> November </td>
      <td id = "table_location"> Singapore </td>
    </tr>
    <tr id = "border_top">
      <td id = "table_date"> 1992 </td>
      <td id = "table_month"> May </td>
      <td id = "table_location"> Tokyo, Japan (Inaugural Meeting) </td>
    </tr>
  </table>
  <!-- <div id = "details_wrapper">
    <p id = "details_date"> 1992 </p>
    <p id = "details_month"> February </p>
    <p id = "details_location"> Tokyo, Japan (Inaugural Meeting)</p>
  </div> -->
</div>
