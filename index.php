<?php include('header.php'); ?>

<div class="container">
	
	<section class="hero-banner">
		<div class="banner-img">
		</div>
		<div class="floating-div">
			<div class="input-items">
				<div class="location input-item">
					<h3>Location</h3>
					<p><input type="text" required name="location" placeholder="Enter Your Destination" > <i class='bx bxs-plane-alt' ></i></p>
				</div>
				<div class="date input-item">
					<h3>Date</h3>
					<p><input type="text" placeholder="Select Prefered Date" onfocus="(this.type='date')"> <i class='bx bx-calendar' ></i></p>
				</div>
				<div class="guests input-item">
					<h3>Guests</h3>
					<p><input type="number" required name="guest" placeholder="Number of Guests " ><i class='bx bx-user-plus'></i></p>
				</div>
				<div class="budget input-item">
					<h3>Budget</h3>
					<p><input type="number" required name="budget" placeholder="Enter Your Budget" > <i class='bx bx-credit-card-front' ></i></p>
				</div>
			</div>
			<div class="search-btn">
				<i class='bx bx-search' ></i>
			</div>
    </div>
	</section>

	<div class="">
		<div class="social-collab">
			<div class="social-btns">
				<span>Follow</span>
				<div class="icons">
					<i class='bx bxl-facebook'></i>
					<i class='bx bxl-instagram' ></i>
					<i class='bx bxl-twitter' ></i>
				</div>
			</div>
			<div class="collabs">
				<img src="img/ex.png" alt="expedia">
				<img src="img/book.png" alt="booking.com">
				<img src="img/radison.png" alt="radison-hotel">
				<img src="img/gree.png" alt="greenline">
			</div>
		</div>
	</div>
</div>
<?php
include('db.php');

$sql = "SELECT location_name, location_img, budget FROM locations LIMIT 10";
$result = $conn->query($sql);

?>
<div class="container my-3 mt-5" id="featureContainer">
		<div class="row mx-auto my-auto justify-content-center">
			<div id="featureCarousel" class="carousel slide" data-bs-ride="carousel">
				<h2 class="float-start mt-5 mb-5" style="font-weight: bold;">Popular Destinations</h2>
				<div class="float-end mt-5 mb-5">
					<a class="indicator" href="#featureCarousel" role="button" data-bs-slide="prev">
						<i class='bx bx-left-arrow-alt'aria-hidden="true" style="color: black"></i></a> &nbsp;&nbsp;
					<a class="w-aut indicator" href="#featureCarousel" role="button" data-bs-slide="next">
						<i class='bx bx-right-arrow-alt'aria-hidden="true" style="color: black" ></i>
					</a>
				</div>
				<div class="carousel-inner" role="listbox">
					<?php
						if ($result->num_rows > 0) {
    					while ($row = $result->fetch_assoc()) {
					?>
					<div class="carousel-item active">
						<div class="col-md-3">
							<div class="card">
								<div class="card-img">
									<img src="<?php echo $row['location_img']; ?>" class="img-fluid">
								</div>
								<div class="card-info">
									<h1><?php echo $row['location_name']; ?></h1>
									<p>Cost- <?php echo $row['budget']; ?> <span><i class='bx bxs-star' style="color: #f9af32" ></i>4.7 </span></p>
								</div>
							</div>
						</div>
					</div>
					<?php 
				}
			}else{
				echo "no records found";
			}
			?>

				</div>
				
			</div>
		</div>
	</div>

	<div class="container">
		<section class="services">
			<div class="service-text">
				<h1>What services we provide</h1>
				<div class="service-item">
					<h3>01. Travel Plan</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua.</p>
				</div>
				<div class="service-item">
					<h3>02. Flight & Transportation Booking</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua.</p>
				</div>
				<div class="service-item">
					<h3>03. Hotel Booking</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut </p>
				</div>
				<div class="service-item">
					<h3>04. Resturant Reservation</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, </p>
				</div>
			</div>
			<div class="service-img">
				<video autoplay muted loop width="480" height="700">
			        <source src="img/video.mp4" type="video/mp4">
			        Your browser does not support the video tag.
			    </video>
			</div>
		</section>
	</div>

	<div class="container">
		<section class="visit">
			<h1>Plan & Travel With us</h1>
			<div class="visitor">
				<div class="slider">
					<img src="img/travel-models.jpg">
				</div>
				<div class="contents">
					<h3>Plan easy, Pay less & experience more</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat. Duis aute irure dolor in reprehenderit </p>
				</div>
			</div>
		</section>
	</div>





<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>

	<script>
		let myCarousel = document.querySelectorAll('#featureContainer .carousel .carousel-item');
myCarousel.forEach((el) => {
  const minPerSlide = 4
  let next = el.nextElementSibling
  for (var i=1; i<4; i++) {
    if (!next) {
      // wrap carousel by using first child
      next = myCarousel[0]
    }
    let cloneChild = next.cloneNode(true)
    el.appendChild(cloneChild.children[0])
    next = next.nextElementSibling
  }
})

</script>

<?php include('footer.php'); ?>

