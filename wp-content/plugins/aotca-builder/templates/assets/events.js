function changeColor(){
  // var text = document.getElementById("test");
  // text.style.color="blue";
}

// $('#form_container').find('button').on('click', function(){
//     handleSelect();
// });

function handleSelectChange(page, page_no=1){ //Initial function that gets called to automatically load pages by recent date. Also called when select is changed
  //Reset everything to nothing
  $("#post_container").empty();
  $("#pagination_wrapper").empty();

  var month = $('#form_container').find('select[name="s_month"] :selected').val();
  var year = $('#form_container').find('select[name="s_year"] :selected').val();

  $.ajax({
    type:"GET",
    url:'/wp-content/themes/themify-ultra/get_events.php',
    data:{
      'select_month':month,
      'select_year':year
    }
  }).done(function(data){ //If data does not have any results
      if (data == "[]") {
          var p = $("<p>", {style: "display: block; margin: 0 auto", text: "Sorry, no posts have been found."});
          $("#post_container").append(p);
      }
      else{
        data = (data.match(/\[.*\]/g))?data.match(/\[.*\]/g)[0]:data;
        final_data = JSON.parse(data);
        console.log("final data: " + final_data);

        $("#post_container").empty();
        $("#pagination_wrapper").empty();

        // sort events according to descending order of date
        final_data.sort(function(a,b) {
            var d1 = Date.parse(a.event_date);
            var d2 = Date.parse(b.event_date);
            return (d2 > d1) ? 1 : ((d1 > d2) ? -1 : 0);
        });
        var total_pages = Math.ceil(final_data.length/page);
        var start = (page_no-1)*page;
        var end = Math.min(final_data.length, start+page);
        $.each(final_data.slice(start, end), function(){
              var event = $(this)[0];

              // clean data, set default values
              var upcoming = event.event_upcoming ? event.event_upcoming :0;
              var location = (event.event_location)? event.event_location:'';
              var date = (event.event_date)? event.event_date: '';
              var image = (event.event_image)? event.event_image: '#';
              var link = (event.event_link) ? event.event_link: '#';
              var title = (event.event_title)? event.event_title: 'Event';

              var $article = $("<article>",{class:"page"});
              var $a_link = $("<a>", {href: link});
              var $p_title_text = $("<p>", {class: "title_text", text: title});
              var $img = $("<img>", {src: image });
              var $img_wrapper = $("<div>", {class:"img_wrapper"});
              var $p_location = $("<p>",{class: "location_text", text: location});
              var $div_wrapper = $("<div>",{class: "date_upcoming_wrapper"});
              var $p_date_text = $("<p>", {class: "date_text", text: date});
              var $p_upcoming_text = (upcoming)? $("<p>", {class: "upcoming_text upcoming", text: "upcoming"}): $("<p>", {class: "upcoming_text past", text: "past"});

              $div_wrapper.append($p_date_text);
              $div_wrapper.append($p_upcoming_text);
              $img_wrapper.append($img);
              $article.append($a_link)
              $a_link.append($img_wrapper);
              $a_link.append($p_location);
              $a_link.append($p_title_text);
              $a_link.append($div_wrapper);

              $("#post_container").append($article);
        });


        // pagination wrapper
        var previous_counter = page_no-1;
        var next_counter = page_no+1;

        if (previous_counter > 0){
            var $a_previous_link = $("<a>", {onclick: ("handleSelectChange("+page+","+previous_counter+")"),text: "« Previous"});
            var $div_previous = $("<div>", {id:"pagination_previous"});
            $div_previous.append($a_previous_link);
            $("#pagination_wrapper").append($div_previous);
        }
        var $div_btns = $("<div>", {id:"pagination_buttons"});
        for (var i = 1; i <= total_pages; i++) {
            var $a_link = (page_no==i)?$("<a>", {class: "pagination active",onclick: ("handleSelectChange("+page+","+i+")"),text: i}): $("<a>", {class: "pagination", onclick: ("handleSelectChange("+page+","+i+")"), text: i});
            $div_btns.append($a_link);
        }
        $("#pagination_wrapper").append($div_btns);
        var $div_select = $("<div>", {id:"pagination_select"});
        var $select = $("<select>", {onchange: ("mobilePagination("+page+")")});
        for (var i = 1; i <= total_pages; i++) {
            var $option = (page_no==i)? $("<option>", {value: i, text: "Page "+i, selected: true}):$("<option>", {value: i, text: "Page "+i});
            $select.append($option);
        }
        $div_select.append($select);
        $("#pagination_wrapper").append($div_select);

        if (next_counter <= total_pages){
            var $a_next_link = $("<a>", {onclick: ("handleSelectChange("+page+","+(next_counter)+")"),text: "Next »"});
            var $div_next = $("<div>", {id:"pagination_next"});
            $div_next.append($a_next_link);
            $("#pagination_wrapper").append($div_next);
        }

      }
    }).fail(function(jqXHR, textStatus, error){
      console.log(jqXHR);
      console.log(textStatus);
      console.log(error);
    });
}

function mobilePagination(page){
    handleSelectChange(page, $("#pagination_select").find("select :selected").val());
}
