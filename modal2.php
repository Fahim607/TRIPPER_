<?php
include 'db.php';

$userid = $_POST['userid'];
$sql = "SELECT * FROM hotel_rooms WHERE room_id = '$userid'";
$result = mysqli_query($conn,$sql);

while( $row = mysqli_fetch_array($result) ){
	$name= $row['hotel_name'];
?>
								<div class="modal-img">
						        	<div class="big-img">
						        		<img src="img/hotels/<?php echo $row['img1']; ?>">
						        	</div>
						        	<div class="small-img">
						        		<div class="up-img"><img src="img/up.jpg"></div>
						        		<div class="down-img">
						        			<div class="left-img"><img src="img/left.jpg"></div>
						        			<div class="right-img"><img src="img/right.jpg"></div>
						        		</div>
						        	</div>
						        </div>
						        <div class="more-info">
						        	<div class="left-info">
						        		<h1 style="color: black; font-size: 2rem;"><?php echo $row['hotel_name']; ?></h1>
						        		<?php $sql2 = "SELECT * FROM hotel_info WHERE hotel_name = '$name'";
											$result2 = mysqli_query($conn,$sql2);
											$row2 = mysqli_fetch_array($result2)?>
						        		<p><i class='bx bx-location-plus'></i> Location: <?php echo $row2['location']; ?></p>

						        		<div class="hotel-features">
						        			<span class="roun"><i class='bx bxs-hot' ></i> &nbsp; <?php echo $row['amenities_1']; ?></span>
						        			<span class="roun"><i class='bx bx-user' ></i> &nbsp;<?php echo $row['room_capacity']; ?> Guests</span>
						        			<span class="roun"><i class='bx bx-hotel' ></i> &nbsp; <?php echo $row['room_bed']; ?> Bedroom</span>
						        			<span class="roun"><i class='bx bx-bowl-hot' ></i> &nbsp; <?php echo $row['amenities_2']; ?></span>
						        		</div>

						        		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						        		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						        		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br><br>
						        		consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
						        		cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
						        		proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
						        	</div>
						        	<div class="right-info">
						        		<div class="price">
						        			<p style="font-size: 1.5rem; font-weight: 500; margin-bottom: 0px;">৳<?php echo $row['room_price']; ?><span style="font-size: 14px;">/night</span></p>
						        			<p style="margin-bottom: 0px;"><i class='bx bx-star' ></i>&nbsp;<?php echo $row['rating']; ?></p>
						        		</div>
						        		<div class="info-box">
						        			<table class="rounded-table">
											  <tr>
											    <td><b>CHECK-IN</b><br> 2-10-2023</td>
											    <td><b>CHECKOUT</b><br> 5-10-2023</td>
											  </tr>
											  <tr>
											    <td colspan="2"><b>Total Guests</b><br> <?php echo $row['room_capacity']; ?> Persons</td>
											  </tr>
											</table>
										</div>
										<button data-bs-dismiss="modal" class="btn btn-dark w-100 select-hotel-btn" style="border-radius: 15px; background-color: black;"> Close</button>
						        	</div>
						        </div>
						        <script src="js/script.js"></script>
<?php } ?>


						