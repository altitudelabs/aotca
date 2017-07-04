<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<link type="text/css" href="<?php echo get_template_directory_uri();?>/event.css" rel="stylesheet">
<script type="text/javascript" src="<?php echo get_template_directory_uri();?>/event.js"></script>
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

<?php
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
  $table_information = $settings['past_meetings_table'];

?>

<div id = "jumbotron" style = "background-image:url(<?php echo $banner_background_image?>)">
	<h1>Events</h1>
</div>

<div id = "event_update" style = "background-image:url(<?php echo $box_background_image?>)">
  <div id = "main_text">
    <h2> <?php echo $upper_left_text?> </h2>
    <h1> <?php echo $conference_title?> </h1>
    <p> <?php echo $conference_description?></p>
    <button onclick = "window.location.href= <?php echo $button_link;?>"> <?php echo $button_text?> </button>
  </div>
</div>

<div id = "past_meetings">
  <div id = "past_meetings_descriptions">
    <h3><?php echo $header?> </h3>
    <p><?php echo $header_main?></p>
    <p><?php echo $header_secondary?></p>
  </div>
  <table>
    <?php for($i=0; $i<count($table_information); $i++){?>
      <tr id="border_top">
        <td id = "table_date">
          <?php echo $table_information[$i]['year'];?>
        </td>
        <td id = "table_month">
          <?php echo $table_information[$i]['month'];?>
        </td>
        <td id = "table_location">
          <?php echo $table_information[$i]['location'];?>
        </td>
      </tr>
    <?php }?>
  </table>


<!-- Start of Member Events Section -->

  <h1 id="member_events"> Member's Events </h1>

    <div id="form_container">
      <select id="select_month" form="select_form" name="s_month">
        <option selected disabled>Month</option>
        <option value="Jan">January</option>
        <option value="Feb">February</option>
        <option value="Mar">March</option>
        <option value="Apr">April</option>
        <option value="May">May</option>
        <option value="Jun">June</option>
        <option value="Jul">July</option>
        <option value="Aug">August</option>
        <option value="Sep">September</option>
        <option value="Oct">October</option>
        <option value="Nov">November</option>
        <option value="Dec">December</option>
      </select>
      <select id="select_year" onchange="handleSelectChange();" form="select_form" name="s_year">
        <option selected disabled >Year</option>
        <option value="1990">1990</option>
        <option value="1991">1991</option>
        <option value="1992">1992</option>
        <option value="1993">1993</option>
        <option value="1994">1994</option>
        <option value="1995">1995</option>
        <option value="1996">1996</option>
        <option value="1997">1997</option>
        <option value="1998">1998</option>
        <option value="1999">1999</option>
        <option value="2000">2000</option>
        <option value="2001">2001</option>
        <option value="2002">2002</option>
        <option value="2003">2003</option>
        <option value="2004">2004</option>
        <option value="2005">2005</option>
        <option value="2006">2006</option>
        <option value="2007">2007</option>
        <option value="2008">2008</option>
        <option value="2009">2009</option>
        <option value="2010">2010</option>
        <option value="2011">2011</option>
        <option value="2012">2012</option>
        <option value="2013">2013</option>
        <option value="2014">2014</option>
        <option value="2015">2015</option>
        <option value="2016">2016</option>
        <option value="2017">2017</option>
        <option value="2018">2018</option>
        <option value="2019">2019</option>
        <option value="2020">2020</option>
      </select>
    </div>


  <div id="post_container">
  </div> <!--post_container ending div here -->


  <!-- Pagination Starts Here (Defualt 10 per page) -->
  <?php
  $pages = count($document_objects)/$num_elements_per_page;?>

  <div id = "pagination_wrapper">
  </div>

</div>
