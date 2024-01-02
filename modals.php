
						<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
							  <div class="modal-dialog">
							    <div class="modal-content">
							      <div class="modal-header">
							        <h5 class="modal-title" id="exampleModalLabel">Ticket Confirmation</h5>
							        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
							      </div>
							      <div class="modal-body">
							        <label for="ticketQuantity" class="form-label">Enter Number of Tickets</label>
  									<input type="number" class="form-control" id="ticketQuantity" placeholder="Enter quantity" min="1" required>
  							<input type="text" class="form-control mt-3" onfocus="(this.type='date')" id="returnDate" placeholder="Enter Return Date" min="<?php echo date("Y-m-d"); ?>" required>
  									<div class="d-flex justify-content-end mt-3"><p id="totalPrice" style="margin-bottom: 0px;">Total Price: <span id="totalPrice">0</span> BDT</p></div>
							      </div>
							      <div class="modal-footer">
							        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
							        <button type="button" data-bs-dismiss="modal" aria-label="Close" class="btn btn-success cofirmatins">Confirm</button>
							      </div>
							    </div>
							  </div>
							</div>