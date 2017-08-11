var global_pagination_index;

function changeColor(){
  // var text = document.getElementById("test");
  // text.style.color="blue";
}

// $('#form_container').find('button').on('click', function(){
//     handleSelect();
// });

function handleSelectChange(){ //Initial function that gets called to automatically load pages by recent date. Also called when select is changed
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
         var final_data = JSON.parse(data);
        console.log("final data: " + final_data);
        var total_events = final_data.length;
        var num_elements_per_page = 4;
        var pages = Math.ceil(total_events/num_elements_per_page);
        var final_pages = Math.ceil(pages);
        console.log("final_pages: " + final_pages);
        var previous_counter = 0;
        var next_counter = 0;

        //Limits pagination to 4 buttons
        var pagination_limit;
        (final_pages<4)?pagination_limit=final_pages:pagination_limit=4;

        for(var i =1; i<=pagination_limit; i++){
          var a = document.createElement('a');
          a.setAttribute("id",i);
          a.onclick=function(){
            handlePaginationChange(this.id);
          }
          a.innerHTML = i;
          $("#pagination_wrapper").append(a);
        }

        //Logic for "Next>" pagination
        if(total_events > num_elements_per_page && next_counter==0){
          var n = document.createElement('a');
          n.setAttribute("id",2);
          n.onclick=function(){
            handlePaginationChange(this.id);
          }
          n.innerHTML = "Next &rsaquo;";
          $("#pagination_wrapper").append(n);
          next_counter++;
        }

        //Hides pagination if there is only 1 page
        if(total_events<=num_elements_per_page){
          $("#pagination_wrapper").css("display", "none");
        }

        for(var i=0; i<num_elements_per_page; i++){
            if (final_data[i]){
                var upcoming = final_data[i].event_upcoming ?final_data[i].event_upcoming :'';
                var location = (final_data[i].event_location)? final_data[i].event_location:'';
                var date = (final_data[i].event_date)? final_data[i].event_date: '';
                var image = (final_data[i].event_image)? final_data[i].event_image: '#';
                var link = (final_data[i].event_link) ? final_data[i].event_link: '#';
                var title = (final_data[i].event_title)? final_data[i].event_title: 'Title';

                var $article = $("<article>",{"class":"page"});
                var $a_link = $("<a>", {href: link});
                var $p_title_text = $("<p>", {class: "title_text", text: title});
                var $img = $("<img>", {src: image });
                var $img_wrapper = $("<div>", {"class":"img_wrapper"});
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

            }
        }
      }
    }).fail(function(jqXHR, textStatus, error){
      console.log(jqXHR);
      console.log(textStatus);
      console.log(error);
    });
}


function handlePaginationChange(parameter){ //Same as the above, except we pass in the page number as a parameter now as well.
  //Parse int so arithmetic is done correctly. Want MATH addition instead of adding two strings
  var page_number = parseInt(parameter);
  $("#post_container").empty();
  $("#pagination_wrapper").empty();
  console.log("is called pagination!");
  var month = $('#form_container').find('select[name="s_month"] :selected').val();
  var year = $('#form_container').find('select[name="s_year"] :selected').val();

  $.ajax({
    type:"GET",
    url:'/wp-content/themes/themify-ultra/get_events.php',
    data:{
      'select_month':month,
      'select_year':year
    }
  }).done(function(data){
      if(data.length<=32){
        console.log(data);
      }
      else{
        /*Necessary to parse out the extra <div>ptb_loop...</div> that comes from WP_Query */
        var returned_data = data.slice(56);
        var final_data = JSON.parse(returned_data);
        console.log("final data: " + final_data);

        var total_events = final_data.length;
        var num_elements_per_page = 4;
        var pages = total_events/num_elements_per_page;
        var previous_counter = 0;
        var next_counter = 0;

        if(page_number>1 && previous_counter==0){
          var p = document.createElement('a');
          p.setAttribute("id",page_number-1);
          p.onclick=function(){
            handlePaginationChange(this.id);
          }
          p.innerHTML = "&lsaquo; Previous";
          $("#pagination_wrapper").append(p);
          previous_counter++;
        }

        var final_page_index = page_number+3;
        (final_page_index>pages) ? final_page_index=pages : final_page_index = page_number+3;
        var starting_page_index = final_page_index-3;
        (starting_page_index<0) ? starting_page_index=1 : starting_page_index = final_page_index-3;

        for(var i = starting_page_index; i<=final_page_index; i++){

            var a = document.createElement('a');
            if(page_number==i){
              a.setAttribute("class", "active");
            }
            a.setAttribute("id",i);
            a.onclick=function(){
              handlePaginationChange(this.id);
            }
            a.innerHTML = i;
            $("#pagination_wrapper").append(a);

        }

        if(page_number!=pages && next_counter==0){
          var n = document.createElement('a');
          n.setAttribute("id",(page_number+1));
          n.onclick=function(){
            handlePaginationChange(this.id);
          }
          n.innerHTML = "Next &rsaquo;";
          $("#pagination_wrapper").append(n);
          next_counter++;
        }

        var desired_index = (page_number*num_elements_per_page)-num_elements_per_page;
        var desired_ending_index = desired_index + num_elements_per_page;

        for(var i=desired_index; i<desired_ending_index; i++){
          var upcoming = final_data[i].event_past;
          var location = final_data[i].event_location;
          var date = final_data[i].event_date;
          var image = final_data[i].event_image;
          var link = final_data[i].event_link;
          var title = final_data[i].event_title;

          var $article = $("<article>",{"class":"page"});
          var $img = $("<img>", {src: image });
          var $p_location = $("<p>",{id: "location_text", text: location});
          var $a_link = $("<a>", {id: "title_text", href: link, text: title});
          var $div_wrapper = $("<div>",{id: "date_upcoming_wrapper"});
          var $p_date_text = $("<p>", {id: "date_text", text: date});
          var $p_upcoming_text = $("<p>", {id: "upcoming_text", text: upcoming});

          $div_wrapper.append($p_date_text);
          $div_wrapper.append($p_upcoming_text);

          $article.append($img);
          $article.append($p_location);
          $article.append($a_link);
          $article.append($div_wrapper);

          $("#post_container").append($article);
        }
      }
    }).fail(function(jqXHR, textStatus, error){
      console.log(jqXHR);
      console.log(textStatus);
      console.log(error);
    });

}
