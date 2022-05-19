<head>
	<!--FONT AWESOME CDN SECTION-->
	    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<!--jQUERY CDN SECTION-->
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

			<style>
			*{
			  margin: 0;
			  padding: 0;
			  box-sizing: border-box;
			  font-family: sans-serif;
			}
			/*START TOPBAR STYLE*/
			.topbar{
			  background-color: #2C3531;
			  width: 100%;
			  padding: 0.6%;
			  border-bottom: 3px solid gray;
			}
			.topbar ul li{
			  display: inline-flex;
			  list-style: none;
			}
			.topbar ul .right{
			  float: right;
			  color: white;
			}
			.topbar ul .center{
			  margin-left: 40%;
			}
			.topbar ul .left{
			  float: left;
			  color: red;
			}
			.topbar a{
			  text-decoration: none;
			  text-transform: capitalize;
			  color: #D1E8E2;
			}
			.topbar a:hover{
			  transform: scale(1.3);
			}
			/*END TOPBAR STYLE*/

			*{
			  margin: 0;
				padding: 0;
				box-sizing: border-box;
			  font-family: sans-serif;
			}

			.sidebar {
			  overflow: hidden;
			  background-color: #116466;
			}
			.sidebar a {
			  float: left;
			  display: block;
			  color: #2C3531;
				text-transform: capitalize;
			  text-align: center;
			  padding: 14px 16px;
			  text-decoration: none;
			  font-size: 17px;
			}

			.sidebar a:hover {
			  background-color: black;
			  color: white;
			}

			.sidebar a.active {
			  background-color: black;
			  color: white;
			}

			.sidebar .icon {
			  display: none;
			}

			@media screen and (max-width: 600px) {
			  .sidebar a:not(:first-child) {display: none;}
			  .sidebar a.icon {
			    float: right;
			    display: block;
			  }
			}

			@media screen and (max-width: 600px) {
			  .sidebar.responsive {position: relative;}
			  .sidebar.responsive .icon {
			    position: absolute;
			    right: 0;
			    top: 0;
			  }
			  .sidebar.responsive a {
			    float: none;
			    display: block;
			    text-align: left;
			  }
			}
			</style>

</head>

<header class="admin-panel">
	<div class="wrapper">
	<div class="topbar">
		<ul class="topbar-list">
			<li class="topbar-li left">
				<a href="changepassword.php" title="change password" class="topbar-link">
					<i class="fa fa-key"></i>
				</a>
			</li>
			<li class="topbar-li center">
				<a href="#" class="topbar-link">
					<span class="logo">book shop</span>
				</a>
			</li>
			<li class="topbar-li right">
				<a href="logout.php" title="logout" class="topbar-link">
					<i class="fa fa-power-off"></i>
				</a>
			</li>
		</ul>
	</div>

			<div class="sidebar-wrapper">
				<div class="sidebar" id="sidebar">
					<a href="dashboard.php" class="active">dashboard</a>
					<a href="books.php">books</a>
					<a href="javascript:void(0);" class="icon" onclick="hamburgerMenu()">
						<i class="fa fa-bars"></i>
					</a>
				</div>
			</div>
			<script>
function hamburgerMenu() {
  var sidebar = document.getElementById("sidebar");
  if (sidebar.className === "sidebar") {
    sidebar.className += " responsive";
  } else {
    sidebar.className = "sidebar";
  }
}
</script>
		</div><!--end wrapper-->
</header>
