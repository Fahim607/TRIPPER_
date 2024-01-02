
<?php 

$location= $_POST['destination'];
$date= $_POST['start-date'];
$guest= $_POST['guest_no'];

$sql_max_prices = "SELECT a.activity_name, a.activity_description, a.activity_price, a.location,
               h.room_id, h.hotel_name, h.room_price, h.room_bed, h.img1, h.room_capacity, h.review, h.rating, h.amenities_1, h.amenities_2,t.transport_id,
               t.vehicle_no, t.com_name, t.ticket_price, t.depo, t.destination, t.deperture, t.arrival, t.type
        FROM activities AS a
        INNER JOIN hotel_info AS hi ON a.location = hi.location
        INNER JOIN hotel_rooms AS h ON hi.hotel_name = h.hotel_name
        INNER JOIN transport_info AS t ON a.location = t.destination
        WHERE a.location = ? 
        AND h.room_capacity >= ? 
        AND h.room_price = (
            SELECT MAX(room_price)
            FROM hotel_rooms
            WHERE hotel_name = hi.hotel_name 
            AND room_capacity >= ? 
        )
        AND t.ticket_price = (
            SELECT MAX(ticket_price)
            FROM transport_info
            WHERE destination = ? 
        )
        LIMIT 1";

$sql_min_prices = "SELECT a.activity_name, a.activity_description, a.activity_price, a.location,
               h.room_id, h.hotel_name, h.room_price, h.room_bed, h.img1, h.room_capacity, h.review, h.rating, h.amenities_1, h.amenities_2,t.transport_id,
               t.vehicle_no, t.com_name, t.ticket_price, t.depo, t.destination, t.deperture, t.arrival, t.type
        FROM activities AS a
        INNER JOIN hotel_info AS hi ON a.location = hi.location
        INNER JOIN hotel_rooms AS h ON hi.hotel_name = h.hotel_name
        INNER JOIN transport_info AS t ON a.location = t.destination
        WHERE a.location = ? 
        AND h.room_capacity >= ? 
        AND h.room_price = (
            SELECT MIN(room_price)
            FROM hotel_rooms
            WHERE hotel_name = hi.hotel_name 
            AND room_capacity >= ? 
        )
        AND t.ticket_price = (
            SELECT MIN(ticket_price)
            FROM transport_info
            WHERE destination = ? 
        )
        LIMIT 1";

$most_reviewed = "SELECT a.location, 
                        h.hotel_name, 
                        h.room_id, 
                        h.room_price, 
                        h.room_bed,
                        h.img1, 
                        h.room_capacity, 
                        h.review, 
                        h.rating AS hotel_rating,
                        t.vehicle_no, 
                        t.com_name, 
                        t.ticket_price, 
                        t.depo, 
                        t.deperture, 
                        t.arrival, t.transport_id,
                        t.type AS transport_type,
                        (SELECT MAX(rating) FROM hotel_rooms WHERE hotel_name = h.hotel_name) AS highest_room_rating,
                        (SELECT MAX(rating) FROM transport_info WHERE destination = a.location) AS highest_transport_rating
                 FROM activities AS a
                 LEFT JOIN hotel_info AS hi ON a.location = hi.location
                 LEFT JOIN hotel_rooms AS h ON hi.hotel_name = h.hotel_name
                 LEFT JOIN transport_info AS t ON a.location = t.destination
                 WHERE a.location = ? 
                 AND h.room_capacity >= ? 
                 ORDER BY hotel_rating DESC, highest_transport_rating DESC, highest_room_rating DESC
                 LIMIT 1";

$stmt = $conn->prepare($sql_max_prices);
$stmt->bind_param("sisi", $location, $guest, $guest, $location);
$stmt->execute();
$result_max_prices = $stmt->get_result();

$stmt2 = $conn->prepare($sql_min_prices);
$stmt2->bind_param("sisi", $location, $guest, $guest, $location);
$stmt2->execute();
$result_min_prices = $stmt2->get_result();

$stmt3 = $conn->prepare($most_reviewed);
$stmt3->bind_param("si", $location, $guest);
$stmt3->execute();
$result_reviewed = $stmt3->get_result();
?>

				<div class="swiper mySwiper">
				    <div class="swiper-wrapper">
				    	<?php if ($result_max_prices->num_rows > 0) {
				    		 while ($row = $result_max_prices->fetch_assoc()) {
				    		 	$estimate= floatval($row['ticket_price']) + floatval($row['room_price']);

				    		 	?>
				      <div class="card swiper-slide noSwiping" style="box-shadow: 0 0 2em rgb(74 74 74 / 20%);">
				      	<span class="pack-titles">Luxury Package</span>
				        <div class="card__image">
				          <img src="img/hotels/<?php echo $row["img1"]; ?>" alt="card image">
				        </div>

				        <div class="card__content">
				          <div class="flexing"><span class="card__title"><?php echo $row["hotel_name"]; ?></span>
				          <p class="card__text2">Details:</p></div>
				          <p class="card__text">Room Type: Deluxe or Suits<br>Travel Medium: <?php echo $row["room_price"]; ?>(<?php echo $row["ticket_price"]; ?>)<br>Starts at: <span><?php echo $estimate; ?>+</span></p>
				          <form method="get" action="package-details.php">
				          	<input type="text" name="hotel_id" value="<?php echo $row["room_id"]; ?>" hidden>
				          	<input type="text" name="hotel_location" value="<?php echo $location; ?>" hidden>
				          	<input type="text" name="transport_id" value="<?php echo $row["transport_id"]; ?>" hidden>
				          	<input type="text" name="guest_no" value="<?php echo $guest; ?>" hidden>
				          	<input type="submit" class="card__btn" name="package" value="View More" style="display: flex;">
				          </form>
				        </div>
				      </div>
				      <?php

				      }
			} else {
			    echo "No results found for highest prices record<br>";
			} $stmt->close();?>

					<?php if ($result_reviewed->num_rows > 0) {
				    		 while ($row3 = $result_reviewed->fetch_assoc()) {
				    		 	$estimate3= floatval($row3['ticket_price']) + floatval($row3['room_price']);

				    		 	?>

				      <div class="card swiper-slide noSwiping" style="box-shadow: 0 0 2em rgb(74 74 74 / 20%);">
				      	<span class="pack-titles">Most Reviewed</span>
				        <div class="card__image">
				          <img src="img/hotels/<?php echo $row3["img1"]; ?>" alt="card image">
				        </div>

				        <div class="card__content">
				         <div class="flexing"> <span class="card__title"><?php echo $row3["hotel_name"]; ?></span>
				          <p class="card__text2">Details:</p></div>
				          <p class="card__text">Room Type: Best Reviewed<br>Travel Medium: <?php echo $row3["room_price"]; ?> (<?php echo $row3["ticket_price"]; ?>)<br>Starts at: <span><?php echo $estimate3; ?>+</span></p>
				          <form method="get" action="package-details.php">
				          	<input type="text" name="hotel_id" value="<?php echo $row3["room_id"]; ?>" hidden>
				          	<input type="text" name="hotel_location" value="<?php echo $location; ?>" hidden>
				          	<input type="text" name="transport_id" value="<?php echo $row3["transport_id"]; ?>" hidden>
				          	<input type="text" name="guest_no" value="<?php echo $guest; ?>" hidden>
				          	<input type="submit" class="card__btn" name="package" value="View More" style="display: flex;">
				          </form>
				        </div>
				      </div>
				      <?php

				      }
			} else {
			    echo "No results found for highest prices record<br>";
			} $stmt3->close();?>



				      <?php if ($result_min_prices->num_rows > 0) {
				    		 while ($row2 = $result_min_prices->fetch_assoc()) {
				    		 	$estimate2= floatval($row2['ticket_price']) + floatval($row2['room_price']);

				    		 	?>
				      <div class="card swiper-slide noSwiping" style="box-shadow: 0 0 2em rgb(74 74 74 / 20%);">
				      	<span class="pack-titles">Value Package</span>
				        <div class="card__image">
				          <img src="img/hotels/<?php echo $row2["img1"]; ?>" alt="card image">
				        </div>

				        <div class="card__content">
				          <div class="flexing"><span class="card__title"><?php echo $row2["hotel_name"]; ?></span>
				          <p class="card__text2">Details:</p></div>
				          <p class="card__text">Room Type: Economy<br>Travel Medium: <?php echo $row2["room_price"]; ?>(<?php echo $row2["ticket_price"]; ?>) <br>Starts at: <span><?php echo $estimate2; ?>+</span></p>
				          <form method="GET" action="package-details.php">
				          	<input type="text" name="hotel_id" value="<?php echo $row2["room_id"]; ?>" hidden>
				          	<input type="text" name="hotel_location" value="<?php echo $location; ?>" hidden>
				          	<input type="text" name="transport_id" value="<?php echo $row2["transport_id"]; ?>" hidden>
				          	<input type="text" name="guest_no" value="<?php echo $guest; ?>" hidden>
				          	<input type="submit" class="card__btn" name="package" value="View More" style="display: flex;">
				          </form>
				        </div>
				      </div>
				      <?php

				      }
			} else {
			    echo "No results found for highest prices record<br>";
			} $stmt2->close();?>

				    </div>
				  </div>