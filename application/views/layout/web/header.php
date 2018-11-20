<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="<?php echo $base_url; ?>/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo $base_url; ?>/bootstrap/css/bootstrap-theme.min.css" >
<script src="<?php echo $base_url; ?>/js/jquery.min.js"></script> 	
<script src="<?php echo $base_url; ?>/bootstrap/js/bootstrap.min.js"></script> 	 
<script src="<?php echo $base_url; ?>/js/angular.min.js"></script>
<link rel="stylesheet" href="<?php echo $base_url; ?>/css/css.css"> 
	
	<script src="<?php echo $base_url; ?>/js/fabric.js"></script> 	
<script src="<?php echo $base_url; ?>/js/customiseControls.js"></script>



 	<title><?php echo $title; ?></title>
</head>
<body>


<nav class="navbar navbar-default" role="navigation">
	<div class="container container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="<?php echo $base_url;?>">C2MTee</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		



<?php if(!isset($_SESSION['user_id'])){ ?>
		<div class="collapse navbar-collapse navbar-ex1-collapse">


		<?php } ?>


			<ul class="nav navbar-nav">
				
				<li><a href="<?php echo $base_url;?>/marketplace">Marketplace</a></li>




	<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">Category <b class="caret"></b></a>
					<ul class="dropdown-menu">

					







 <li class="dropdown-submenu">
    <a tabindex="-1" href="<?php echo $base_url; ?>/marketplace?cat=4">Family</a>
    <ul class="dropdown-menu">

     <li><a href="<?php echo $base_url; ?>/marketplace?subcat=6">Girlfriend</a></li>
     <li><a href="<?php echo $base_url; ?>/marketplace?subcat=7">Daughter</a></li>
     <li><a href="<?php echo $base_url; ?>/marketplace?subcat=8">Uncle</a></li>
     <li><a href="<?php echo $base_url; ?>/marketplace?subcat=9">Son</a></li>
     <li><a href="<?php echo $base_url; ?>/marketplace?subcat=10">Sister</a></li>
     <li><a href="<?php echo $base_url; ?>/marketplace?subcat=11">Brother</a></li>
     <li><a href="<?php echo $base_url; ?>/marketplace?subcat=12">Parents</a></li>
     <li><a href="<?php echo $base_url; ?>/marketplace?subcat=13">Nephew and Niece</a></li>
     <li><a href="<?php echo $base_url; ?>/marketplace?subcat=14">Husband</a></li>
     <li><a href="<?php echo $base_url; ?>/marketplace?subcat=15">Father</a></li>
     <li><a href="<?php echo $base_url; ?>/marketplace?subcat=16">Kids</a></li>
     <li><a href="<?php echo $base_url; ?>/marketplace?subcat=17">Mother</a></li>
     <li><a href="<?php echo $base_url; ?>/marketplace?subcat=18">Wife</a></li>
     <li><a href="<?php echo $base_url; ?>/marketplace?subcat=19">Grandparents</a></li>
     <li><a href="<?php echo $base_url; ?>/marketplace?subcat=20">Other</a></li>


    </ul>
  </li>


 <li class="dropdown-submenu">
    <a tabindex="-1" href="<?php echo $base_url; ?>/marketplace?cat=5">Hobbies</a>
    <ul class="dropdown-menu">

     <li><a href="<?php echo $base_url; ?>/marketplace?subcat=21">Fitness</a></li>
     <li><a href="<?php echo $base_url; ?>/marketplace?subcat=22">Music</a></li>
     <li><a href="<?php echo $base_url; ?>/marketplace?subcat=23">Movies</a></li>
     <li><a href="<?php echo $base_url; ?>/marketplace?subcat=24">Video Games</a></li>
     <li><a href="<?php echo $base_url; ?>/marketplace?subcat=25">Running</a></li>
     <li><a href="<?php echo $base_url; ?>/marketplace?subcat=26">Yoga</a></li>
     <li><a href="<?php echo $base_url; ?>/marketplace?subcat=27">Camping</a></li>
     <li><a href="<?php echo $base_url; ?>/marketplace?subcat=28">Art</a></li>
     <li><a href="<?php echo $base_url; ?>/marketplace?subcat=29">Photography</a></li>
     <li><a href="<?php echo $base_url; ?>/marketplace?subcat=30">Travel</a></li>
     <li><a href="<?php echo $base_url; ?>/marketplace?subcat=31">Cars</a></li>
     <li><a href="<?php echo $base_url; ?>/marketplace?subcat=32">Motorcycle</a></li>
     <li><a href="<?php echo $base_url; ?>/marketplace?subcat=33">Fishing</a></li>
     <li><a href="<?php echo $base_url; ?>/marketplace?subcat=34">Other</a></li>

    </ul>
  </li>


 <li class="dropdown-submenu">
    <a tabindex="-1" href="<?php echo $base_url; ?>/marketplace?cat=6">Sports</a>
    <ul class="dropdown-menu">

     <li><a href="<?php echo $base_url; ?>/marketplace?subcat=35">Football</a></li>
     <li><a href="<?php echo $base_url; ?>/marketplace?subcat=36">Rugby</a></li>
     <li><a href="<?php echo $base_url; ?>/marketplace?subcat=37">Basketball</a></li>
     <li><a href="<?php echo $base_url; ?>/marketplace?subcat=38">Tennis</a></li>
     <li><a href="<?php echo $base_url; ?>/marketplace?subcat=39">Table Tennis</a></li>
     <li><a href="<?php echo $base_url; ?>/marketplace?subcat=40">Badminton</a></li>
     <li><a href="<?php echo $base_url; ?>/marketplace?subcat=41">Volleyball</a></li>
     <li><a href="<?php echo $base_url; ?>/marketplace?subcat=42">Hockey</a></li>
     <li><a href="<?php echo $base_url; ?>/marketplace?subcat=43">Other</a></li>

    </ul>
  </li>


 <li class="dropdown-submenu">
    <a tabindex="-1" href="<?php echo $base_url; ?>/marketplace?cat=7">Animals</a>
    <ul class="dropdown-menu">

     <li><a href="<?php echo $base_url; ?>/marketplace?subcat=44">Dog</a></li>
     <li><a href="<?php echo $base_url; ?>/marketplace?subcat=45">Cat</a></li>
     <li><a href="<?php echo $base_url; ?>/marketplace?subcat=46">Horse</a></li>
     <li><a href="<?php echo $base_url; ?>/marketplace?subcat=47">Pets</a></li>
     <li><a href="<?php echo $base_url; ?>/marketplace?subcat=48">Other</a></li>

    </ul>
  </li>


 <li class="dropdown-submenu">
    <a tabindex="-1" href="<?php echo $base_url; ?>/marketplace?cat=8">Events</a>
    <ul class="dropdown-menu">

     <li><a href="<?php echo $base_url; ?>/marketplace?subcat=49">Father's Day</a></li>
     <li><a href="<?php echo $base_url; ?>/marketplace?subcat=50">Mother's Day</a></li>
     <li><a href="<?php echo $base_url; ?>/marketplace?subcat=51">Halloween</a></li>
     <li><a href="<?php echo $base_url; ?>/marketplace?subcat=52">Christmas</a></li>
     <li><a href="<?php echo $base_url; ?>/marketplace?subcat=53">Valentine's Day</a></li>
     <li><a href="<?php echo $base_url; ?>/marketplace?subcat=54">New Year</a></li>
     <li><a href="<?php echo $base_url; ?>/marketplace?subcat=55">Other</a></li>

    </ul>
  </li>


 <li class="dropdown-submenu">
    <a tabindex="-1" href="<?php echo $base_url; ?>/marketplace?cat=9">Jobs</a>
    <ul class="dropdown-menu">

     <li><a href="<?php echo $base_url; ?>/marketplace?subcat=56">Farmer</a></li>
     <li><a href="<?php echo $base_url; ?>/marketplace?subcat=57">Fisherman</a></li>
     <li><a href="<?php echo $base_url; ?>/marketplace?subcat=58">Engineer</a></li>
     <li><a href="<?php echo $base_url; ?>/marketplace?subcat=59">Military</a></li>
     <li><a href="<?php echo $base_url; ?>/marketplace?subcat=60">Legal</a></li>
     <li><a href="<?php echo $base_url; ?>/marketplace?subcat=61">High School</a></li>
     <li><a href="<?php echo $base_url; ?>/marketplace?subcat=62">Hospital</a></li>
     <li><a href="<?php echo $base_url; ?>/marketplace?subcat=63">Industrial</a></li>
     <li><a href="<?php echo $base_url; ?>/marketplace?subcat=64">Services</a></li>
     <li><a href="<?php echo $base_url; ?>/marketplace?subcat=65">Science</a></li>
     <li><a href="<?php echo $base_url; ?>/marketplace?subcat=66">Education</a></li>
     <li><a href="<?php echo $base_url; ?>/marketplace?subcat=67">Transportation</a></li>
     <li><a href="<?php echo $base_url; ?>/marketplace?subcat=68">Business</a></li>
     <li><a href="<?php echo $base_url; ?>/marketplace?subcat=69">Other</a></li>


    </ul>
  </li>


 <li class="dropdown-submenu">
    <a tabindex="-1" href="<?php echo $base_url; ?>/marketplace?cat=10">Entertainment</a>
    <ul class="dropdown-menu">

     <li><a href="<?php echo $base_url; ?>/marketplace?subcat=70">Music</a></li>
     <li><a href="<?php echo $base_url; ?>/marketplace?subcat=71">Movie</a></li>
     <li><a href="<?php echo $base_url; ?>/marketplace?subcat=72">Journalism</a></li>
     <li><a href="<?php echo $base_url; ?>/marketplace?subcat=73">Books</a></li>
     <li><a href="<?php echo $base_url; ?>/marketplace?subcat=74">Science Fiction</a></li>
     <li><a href="<?php echo $base_url; ?>/marketplace?subcat=75">Podcast</a></li>
     <li><a href="<?php echo $base_url; ?>/marketplace?subcat=76">Radio</a></li>
     <li><a href="<?php echo $base_url; ?>/marketplace?subcat=77">TV</a></li>
     <li><a href="<?php echo $base_url; ?>/marketplace?subcat=78">Video Games</a></li>
     <li><a href="<?php echo $base_url; ?>/marketplace?subcat=79">Alcool</a></li>
     <li><a href="<?php echo $base_url; ?>/marketplace?subcat=80">Other</a></li>

    </ul>
  </li>


 <li class="dropdown-submenu">
    <a tabindex="-1" href="<?php echo $base_url; ?>/marketplace?cat=11">Other</a>
    <ul class="dropdown-menu">

     <li><a href="<?php echo $base_url; ?>/marketplace?subcat=81">Other</a></li>

    </ul>
  </li>


						
					</ul>
				</li>




			</ul>



	<form class="navbar-form navbar-left" role="search" action="<?php echo $base_url;?>/marketplace">
				<div class="form-group">
					<input type="text" class="form-control" name="search" placeholder="Search by Keywords">
				</div>
				<button type="submit" class="btn btn-info">Search</button>
			</form>



			<?php if(!isset($_SESSION['user_id'])){ ?>

		

			<ul class="nav navbar-nav navbar-right">
				<li><a href="<?php echo $base_url;?>/campaigns">Make a Product</a></li>
				<li><a href="<?php echo $base_url;?>/login">Login</a></li>
				<li><a href="<?php echo $base_url;?>/cart"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Cart</a></li>
				
			</ul>
		</div><!-- /.navbar-collapse -->
<?php } ?>




<?php if(isset($_SESSION['user_id'])){ ?>
<div class="collapse navbar-collapse navbar-ex1-collapse">
			

		
			
			<ul class="nav navbar-nav navbar-right">
				<li><a href="<?php echo $base_url;?>/campaigns">Make a Product</a></li>
				<li><a href="<?php echo $base_url;?>/cart"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Cart</a></li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
					<?php if(isset($_SESSION['email'])){echo $_SESSION['email'];} ?> 
					<b class="caret"></b></a>
					<ul class="dropdown-menu">

					<li><a href="<?php echo $base_url;?>/user/campaigns">Campaigns</a></li>
					<li><a href="<?php echo $base_url;?>/user/stores">Stores</a></li>
					<li><a href="<?php echo $base_url;?>/user/orders">Orders</a></li>
					<li><a href="<?php echo $base_url;?>/user/message">Message</a></li>
					<li><a href="<?php echo $base_url;?>/user/promotion">Promotion</a></li>
					<li><a href="<?php echo $base_url;?>/user/setting">Setting</a></li>

				    <li><a href="<?php echo $base_url;?>/user/logout">Logout</a></li>
						
					</ul>
				</li>
			</ul>

		</div><!-- /.navbar-collapse -->
<?php } ?>





	</div>
</nav>


<div class="loader"></div>

