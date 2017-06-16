

function changeColor(){
  var text = document.getElementById("test");
  text.style.color="blue";
}

function handleSelectChange(){
  console.log("is called!");
  var monthSelector = document.getElementById("select_month");
  var yearSelector = document.getElementById("select_year");

  var month = monthSelector.options[monthSelector.selectedIndex].value;
  var year = yearSelector.options[yearSelector.selectedIndex].value;

  if((month!="Month")&&(year!="Year")){
    console.log("month: " + month);
    console.log("year: " + year);
    // $.ajax({
    //   type:"POST",
    //   url:'/Applications/MAMP/htdocs/aotca/wp-content/themes/themify-ultra/news.php',
    //   data:{
    //     'select_month':month,
    //     'select_year':year
    //   },
    //   success: function(data){
    //     alert('success');
    //   }
    // });

    // console.log("jquery success!");

    document.getElementById("select_form").submit();
    console.log("done");

  }
}
