<script>
var i = 0;
var images = [];
var time = 4000;

images [0] = 'banners/prodbanner/1.png';
images [1] = 'banners/prodbanner/msi.png';
images [2] = 'banners/prodbanner/lenovo.png';
images [3] = 'banners/prodbanner/acer.png';
images [4] = 'banners/prodbanner/asus.png';
images [5] = 'banners/prodbanner/dell.png';
images [6] = 'banners/prodbanner/lenovo.png';
images [7] = 'banners/prodbanner/hp.png';
images [8] = 'banners/prodbanner/razer.png';
images [9] = 'banners/prodbanner/np.png';

function slideshow(){
  document.slide.src = images[i];
  if ( i < images.length - 1){
    i++;
  }else {
    i = 0;
  }
  setTimeout("slideshow()", time);
}
window.onload = slideshow;
</script>

<style>
.slideshow{
  box-shadow: 4px 4px 5px #2C3531;
  border: 3px solid #2C3531;
  border-style: double;
  margin-top: 20px;
  margin-bottom: 20px;
  width: 100%;
  height: 85%;
}
.wrapper-productslideshow{
  width: 70%;
  height: 50%;
}
</style>
<center>
  <div class="wrapper-productslideshow">
    <img name="slide" class="slideshow">
  </div>
</center>
