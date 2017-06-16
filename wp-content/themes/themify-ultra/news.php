<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<link type="text/css" href="<?php echo get_template_directory_uri();?>/news.css" rel="stylesheet">
<script type="text/javascript" src="<?php echo get_template_directory_uri();?>/news.js"></script>


<!-- Pagination Function -->
<?php
function custom_pagination($numpages = '', $pagerange = '', $paged='') {

  if (empty($pagerange)) {
    $pagerange = 2;
  }

  /**
   * This first part of our function is a fallback
   * for custom pagination inside a regular loop that
   * uses the global $paged and global $wp_query variables.
   *
   * It's good because we can now override default pagination
   * in our theme, and use this function in default quries
   * and custom queries.
   */
  global $paged;
  if (empty($paged)) {
    $paged = 1;
  }
  if ($numpages == '') {
    global $wp_query;
    $numpages = $wp_query->max_num_pages;
    if(!$numpages) {
        $numpages = 1;
    }
  }

  /**
   * We construct the pagination arguments to enter into our paginate_links
   * function.
   */
  $pagination_args = array(
    'base'            => get_pagenum_link(1) . '%_%',
    'format'          => 'page/%#%',
    'total'           => $numpages,
    'current'         => $paged,
    'show_all'        => False,
    'end_size'        => 1,
    'mid_size'        => $pagerange,
    'prev_next'       => True,
    'prev_text'       => __('&laquo; Previous'),
    'next_text'       => __('&raquo; Next'),
    'type'            => 'plain',
    'add_args'        => false,
    'add_fragment'    => ''
  );

  $paginate_links = paginate_links($pagination_args);

  if ($paginate_links) {
    echo "<nav class='custom-pagination'>";
      //echo "<span class='page-numbers page-num'>Page " . $paged . " of " . $numpages . "</span> ";
      echo $paginate_links;
    echo "</nav>";
  }

}?>

<h1 id="member_events"> Member's Events </h1>

<!-- Form with select inputs -->
<form method="POST" action="" id="select_form">

</form>

  <div id="form_container">
    <select id="select_month" onchange="handleSelectChange();" form="select_form" name="s_month">
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

<?php
  $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;

  //If there is a form submit, then we process our request with Metaqueries and process our result with month and year

  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    // echo $_POST['s_month'];
    // echo $_POST['s_year'];

    $month = $_POST['s_month'];
    $year = $_POST['s_year'];

    $month_final_input;

    switch($month){
      case "Jan":
      $month_final_input = 1;
      break;
      case "Feb":
      $month_final_input = 2;
      break;
      case "Mar":
      $month_final_input = 3;
      break;
      case "Apr":
      $month_final_input = 4;
      break;
      case "May":
      $month_final_input = 5;
      break;
      case "Jun":
      $month_final_input = 6;
      break;
      case "Jul":
      $month_final_input = 7;
      break;
      case "Aug":
      $month_final_input = 8;
      break;
      case "Sep":
      $month_final_input = 9;
      break;
      case "Oct":
      $month_final_input = 10;
      break;
      case "Nov":
      $month_final_input = 11;
      break;
      case "Dec":
      $month_final_input = 12;
      break;

    }


    $month_final_final = "news_month_" . $month_final_input;
    //echo $month_final_final;
    $month_final_input = serialize(array($month_final_final));

    $custom_args = array(
        'post_type' => 'news',
        'posts_per_page' => 9,
        'paged' => $paged,
        'meta_query' => [
              'relation' => 'AND',
              [
                'key' => 'ptb_news_year',
                'value' => $year,
                'compare' => '='
              ],
              [
                'key' => 'ptb_news_month',
                'value' => $month_final_input,
                'compare' => '='
              ]

          ]
      );
  }

  //If there is no form submit then we just get the posts by post date

  else{
    $custom_args = array(
        'post_type' => 'news',
        'posts_per_page' => 9,
        'paged' => $paged,
      );
  }

//This is the custom query and where we will append the information in the html
  $custom_query = new WP_Query( $custom_args ); ?>

  <?php if ( $custom_query->have_posts() ) : ?>

    <!-- the loop -->
    <?php while ( $custom_query->have_posts() ) : $custom_query->the_post();
      $imageURL = get_post_meta(get_the_ID(), 'ptb_image_1', true);
      $month = get_post_meta(get_the_ID(), 'ptb_news_month', true);
      $month_exact = substr((string)$month[0],11);
      $date = get_post_meta(get_the_ID(), 'ptb_news_date', true);
      $date_final = substr((string)$date[0],10);
      $year_final = get_post_meta(get_the_ID(), 'ptb_news_year', true);
      $title = get_the_title();
      $upcoming= get_post_meta(get_the_ID(), 'ptb_news_upcoming', true);
      $upcoming_exact = substr((string)$upcoming[0],14);
      $location = get_post_meta(get_the_ID(), 'ptb_news_locations', true);
      $description = get_post_meta(get_the_ID(), 'ptb_text_3', true);

      $month_final;
      $upcoming_final;
      $imageURL_final = $imageURL[1];
      $location_final = strtoupper("$location");

      switch($month_exact){
        case 1:
          $month_final = "Jan";
          break;
        case 2:
          $month_final = "Feb";
          break;
        case 3:
          $month_final = "Mar";
          break;
        case 4:
          $month_final = "Apr";
          break;
        case 5:
          $month_final = "May";
          break;
        case 6:
          $month_final = "Jun";
          break;
        case 7:
          $month_final = "Jul";
          break;
        case 8:
          $month_final = "Aug";
          break;
        case 9:
          $month_final = "Sep";
          break;
        case 10:
          $month_final = "Oct";
          break;
        case 11:
          $month_final = "Nov";
          break;
        case 12:
          $month_final = "Dec";
          break;
      }

      if($upcoming_exact==1){
        $upcoming_final = "UPCOMING";
      }
      else{
        $upcoming_final = "PAST";
      }

      $final_date = $month_final ." ".  $date_final .", ". $year_final;
    ?>

      <article class="page">
        <img src = "<?php echo $imageURL_final ?>">
        <p id="location_text"><?php echo $location_final?></p>
        <a id="title_text" href="<?php echo the_permalink(); ?>"><?php echo $title ?></a>
        <div id="date_upcoming_wrapper">
          <p id="date_text"><?php echo $final_date?></p>
          <p id="upcoming_text"><?php echo $upcoming_final?></p>
        </div>
        <div class="content">
          <?php the_excerpt(); ?>
        </div>
      </article>
    <?php endwhile; ?>
    <!-- end of the loop -->

    <!-- pagination here -->
    <?php
      if (function_exists(custom_pagination)) {
        custom_pagination($custom_query->max_num_pages,"",$paged);
      }
    ?>

  <?php wp_reset_postdata(); ?>

  <?php else:  ?>
    <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
  <?php endif; ?>

</div> <!--post_container ending div here -->


</html>
