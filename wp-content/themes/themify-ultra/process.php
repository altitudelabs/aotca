<?php

/*Very important as this is a custom php page and the following line provides us access to WordPress functions, including WP_Query, get_query_var, etc */
require_once($_SERVER['DOCUMENT_ROOT'] . '/wp-load.php');

class Event {
  public $event_upcoming;
  public $event_location;
  public $event_image;
  public $event_date;
  public $event_link;
  public $event_title;

}

$month = $_GET['select_month'];
$year = $_GET['select_year'];

if($month=="Month"&&$year=="Year"){
  $custom_args = array(
      'post_type' => 'news',
    );
}

else{
  $month_final_input;

  //This ensures that Month get's translated properly from AJAX call
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

  //echo $month_final_input;

  $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;

  //echo $paged;

  $month_final_final = "news_month_" . $month_final_input;
  //echo $month_final_final;
  $month_final_input = serialize(array($month_final_final));

  //echo $month_final_input;

  $custom_args = array(
      'post_type' => 'news',
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

} //End of else for AJAX Query Search


  //echo var_dump($custom_args);

  $custom_query = new WP_Query( $custom_args );
  $events = array();

    if ( $custom_query->have_posts() ):
    while ( $custom_query->have_posts() ) : $custom_query->the_post();
      $temp_event = new Event;
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
      $title_final = $title;
      $link_final = get_permalink();

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

      $temp_event->event_upcoming = $upcoming_final;
      $temp_event->event_location = $location_final;
      $temp_event->event_image = $imageURL_final;
      $temp_event->event_date = $final_date;
      $temp_event->event_title = $title_final;
      $temp_event->event_link = $link_final;

      $events[] = $temp_event;

    endwhile;
    wp_reset_postdata();
    //echo $events;
    echo json_encode($events);


  else:
    echo "Sorry, no posts have been found.";
  endif;

?>
