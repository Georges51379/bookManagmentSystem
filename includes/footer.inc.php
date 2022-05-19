<style>

.body_footer{
  position: relative;
  padding-bottom: 448px;
  min-height: 100vh;
}
  .footer {
    position: absolute;
  	width: 100%;
  	background: #2C3531;
  	display: block;
    bottom: 0;
}
   .footer_wrapper {
  	 width: 95%;
  	 margin: auto;
  	 padding: 30px 10px;
  	 display: flex;
  	 flex-wrap: wrap;
  	 box-sizing: border-box;
  	 justify-content: center;
   }

  .footer_categories {
  	width: 25%;
    text-transform: capitalize;
  	padding: 10px 20px;
  	box-sizing: border-box;
  	color: #b1d4e0;
  }

  .footer_categories .footer_desc {
  	font-size: 16px;
  	text-align: justify;
  	line-height: 25px;
  	color: #D9B08C;
  }

  .footer_categories .footer_title {
  	color: gold;
    background-color: maroon;
    transform: skew(25deg);
    font-weight: bolder;
    font-family: sans-serif;
    width: 75%;
  }

  .border1 {
  	height: 3px;
  	width: 40px;
  	background: #D1E8E2;
  	color: red;
  	border: 0px;
  }

  .footer_lists {
  	list-style: none;
  	color: #fff;
  	font-size: 15px;
  	letter-spacing: 0.5px;
   }

  .footer_lists .footer_links {
  	text-decoration: none;
  	outline: none;
  	color: #fff;
  	transition: 0.3s;
  }

  .footer_lists .footer_links:hover {
  	color: gold;
  }

  .footer_lists .footer_li {
  	margin: 10px 0;
  	height: 25px;
  }

  .footer_li .contactus_icon {
  	margin-right: 20px;
  }

  .social_media {
  	width: 100%;
  	color: #fff;
  	text-align: center;
  	font-size: 20px;
  }

  .social_media .sm_links {
  	text-decoration: none;
  }

  .social_media .sm_icon {
  	height: 25px;
  	width: 25px;
  	margin: 20px 10px;
  	padding: 4px;
  	color: #fff;
  	transition: 0.5s;
  }

  .social_media .sm_icon:hover {
  	transform: scale(1.5);
  }

  .social_media .fb:hover{
    color: #3b5998;
  }

  .social_media .insta:hover{
    color: #DD2A7B;
  }

  .social_media .wtp:hover{
    color: #075e54;
  }

  .social_media .yt:hover{
    color: #FF0000;
  }
  .footer_bottom {
  	padding: 10px;
  	background: #2C3531;
  	color: #D9B08C;
  	font-size: 12px;
  	text-align: center;
    font-size: 20px;
    text-transform: capitalize;
  }
  /* for tablet mode view */
  @media screen and (max-width: 1275px) {
  	.footer_categories {
  		width: 50%;
  	}
  }
  /* for mobile screen view */

  @media screen and (max-width: 660px) {
  	.footer_categories {
  		width: 100%;
  	}
  }

</style>

<body class="body_footer">

<footer class="footer">
<div class="footer_wrapper">

<!--  for company name and description -->
  <div class="footer_categories">
    <h1 class="footer_title">Bookie</h1>
    <p class="footer_desc">the store that all readers have been waiting for</p>
  </div>
<!--  for contact us info -->
  <div class="footer_categories">
    <h3>Contact us</h3>
    <div class="border1"></div>
      <ul class="footer_lists">
        <li class="footer_li"><i class="contactus_icon fa fa-map-marker" aria-hidden="true"></i>north lebanon, chekka</li>
        <li class="footer_li"><i class="contactus_icon fa fa-phone" aria-hidden="true"></i>961 76 126703</li>
        <li class="footer_li"><i class="contactus_icon fa fa-envelope" aria-hidden="true"></i>bookie.services@gmail.com</li>
      </ul>

<!--   for social links -->
      <div class="social_media">
        <a href="#" class="sm_links"><i class="sm_icon fb fa fa-facebook"></i></a>
        <a href="#" class="sm_links"><i class="sm_icon insta fa fa-instagram"></i></a>
        <a href="#" class="sm_links"><i class="sm_icon wtp fa fa-whatsapp"></i></a>
        <a href="#" class="sm_links"><i class="sm_icon yt fa fa-youtube"></i></a>
      </div>
  </div>
</div>

<!--   Footer Bottom start  -->
<div class="footer_bottom">
  Copyright &copy; bookie <script>document.write(new Date().getFullYear())</script>.
</div>
</footer>
</body>
<!--   Footer Bottom end -->

<!--   FOOTER END -->
