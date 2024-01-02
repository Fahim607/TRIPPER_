<!DOCTYPE html>
<html>
<head>
	<title>Welcome|Tripper</title>
	<!-- Bootstrap 5 CSS -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <!-- Boxicons CSS -->
    <link rel="stylesheet" type="text/css" href="css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.1/mdb.min.css" rel="stylesheet"/>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<?php
	session_start();
	include('db.php');

	if (!isset($_SESSION['user_id'])) {
    	header("Location: login.php");
    	exit();
	}


	include('top-bar.php');
?>

	<div class="containers">
		<section class="dashboard-body">
		<div class="info-area">
			<div class="package-area">
				<h3 class="headinga">Best Package Generated for you</h3>
				<?php 
					if (!isset($_POST['search'])) {


    				?>
    				<div class="package-filler-section">
    					<div class="right">
    						<h4 style="color: black;">Can't decide about your plan? We are here to help!</h4>
    						<p style="font-size: 14px;">Our system is made to make your troubles go away. Just bye entering your destination and budget and dates you can automatically generate travel plans based on your preferences. There will be Three type of packages. Luxury Package, Value Package and Most Reviwed by user Package.</p>
    						<p style="margin-bottom: 0px !important; color: orange;">More than 10,000+ users are making their plans using it.</p>
    						<div class="avatar-container">
						        <div class="avatar">
						            <img src="https://www.gravatar.com/avatar/205e460b479e2e5b48aec07710c08d50" alt="User 1">
						        </div>
						        <div class="avatar">
						            <img src="https://www.gravatar.com/avatar/2c7d99fe281ecd3bcd65ab915bac6dd5" alt="User 2">
						        </div>
						        <div class="avatar">
						            <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8YXZhdGFyc3xlbnwwfHwwfHx8MA%3D%3D&auto=format&fit=crop&w=500&q=60" alt="User 3">
						        </div>
						        <div class="avatar">
						            <img src="https://images.unsplash.com/photo-1607746882042-944635dfe10e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1740&q=80" alt="User 4">
						        </div>
						    </div>
    					</div>
    					<div class="left">
    						<div class="image-container">
						        <div class="pack-img"><img class="image" src="img/bandarban.jpg" alt="Image 1"></div>
						        <div class="pack-img"><img class="image middle" src="img/sajek.jpg" alt="Image 2"></div>
						        <div class="pack-img"><img class="image" src="img/sundor.jpg" alt="Image 3"></div>
						    </div>
    					</div>
    				</div>



    				<?php
				}
				else{
					include('package.php');
				}

				 ?>
			</div>
			<div class="tab-area">
				<h3 class="headinga">Make your own plan</h3>
				<div class="tabs">
					<div class="tab-container">
						<div class="headers">
							<div class="tab-header">
								<div class="active">Hotels</div>
								<div>Transportation</div>
								<div>Activites</div>
							</div>
							<div class="filters">
								<i class='bx bx-slider'></i>
								<span><b>Filters</b></span>
							</div>
						</div>
						<div class="tab-indicator"></div>
					</div>
					<div class="modal fade penpen" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
						  <div class="modal-dialog modal-dialog-centered modal-xl">
						    <div class="modal-content kenken">
						      <div class="modal-header">
						        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						      </div>
						      <div class="modal-body p-5">
						        
						      </div>
						    </div>
						  </div>
						</div>
					<?php include('modals.php'); ?>
					
					<div class="tab-body">
						<div class="active">
							<h3 style="font-size: 18px; margin-bottom: 15px; color: black;">Avaliable Hotels in this area</h3>
							<div class="hotel-item-box">
							<?php
							if (!isset($_POST['search'])) {
			    				$temp67 = 'Bandarban';
									$date67= '10/10/2023';
									$sql67 = "SELECT hi.hotel_name, hi.location,hr.room_id, hr.room_price, hr.room_bed, hr.img1, hr.room_capacity, hr.review, hr.rating, hr.amenities_1, hr.amenities_2
								        FROM hotel_info AS hi
								        JOIN hotel_rooms AS hr ON hi.hotel_name = hr.hotel_name
								        WHERE hi.location = '$temp67'";
								$result67 = $conn->query($sql67);

								if ($result67->num_rows > 0) {
								    while ($row67 = $result67->fetch_assoc()) {
								    	$room_id2 = $row67['room_id'];
								        $hotelName2 = $row67['hotel_name'];
								        $location2 = $row67['location'];
								        $roomPrice2 = $row67['room_price'];
								        $roomBed2 = $row67['room_bed'];
								        $img12 = $row67['img1'];
								        $roomCapacity2 = $row67['room_capacity'];
								        $review2 = $row67['review'];
								        $rating2 = $row67['rating'];
								        $amenities12 = $row67['amenities_1'];
								        $amenities22 = $row67['amenities_2'];

										include('hotels2.php');
										}
									} else {
									    echo "No hotel records found.";
									}
							}
						else{ 
							$temp = $conn->real_escape_string($location);
							$date= $_POST['start-date'];
							$sql = "SELECT hi.hotel_name, hi.location,hr.room_id, hr.room_price, hr.room_bed, hr.img1, hr.room_capacity, hr.review, hr.rating, hr.amenities_1, hr.amenities_2
						        FROM hotel_info AS hi
						        JOIN hotel_rooms AS hr ON hi.hotel_name = hr.hotel_name
						        WHERE hi.location = '$temp'";
						$result = $conn->query($sql);

						if ($result->num_rows > 0) {
						    while ($row = $result->fetch_assoc()) {
						    	$room_id = $row['room_id'];
						        $hotelName = $row['hotel_name'];
						        $location = $row['location'];
						        $roomPrice = $row['room_price'];
						        $roomBed = $row['room_bed'];
						        $img1 = $row['img1'];
						        $roomCapacity = $row['room_capacity'];
						        $review = $row['review'];
						        $rating = $row['rating'];
						        $amenities1 = $row['amenities_1'];
						        $amenities2 = $row['amenities_2'];

								include('hotels.php');
								}
							} else {
							    echo "No hotel records found.";
							}
							} 
								?>
							</div>
						</div>
						<div>
							<h3 style="font-size: 18px; margin-bottom: 15px; color: black;">Avaliable transportation to this destination</h3>
							<table class="table align-middle mb-0 bg-white" style="height: 700px; overflow-y: auto;">
							  <thead class="bg-light">
							    <tr>
							      <th>Method</th>
							      <th>Deperture Time</th>
							      <th>Arrival Time</th>
							      <th>Date</th>
							      <th>Ticket Price</th>
							      <th>Vehicle No.</th>
							      <th>Actions</th>
							    </tr>
							  </thead>
							  <tbody>
							<?php 
							if (!isset($_POST['search'])) {
								
			    				?>
			    				<?php
							}
						else{ 
								$sql3 = "SELECT * FROM transport_info WHERE destination= '$temp' LIMIT 8";
								$result3 = $conn->query($sql3);
								if ($result3->num_rows > 0) {
							    	while ($row3 = $result3->fetch_assoc()) {
								    	$v_no = $row3['vehicle_no'];
								        $t_price = $row3['ticket_price'];
								        $t_depo = $row3['depo'];
								        $t_des = $row3['destination'];
								        $t_dep = $row3['deperture'];
								        $t_ari = $row3['arrival'];
								        $type = $row3['type'];
								        

								        if ($type === "Bus") {
										    $imageSrc = "img/bus.jpg";
										} elseif ($type === "Airplane") {
										    $imageSrc = "https://cdn.vectorstock.com/i/preview-1x/61/97/plane-flat-web-icon-vector-4246197.jpg";
										} elseif ($type === "Train") {
										    $imageSrc = "img/train.jpg";
										}else{
											$imageSrc = "img/sajek.jpg";
										}

									include('transportation.php');
									}
								} 
								else {
								    echo "No Transportation Avaliable.";
									}
								}  

								?>
						</tbody>
					</table>

						</div>
						<div>
							<h3 style="font-size: 18px; margin-bottom: 15px; color: black;">Avaliable activities in this area</h3>
							<div class="act-card-container">
								<?php
									if (!isset($_POST['search'])) {
			    				?>
				    				<?php
								}
										else{  
											$sql5 = "SELECT * FROM activities WHERE location= '$temp'";
											$result5 = $conn->query($sql5);

											if ($result5->num_rows > 0) {
							    				while ($row5 = $result5->fetch_assoc()) {
							    					$room_id = $row5['activity_id'];
							        				$ac_name = $row5['activity_name'];
							        				$ac_des = $row5['activity_description'];
							        				$ac_price = $row5['activity_price'];
							        				$img31 = $row5['img'];
							        
								 					include('activities.php'); 
												}
											}
											else{
												echo "error";
											}
										}
								 ?>
							</div>
							
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="profile-area">
			<h4 style="font-size: 18px;">Booking summary</h4>
			<div>
				<div id="selected-hotel-details"></div>
				<div id="selected-bus-details"></div>
				<div id="activity_list_container">
					<div id="selectedCardContainer" class="selectedCardContainera"></div>
				</div>
			</div>

			<div>
				<div  >Total Amount: ৳<span class="total-amounts" id="total-amount"></span></div>
				
			</div>

			<form id="dataForm" action="checkout.php" method="POST">

			  <input type="hidden" name="hotelName" id="hotelNameInput">
			  <input type="hidden" name="hotelPrice" id="hotelPriceInput">
			  <input type="hidden" name="hotelGuest" id="hotelGuestInput">
			  <input type="hidden" name="hotelcheckin" id="hotelcheckinInput" value="<?php echo $date; ?>">

			  <input type="hidden" name="veNameInput" id="veNameInput">
			  <input type="hidden" name="ve_date" id="ve_date">
			  <input type="hidden" name="v_price" id="v_price">
			  <input type="hidden" name="total_am" id="total_am">

			   <input type="hidden" name="cardData" id="cardDataInput">


			  <div style="width: 100%;display: flex;
    margin-top: 20px; justify-content: center;"><button class="btn btn-dark mx-auto" type="submit" id="sendDataButton" name="checkout">Proceed To Checkout</button></div>
			</form>
		</div>
	</section>
	</div>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
	<script src="js/bootstrap.bundle.min.js"></script>
	<script src="js/script.js"></script>

	<script>


    $(document).ready(function() {
    $("#destination").on("input", function() {
        var query = $(this).val();
        $.ajax({
            url: "process.php",
            method: "POST",
            data: { query: query },
            success: function(data) {
            	 console.log(data);
                if (query === "") {
                    $("#suggestion-box").hide();
                } else { 
	                $("#suggestion-box").html(data);
	                $("#suggestion-box").show(); 
	            }
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });

    $(document).on("click", function(e) {
        var container = $(".searchbar");
        if (!container.is(e.target) && container.has(e.target).length === 0) {
            $("#suggestion-box").hide();
        }
    });

     $("#suggestion-box").on("click", ".suggestion", function() {
        var suggestionText = $(this).text();
        $("#destination").val(suggestionText);
        $("#suggestion-box").hide();
    });

});

	$(document).ready(function(){
                $('.hotelinfomodal').click(function(){
                    var userid = $(this).data('id');
                    $.ajax({
                        url: 'modal2.php',
                        type: 'post',
                        data: {userid: userid},
                        success: function(response){ 
                            $('.penpen .kenken .modal-body').html(response); 
                            $('#exampleModal').modal('show'); 
                        }
                    });
                });
            });


  </script>




<?php include('footer.php'); ?>