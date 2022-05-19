<style>
#back_top_btn {
  display: none;
  position: fixed;
  bottom: 30px;
  right: 30px;
  font-size: 26px;
  width: 50px;
  height: 50px;
  background-color: #116466;
  color: #FFCB9A;
  cursor: pointer;
  outline: none;
  border: 3px solid #333;
  border-radius: 50%;
  transition-duration: 0.2s;
  transition-timing-function: ease-in-out;
  transition-property: background-color, color;
}
#back_top_btn:hover, #back_top_btn:focus {

  background-color: #FFCB9A;
  color: #116466;
}

@media(max-width:768px) {
#back_top_btn {
 font-size: 18px; width: 32px; height: 32px; bottom: 6px; right: 6px;
  }
}

</style>


<button id="back_top_btn"><i class="fa fa-angle-double-up"></i></button>

<script>

$(document).ready(function() {

  var btn = $('#back_top_btn');

  $(window).scroll(function() {
    if ($(window).scrollTop() > 100) {
      btn.show();
    } else {
      btn.hide();
    }
  });

  btn.on('click', function(e) {
    e.preventDefault();
    $('html, body').animate({scrollTop:0}, '300');
  });
});
</script>
