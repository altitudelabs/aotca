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

$m_month = $_GET['select_month'];
$m_year = $_GET['select_year'];

$custom_query_args = array(
    'post_type'=>'event',
// 'orderby'   => 'ptb_year ptb_month ptb_day',
// 'order'     => 'DESC',
// 'relation' => 'AND', // Optional, defaults to "AND"
// array(
// 	'key'     => 'ptb_year',
// 	'value'   => $m_year,
// 	'compare' => '='
// ),
// array(
//     'key'     => 'ptb_month',
//     'value'   => array("month_".$m_month,),
//     'compare' => '='
// ),
);
$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
if($m_month!="Month" && $m_year!="Year"){
    $m_month = date("n", strtotime($m_month));
}
  $custom_query = new WP_Query( $custom_query_args );

  $events = array();
    if ( $custom_query->have_posts() ):
    while ( $custom_query->have_posts() ) : $custom_query->the_post();
    $year = get_post_meta(get_the_ID(), 'ptb_event_year', true);
    $month = end(explode("_", get_post_meta(get_the_ID(), 'ptb_event_month', true)[0]));
    if ($year == $m_year && $month == $m_month){
        $temp_event = new Event;
        $image = get_post_meta(get_the_ID(), 'ptb_event_thumbnail', true)[1];
        $location = get_post_meta(get_the_ID(), 'ptb_event_location', true);
        $title = get_the_title(get_the_ID());
        $day = end(explode("_", get_post_meta(get_the_ID(), 'ptb_event_day', true)[0]));
        $today = date("Y-n-j");
        $date = $year."-".$month."-".$day;
        $upcoming = ($date <= $today)? 0:1;
        $link = get_permalink(get_the_ID());
        $temp_event->event_upcoming = $upcoming;
        $temp_event->event_location = $location;
        $temp_event->event_image = $image;
        $temp_event->event_date = date('M j, Y', strtotime($date));
        $temp_event->event_title = $title;
        $temp_event->event_link = $link;


        $events[] = $temp_event;

    }
    endwhile;
    wp_reset_postdata();
    //echo $events;
    echo json_encode($events);


  // else:
  //   echo "Sorry, no posts have been found.";
  endif;

?>
