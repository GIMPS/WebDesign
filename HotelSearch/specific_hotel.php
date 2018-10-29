<!DOCTYPE html>
<html lang="en">
<head>
	<title>Hotel Search Portal</title>
	<meta charset="utf-8">
	<meta name="author" content="pixelhint.com">
	<!-- <meta name="description" content="La casa free real state fully responsive html5/css3 home page website template"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0" /> -->

	<link rel="stylesheet" type="text/css" href="css/reset.css">
	<link rel="stylesheet" type="text/css" href="css/responsive.css">

	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/main.js"></script>
  <style>
	#leftcolumn { float: left;
		          width: 200px;
							padding-top: 50px;
							padding-bottom: 60px;
	}
	#rightcolumn { margin-left: 200px;
		padding-top: 50px;
		padding-bottom: 60px;
	}

	/*  Hero Section  */

	.newhero{
	    width: 100%;
	    height: 100px;
	    position: relative;
			background-color: #95badf;
	    /* background: url('../img/hotel_background.jpg'); */
	    /* background-size: cover;
	    -webkit-background-size: cover;
	    -moz-background-size: cover;
	    -o-background-size: cover; */
	}

	.newhero .caption{
	    width: 100%;
	    position: absolute;
	    text-align: center;
	    top: 50%;
	    margin-top: -105px;
	}

	.newhero .caption h2{
	    color: #fff;
	    font-family: "P22 Corinthia";
	    font-size: 100px;
	    font-weight: lighter;
	    margin: 0;
	    position: relative;
	    display: block;
	}

	.newhero .caption h3{
	    color: #fff;
	    font-family: "lato-regular", Helvetica, Arial, sans-serif;
	    font-size: 14px;
	    margin: -15px 0 0 25px;
	    left: 1px;
	}



	.review{
	    /* width: 100%; */
	    /* height: 100px; */
	    /* background: #bfd9f2; */
	    /* position: relative; */
	}

	.review #review{
	    /* display: block; */
	    width: 800px;
	    height: 100px;
	    /* float: left; */
	    border: 10;
	    /* outline: none; */
	    /* margin: 10px; */
	    padding: 10px;
	    /* background: #bfd9f2; */
	    /* color: #ffffff; */
	    font-family: "lato-regular", Helvetica, Arial, sans-serif;
	    font-size: 15px;
	    /* text-transform: uppercase; */
	    letter-spacing: 1px;
	    /* line-height: 22px; */
	}

/*
	*{
    margin: 0;
    padding: 0;
	} */
	.rate {
			display: inline-block;
			vertical-align: top;
	    height: 46px;
	    padding: 10px 0px 20px 0px;
	}
	.rate:not(:checked) > input {
	    position:absolute;
	    top:-9999px;
	}
	.rate:not(:checked) > label {
	    float:right;
	    width:1em;
	    overflow:hidden;
	    white-space:nowrap;
	    cursor:pointer;
	    font-size:30px;
	    color:#ccc;
	}
	.rate:not(:checked) > label:before {
	    content: '★ ';
	}
	.rate > input:checked ~ label {
	    color: #ff5a60;
	}
	.rate:not(:checked) > label:hover,
	.rate:not(:checked) > label:hover ~ label {
	    color: #ff5a60;
	}
	.rate > input:checked + label:hover,
	.rate > input:checked + label:hover ~ label,
	.rate > input:checked ~ label:hover,
	.rate > input:checked ~ label:hover ~ label,
	.rate > label:hover ~ input:checked ~ label {
	    color: #ff5a60;
	}


	.button {
		display:block;
		background-color: #ff5a60;
    border: none;
    color: white;
    padding: 10px 20px;
    text-align: center;
    text-decoration: none;
    font-size: 16px;
		font-weight: 700;
	}

	img.rate_hotel{
	    width: 80%;
	    height: auto!important;
	    vertical-align: top;
	}

  </style>
<?php
// if(isset($_SESSION['success_register']))
// {
// 	  $email = $_SESSION['email_reg'];
// 	  $query = 'select * from users '
// 	           ."where email='$email' ";
// 	// echo "<br>" .$query. "<br>";
// 	  $result = $dbcnx->query($query);
// 	  if ($result->num_rows >0 )
// 	  {
// 	    // if they are in the database register the user id
// 			$user =  $result->fetch_assoc();
// 	    $_SESSION['valid_user'] = $user['username'];
// 	  }
// 	  $dbcnx->close();
// }

@ $db = new mysqli('localhost' , 'root', '', 'user_management');
  if (mysqli_connect_errno()) {
     echo "Error: Could not connect to database.  Please try again later.";
     exit;
  }

  $result = mysqli_query($db,"select location, hotelname,pic_link from hotel_search");
  $num_results = $result->num_rows;
//   echo "<p>Number of products found " . $num_results;


//   print_r( $product);

while ($row = $result->fetch_assoc()) {
    $location[] = $row['location'];
	$hotelname[] = $row['hotelname'];
	$pic_link[] = $row['pic_link'];
}
  if ($result) {
      echo  " prices are updated";
  } else {
  	  echo "An error has occurred.  The item was not added.";
  }

$search = $_GET['hotel_name'];
echo $search;





?>
</head>
<body>


	<section class="newhero">
		<header>
			<div class="wrapper">
				<a href="#"><img src="img/letter-s.png" height="50px" width="50px" class="logo" alt="" title=""/></a>
				<nav>
					<ul>
						<li><a href="index.php">Home</a></li>
						<li><a href="#">Rate</a></li>
						<li><a href="#">Contact Us</a></li>
						<li><a href="#">Login</a></li>
						<li><a href="#">Sign Up</a></li>
					</ul>
				</nav>
			</div>
		</header><!--  end header section  -->
	</section><!--  end hero section  -->

	  <?php  $result = mysqli_query($db,"SELECT pic_link, hotelname FROM hotel_search WHERE hotelname  LIKE '%$search%'");
			 $num_results = $result->num_rows;
			//  for ($i=0; $i <$num_results; $i++) {
			// 	$row = $result->fetch_assoc();
			while ($row = $result->fetch_assoc()) {
	         ?>
   <div class="wrapper">
			<!-- left column shows user's recent stay -->
	  <div id="leftcolumn">
			<h2>Selected Destination</h2>
			<a href="#">
				<img src="<?php echo "img/".$row['pic_link'];  ?> " alt="" title="" class="rate_hotel"/>
			</a>
            <h3><?php echo $row['hotelname'];  ?></h3>
            <?php } ?>
			<!-- <h3> 01-Jul-2020 </br>to </br>08-Jul-2020</h3> -->
		</div>
        <!-- right column is comment section -->
        <?php  $result = mysqli_query($db,"SELECT detail, hotelname FROM hotel_search WHERE hotelname  LIKE '%$search%'");
			 $num_results = $result->num_rows;
			//  for ($i=0; $i <$num_results; $i++) {
			// 	$row = $result->fetch_assoc();
			while ($row = $result->fetch_assoc()) {
	         ?>
         <div id="rightcolumn">
			<section class="review">
				<h2>Details</h2>
                <p><?php echo $row['detail'] ; } ?>
                <!-- <textarea name="review" id="review" cols="40" rows="5" placeholder="What are you looking for?" autocomplete="off"></textarea> -->
				<h2>How was your stay?</h2>
				<h4>Overall rating</h4>
				<div class="rate">
			    <input type="radio" id="1star5" name="rate1" value="5" />
			    <label for="1star5" title="text">5 stars</label>
			    <input type="radio" id="1star4" name="rate1" value="4" />
			    <label for="1star4" title="text">4 stars</label>
			    <input type="radio" id="1star3" name="rate1" value="3" />
			    <label for="1star3" title="text">3 stars</label>
			    <input type="radio" id="1star2" name="rate1" value="2" />
			    <label for="1star2" title="text">2 stars</label>
			    <input type="radio" id="1star1" name="rate1" value="1" />
			    <label for="1star1" title="text">1 star</label>
			  </div>



				<h2>Accuracy</h2>
				<div class="rate">
			    <input type="radio" id="2star5" name="rate2" value="5" />
			    <label for="2star5" title="text">5 stars</label>
			    <input type="radio" id="2star4" name="rate2" value="4" />
			    <label for="2star4" title="text">4 stars</label>
			    <input type="radio" id="2star3" name="rate2" value="3" />
			    <label for="2star3" title="text">3 stars</label>
			    <input type="radio" id="2star2" name="rate2" value="2" />
			    <label for="2star2" title="text">2 stars</label>
			    <input type="radio" id="2star1" name="rate2" value="1" />
			    <label for="2star1" title="text">1 star</label>
			  </div>



				<h2>Cleanliness</h2>
				<div class="rate">
			    <input type="radio" id="3star5" name="rate3" value="5" />
			    <label for="3star5" title="text">5 stars</label>
			    <input type="radio" id="3star4" name="rate3" value="4" />
			    <label for="3star4" title="text">4 stars</label>
			    <input type="radio" id="3star3" name="rate3" value="3" />
			    <label for="3star3" title="text">3 stars</label>
			    <input type="radio" id="3star2" name="rate3" value="2" />
			    <label for="3star2" title="text">2 stars</label>
			    <input type="radio" id="3star1" name="rate3" value="1" />
			    <label for="3star1" title="text">1 star</label>
			  </div>


			</section>
			<input type="submit" value="Submit" class="button"></input>
		</div>
	</div>

	<footer>
		<div class="wrapper footer">
			<ul>
				<li class="links">
					<ul>
						<li><a href="#">About</a></li>
						<li><a href="#">Support</a></li>
						<li><a href="#">Terms</a></li>
						<li><a href="#">Policy</a></li>
						<li><a href="#">Contact</a></li>
					</ul>
				</li>

				<li class="links">
					<ul>
						<li><a href="#">Appartements</a></li>
						<li><a href="#">Houses</a></li>
						<li><a href="#">Villas</a></li>
						<li><a href="#">Mansions</a></li>
						<li><a href="#">...</a></li>
					</ul>
				</li>

				<li class="links">
					<ul>
						<li><a href="#">New York</a></li>
						<li><a href="#">Los Anglos</a></li>
						<li><a href="#">Miami</a></li>
						<li><a href="#">Washington</a></li>
						<li><a href="#">...</a></li>
					</ul>
				</li>

				<li class="about">
					<p>La Casa is real estate minimal html5 website template, designed and coded by pixelhint, tellus varius, dictum erat vel, maximus tellus. Sed vitae auctor ipsum</p>
					<ul>
						<li><a href="http://facebook.com/pixelhint" class="facebook" target="_blank"></a></li>
						<li><a href="http://twitter.com/pixelhint" class="twitter" target="_blank"></a></li>
						<li><a href="http://plus.google.com/+Pixelhint" class="google" target="_blank"></a></li>
						<li><a href="#" class="skype"></a></li>
					</ul>
				</li>
			</ul>
		</div>

		<div class="copyrights wrapper">
			Copyright © 2015 <a href="http://pixelhint.com" target="_blank" class="ph_link" title="Download more free Templates">Pixelhint.com</a>. All Rights Reserved.
		</div>
	</footer><!--  end footer  -->

</body>
</html>