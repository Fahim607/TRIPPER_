<!DOCTYPE html>
<html>
<head>
	<title>Welcome|Tripper</title>
	<!-- Bootstrap 5 CSS -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <!-- Boxicons CSS -->
    <link rel="stylesheet" type="text/css" href="css/boxicons.min.css">
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

	$hotel_id = $_GET['hotel_id'];
	$transport_id = $_GET['transport_id'];
	$location = $conn->real_escape_string($_GET['hotel_location']);
	$guest_no = $_GET['guest_no'];
	$hotel_query = "SELECT * FROM hotel_rooms WHERE room_id = $hotel_id";

	$transport_query = "SELECT * FROM transport_info WHERE transport_id = $transport_id";

	$activities_query = "SELECT * FROM activities WHERE location = '$location'";
	$hotel_result = mysqli_query($conn, $hotel_query);
	$transport_result = mysqli_query($conn, $transport_query);
	$activities_result = mysqli_query($conn, $activities_query);

?>
<form action="checkout2.php" method="post" id="dataForm2">
<div class="container">
	<h3 style="margin-top: 3rem;">Pakcge Breakdown & Details</h3>
	<div class="pack-det-screen">
		<div class="pack-main">
			<h4 class="title-center">Location: <?php echo $location; ?></h4>
			<div class="loc-img">
				<img src="img/saint.jpg" style="width: 100%;object-fit: cover;height: 100%;border-radius: 15px;">
			</div>
			<div class="loc-det">
				<p>Cox's Bazar, located in southeastern Bangladesh, is renowned for having the world's longest natural sea beach, stretching over 120 kilometers along the Bay of Bengal. This picturesque coastal town offers visitors a serene escape with its stunning sandy shores, gentle waves, and lush green hills in the backdrop. The town is not only a beach lover's paradise but also offers cultural and natural attractions, including the Himchari National Park and Inani Beach. Visitors can also explore the vibrant fishing port, taste fresh seafood, and immerse themselves in the local culture at nearby villages. For adventure enthusiasts, there are options for water sports such as surfing and jet skiing, making Cox's Bazar a versatile destination catering to various interests.</p>

				<h4 class="title-center" style="margin-bottom: 2rem;"> Hotel Details:</h4>
				<?php
					if ($hotel_result) {
    				$hotel_data = mysqli_fetch_assoc($hotel_result);
				?>
				<div class="hotel-in">
					<div class="hotel-det-img" >
						<img src="img/hotels/<?php echo $hotel_data['img1'];?>" style="width: 100%;height: 100%;object-fit: cover; border-radius: 15px;">
					</div>

					<div class="hotel-det" >
						<h5><?php echo $hotel_data['hotel_name'];?></h5>
						<h6 style="color: #6f6f6f;"><?php echo $location;?><h6>
						<div class="hotel-features">
							<span class="roun"><i class='bx bxs-hot' ></i> &nbsp; <?php echo $hotel_data['amenities_1'];?></span>
							<span class="roun"><i class='bx bx-user' ></i> &nbsp; <?php echo $hotel_data['room_capacity'];?> Guests</span>
							<span class="roun"><i class='bx bx-hotel' ></i> &nbsp; <?php echo $hotel_data['room_bed'];?> Bedroom</span>
							<span class="roun"><i class='bx bx-bowl-hot' ></i> &nbsp; <?php echo $hotel_data['amenities_2'];?></span>
						</div>
						
						
						<p>Price: <span class="hotel_pack_price"><?php echo $hotel_data['room_price'];?>BDT</span></p>
						<p>Max Guest: <span><?php echo $hotel_data['room_capacity'];?> Person</span></p>
						<p style="display: flex;justify-content: space-between;align-items: center;">Check-In Date: <input type="date" name="pack-check"
							min="<?php echo date("Y-m-d"); ?>" required style="border: none;border-bottom: 1px solid orange;outline: none;width: 150px;"> </p>
						<p style="display: flex;justify-content: space-between;align-items: center;">Check-out Date: <input type="date" name="pack-out"
							min="<?php echo date("Y-m-d"); ?>" required style="border: none;border-bottom: 1px solid orange;outline: none;width: 150px;"></p>
					</div>
				</div>
			<?php } ?>

				<?php if ($transport_result) {
    			$transport_data = mysqli_fetch_assoc($transport_result); 
    									if ($transport_data['type'] === "Bus") {
										    $imageSrc = "img/bus.jpg";
										} elseif ($transport_data['type'] === "Airplane") {
										    $imageSrc = "https://cdn.vectorstock.com/i/preview-1x/61/97/plane-flat-web-icon-vector-4246197.jpg";
										} elseif ($transport_data['type'] === "Train") {
										    $imageSrc = "img/train.jpg";
										}else{
											$imageSrc = "img/bus.jpg";
										}
    			?>

				<h4 class="title-center" style="margin: 2rem 0;"> Transportation & Journey Details:</h4>
				<div class="hotel-in" style="justify-content: flex-start; align-items: flex-start;">
					<div class="hotel-det-img" >
						<img src="<?php echo $imageSrc; ?>" style="width: 100%;height: 100%;object-fit: cover; border-radius: 15px;">
					</div>
					<div class="hotel-det" style="margin-left: 50px; width: 58%;">
						<h5>Vehicle No: <?php echo $transport_data['vehicle_no']; ?></h5>
						<h6 style="color: #6f6f6f; margin-bottom: 1.5rem;">Selected Method: By <?php echo $transport_data['type']; ?><h6>
						<p>Deperature Time & Place:  <?php echo $transport_data['deperture']; ?><span><?php echo $transport_data['depo']; ?></span></p>
						<p>Arrival Time & Location: <?php echo $transport_data['arrival']; ?><span><?php echo $transport_data['destination']; ?></span></p>
						<p style="display: flex;justify-content: space-between;align-items: center;">Ticket price (Individual): <span class="tra-price"><?php echo $transport_data['ticket_price']; ?></span>BDT<span>Total Person:<span class="tra-guest"><?php echo $guest_no; ?></span></span></p>
						<p style="display: flex;justify-content: space-between;align-items: center;">Journey Date: <input type="date" name="pack-check2"
							min="<?php echo date("Y-m-d"); ?>" required style="border: none;border-bottom: 1px solid orange;outline: none;width: 150px;"> </p>
						<p style="display: flex;justify-content: space-between;align-items: center;">Return Date: <input type="date" name="pack-out2"
							min="<?php echo date("Y-m-d"); ?>" required style="border: none;border-bottom: 1px solid orange;outline: none;width: 150px;"></p>
					</div>
				</div>
			<?php } ?>

				<h4 class="title-center" style="margin: 2rem 0;"> All The activities & Events You will Get:</h4>
				<div class="activity-list">
				    <?php if ($activities_result) {
				        while ($row = mysqli_fetch_assoc($activities_result)) {
				    ?>
				    <div class="act-card" style="flex-basis: calc(30% - 10px);">
				        <div class="act-img"><img src="img/activities/<?php echo $row['img']; ?>" alt="..."></div>
				        <div class="act-card-body">
				            <h5 class="act-card-title"><?php echo $row['activity_name']; ?></h5>
				            <p class="act-card-text"><?php echo $row['activity_description']; ?></p>
				            <div class="amen">
				                <div class="te">Ticket/Entry: <span class="act_price"><?php echo $row['activity_price']; ?></span>৳</div>
				                <!-- Close button -->
				                <button class="close-button" data-activity-id="<?php echo $row['activity_id']; ?>">Close</button>
				            </div>
				        </div>
				    </div>
				    <?php }
				    } else {
				        echo "<h4>No activities found in this location.</h4>";
				    } ?>
				</div>

			</div>
		</div>
		<div class="pack-right">
			<h5 class="title-center" style="margin-bottom: 2rem;">Price-Breakdown:</h5>
			<p>Accomodation Cost: <span class="Accomodation_cost"></span></p>
			<p>Transportation Cost:<span class="trans_cost"></span></p>
			<p>Activity Cost: <span class="act_total_cost"></span></p>
			<hr>
			<p>Total: <span class="pack_total_price">5000৳</span></p>
			<p>VAT (15%): <span class="vat_price">750৳</span></p>
			<p>Total Amount Included VAT: <span class="included_vat">5750৳</span></p>
			
				<input type="hidden" name="hotelName" value="<?php echo $hotel_data['hotel_name'];?>">
				<input type="hidden" name="hotelPrice" value="<?php echo $hotel_data['room_price'];?>">
				<input type="hidden" name="hotelGuest" value="<?php echo $guest_no;?>">
				<input type="hidden" name="veNameInput" value="<?php echo $transport_data['vehicle_no'];?>">
				<input type="hidden" name="total_ams" id="total_ams">
				<button class="btn btn-dark mt-4 w-100" id="checkouts">Checkout</button>

		</div>
	</div>
</div>
</form>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="js/script.js"></script>
<script >
	

	document.addEventListener("click", function (event) {
        if (event.target.classList.contains("close-button")) {
            var activityId = event.target.getAttribute("data-activity-id");
            var actCard = event.target.closest(".act-card");
            if (actCard) {
                actCard.remove();
                
            }
        }
    });

    var total = 0;
    var vat = 0;

function updateTotalPrice() {
    var actPrices = document.querySelectorAll(".act_price");

    var activityTotal = 0;
    actPrices.forEach(function (actPriceElement) {
        activityTotal += parseFloat(actPriceElement.textContent);
    });

    var accommodationCost = parseFloat(document.querySelector('.Accomodation_cost').textContent);
    var transCost = parseFloat(document.querySelector('.trans_cost').textContent);
    total = activityTotal + transCost + accommodationCost;

    var actTotalCostElement = document.querySelector(".act_total_cost");
    actTotalCostElement.textContent = activityTotal.toFixed(2) + "৳";

    var totalCostElement = document.querySelector(".pack_total_price");
    var vatPriceElement = document.querySelector(".vat_price");
    var includedVatElement = document.querySelector(".included_vat");

    totalCostElement.textContent = total.toFixed(2) + "৳";

    vat = total * 0.15;
    vatPriceElement.textContent = vat.toFixed(2) + "৳";
    includedVatElement.textContent = (total + vat).toFixed(2) + "৳";
}
updateTotalPrice();


document.addEventListener("DOMContentLoaded", function () {
    // Event listeners for date inputs and other inputs that affect the cost
    var checkOutDateInput = document.querySelector('input[name="pack-out"]');
    checkOutDateInput.addEventListener('change', calculateAccommodationCost);

    var returnDateInput = document.querySelector('input[name="pack-out2"]');
    returnDateInput.addEventListener('change', calculateTransportationCost);

    // ... (Other event listeners as needed)

function calculateAccommodationCost() {
    var checkInDateInput = document.querySelector('input[name="pack-check"]');
    var checkOutDateInput = document.querySelector('input[name="pack-out"]');
    var roomPrice = parseFloat(document.querySelector('.hotel_pack_price').textContent);
    var checkInDate = new Date(checkInDateInput.value);
    var checkOutDate = new Date(checkOutDateInput.value);

    var timeDifference = checkOutDate - checkInDate;
    var numberOfDays = Math.ceil(timeDifference / (1000 * 3600 * 24));

    var accommodationCost = roomPrice * numberOfDays;

    var accommodationCostElement = document.querySelector('.Accomodation_cost');
    accommodationCostElement.textContent = accommodationCost + '৳';

    updateTotalPrice();
}

function calculateTransportationCost() {
    var ticketPrice = parseFloat(document.querySelector('.tra-price').textContent);
    var guest_no = parseFloat(document.querySelector('.tra-guest').textContent);

    var transCost = ticketPrice * (guest_no * 2);

    var transCostElement = document.querySelector('.trans_cost');
    transCostElement.textContent = transCost + '৳';

    updateTotalPrice(); 
}

     function removeActCard(event) {
        var actCard = event.target.closest(".act-card");
        if (actCard) {
            var actPriceElement = actCard.querySelector(".act_price");
            actCard.remove();

            // Subtract the removed activity cost from the total
            total -= parseFloat(actPriceElement.textContent);

            // Update the total price
            updateTotalPrice();
        }
    }

    document.addEventListener("click", function (event) {
        if (event.target.classList.contains("close-button")) {
            removeActCard(event);
        }
    });
});

document.getElementById('checkouts').addEventListener('click', function() {
    var includedVatText = document.querySelector('.included_vat').textContent;
    var includedVatValue = includedVatText.replace(/[^\d.]/g, '');
    includedVatValue = parseFloat(includedVatValue);
    console.log(includedVatValue);
    document.getElementById('total_ams').value = includedVatValue;
    
});




</script>
<?php include('footer.php'); ?>