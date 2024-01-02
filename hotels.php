


							<div class="hotel-item">
								<div class="img-info">
									<div class="hotel-img">
										<img src="img/hotels/<?php echo $img1; ?>" alt="hotel-room-imgae">
									</div>
									<div class="hotel-info">
										<div class="review">
											<div class="star-rating">
											  <div class="stars">
											    <i class='bx bxs-star' ></i>
											    <i class='bx bxs-star' ></i>
											    <i class='bx bxs-star' ></i>
											    <i class='bx bxs-star' ></i>
											    <i class='bx bxs-star' ></i>
											  </div>
											</div>
											<span>&nbsp; <b><?php echo $rating; ?></b></span>
											<span class="text-no"><?php echo $review; ?> reviews</span>
										</div>
										<div class="hotel-title">
											<h3><?php echo $hotelName; ?></h3>
											<p><?php echo $location; ?></p>
										</div>
										<div class="other-info">
											<i class='bx bx-area'></i>
											<span>56 sqm&nbsp;&nbsp;</span>
											<i class='bx bx-user-check' ></i>
											<span><?php echo $roomCapacity; ?> Guest&nbsp;&nbsp;</span>
											<i class='bx bxs-bed' ></i>
											<span><?php echo $roomBed; ?> Bedroom</span>
										</div>
									</div>
								</div>
								<div class="hotel-price-btn">
									<div class="hotel-btns">
										<button style="background: #08b6bfa3;" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn hotelinfomodal" data-id="<?php echo $room_id; ?>">view</button><br>
										<button class="select-hotel-btn" type="button">select</button>
									</div>
									<div class="hotel-pricing" style="text-align: center;">
										<span class="bold-price">৳<span><?php echo $roomPrice; ?>.00</span></span><span style="font-size: 14px; color: grey;">&nbsp;/Night</span>
									</div>
								</div>
							</div>
