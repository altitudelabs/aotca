function append_member(number){
  console.log("box_"+number);
  var box = document.getElementById("box_"+number).onclick= function(){
    console.log("clicked");
    document.getElementById("my_modal").style.display = "block";
  }
}

// When the user clicks on <span> (x), close the modal
function close_modal(){
  document.getElementById("my_modal").style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == my_modal) {
      document.getElementById("my_modal").style.display = "none";
    }
}

//Redirect to correct url
function redirect_link(link){
  console.log(link);
  window.location.href = link;
}
