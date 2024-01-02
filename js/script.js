 function toggleDropdown(element) {
            const dropdown = element.nextElementSibling;
            if (dropdown.style.display === "block") {
                dropdown.style.display = "none";
            } else {
                dropdown.style.display = "block";
            }
}

let tabs = document.querySelector(".tabs");
let tabHeader = document.querySelector(".tab-header");
let tabbody = document.querySelector(".tab-body");
let tabindicator = document.querySelector(".tab-indicator");
let tabHeaderNodes = document.querySelectorAll(".tab-header > div");
let tabbodyNodes = document.querySelectorAll(".tab-body > div");

for (let i = 0; i < tabHeaderNodes.length; i++) {
    tabHeaderNodes[i].addEventListener("click", function () {
        tabHeader.querySelector(".active").classList.remove("active");
        tabHeaderNodes[i].classList.add("active");
        tabbody.querySelector(".active").classList.remove("active");
        tabbodyNodes[i].classList.add("active");
        for (let j = 0; j < tabHeaderNodes.length; j++) {
            if (j === i) {
                tabHeaderNodes[j].style.color = "black";
                tabHeaderNodes[j].style.fontWeight = "500";
            } else {
                tabHeaderNodes[j].style.color = "#666";
                tabHeaderNodes[j].style.fontWeight = "normal";
            }
        }
        tabindicator.style.left = `calc(calc(calc(13% - 5px)* ${i} + 2px) + ${i * 10}px)`;
    });
}

let totalAmount = 0;


function updateTotalAmount() {
    const totalAmountDiv = document.getElementById('total-amount');
    totalAmountDiv.textContent = `${totalAmount.toFixed(2)}`;
}

document.addEventListener('click', function (event) {
    if (event.target.classList.contains('select-hotel-btn')) {

        const row = event.target.closest('.hotel-item');

        const hotelName = row.querySelector('.hotel-title h3').textContent;
        const hotelPrice = row.querySelector('.bold-price span').textContent;
        const location = row.querySelector('.hotel-title p').textContent;
        const guestCount = row.querySelector('.bx-user-check').nextElementSibling.textContent;
        const imageUrl = row.querySelector(".hotel-img img").src;
        const hotelPriceG = parseFloat(hotelPrice);

        const selectedHotelDiv = document.createElement('div');
        selectedHotelDiv.classList.add('selected-hotel');

        selectedHotelDiv.innerHTML = `
            <h6 style="color:#ffa02b;">Selected Hotel Details:</h6>
                <div class="summary">
                  <div style="font-size: 16px"></div>
                  <div class="summary-flex">
                    <div class="sum-image">
                      <img src="${imageUrl}" alt="summary-image">
                    </div>
                    <div class="sum-info">
                      <p class="check_name"> ${hotelName}</p>
                      <span style="font-size: 13px;" class="check_loc">${location}</span> <br>
                      <span style="font-size: 13px;">Check In Date: <b>20-11-2023</b></span>
                      <div class="sum-hotel">
                      <span class="tic_price">Price: <span class="check_hot_price">${hotelPrice} </span>৳</span>
                      <span style="font-size: 13px; margin-top:8px; font-weight:bold;" class="check_guest">${guestCount}</span>
                      </div>
                    </div>
                    <div class="close-butt"><i class='bx bx-x'></i></div>
                  </div>
                </div>

        `;

        const selectedHotelDetailsContainer = document.getElementById('selected-hotel-details');
        selectedHotelDetailsContainer.innerHTML = '';
        selectedHotelDetailsContainer.appendChild(selectedHotelDiv);
        totalAmount += hotelPriceG;
        updateTotalAmount();

        const closeIcon = selectedHotelDiv.querySelector(".close-butt");
        closeIcon.addEventListener("click", function () {
          selectedHotelDetailsContainer.removeChild(selectedHotelDiv);
          totalAmount-=hotelPriceG;
          updateTotalAmount();
        });
    }

});




  let ticketUnitPrice = 0;
  let selectedRowData = {};
  let  busticket = 0;
  let  returndate;
  let quantity=0;

  function handleSelectButtonClick(row) {

    ticketUnitPrice = parseFloat(row.querySelector(".text-warning").textContent.substring(1));

    selectedRowData = {
      departureTime: row.querySelector("td:nth-child(2) p:nth-child(1)").textContent,
      arrivalTime: row.querySelector("td:nth-child(3) p:nth-child(1)").textContent,
      date: row.querySelector("td:nth-child(4) span").textContent,
      ticketPrice: ticketUnitPrice,
      vehicleNo: row.querySelector("td:nth-child(6)").textContent,
      imageUrl: row.querySelector(".test img").src,
    };

    const ticketQuantityInput = document.getElementById("ticketQuantity");
    ticketQuantityInput.value = "";

    document.getElementById("totalPrice").textContent = "Total Price: 0 BDT";

  }
  function getReturnDateValue() {
    const ret_date = document.getElementById("returnDate");
    returndate = ret_date.value.toString();
  }
  function updateTotalPrice() {
    const ticketQuantityInput = document.getElementById("ticketQuantity");
    const totalPriceSpan = document.getElementById("totalPrice");
    quantity = parseInt(ticketQuantityInput.value);

    if (!isNaN(quantity) && quantity >= 1) {
      const totalAmount = (quantity*2) * ticketUnitPrice;
      busticket=totalAmount;
      totalPriceSpan.textContent = `Total Price: ${totalAmount.toFixed(2)} BDT`;
    } else {
      totalPriceSpan.textContent = "Total Price: 0 BDT";
    }
  }

  function handleConfirmButtonClick() {
    const selectedRowDiv = document.createElement("div");
    selectedRowDiv.classList.add("selected-row");

    selectedRowDiv.innerHTML = `
                        <h6 style="color:#ffa02b;">Selected Vehicle Details:</h6>
                            <div class="summary">
                              <div style="font-size: 16px"></div>
                              <div class="summary-flex">
                                <div class="sum-image">
                                <img src="${selectedRowData.imageUrl}" alt="summary-image">
                                </div>
                                <div class="sum-info">
                                  <p > Vehical No: <span class="check_v_no">${selectedRowData.vehicleNo}</span></p>
                                  <span style="font-size: 13px;">Starting Date: <b>${selectedRowData.date}</b></span><br>
                                  <span style="font-size: 13px;" class="check_dep">Departure: <b>${selectedRowData.departureTime}</b></span>
                                  <span style="font-size: 13px;" class="check_arr">Arrival: <b>${selectedRowData.arrivalTime}</b></span><br>
                                  <span style="font-size: 13px;" >Return Date:<b class="check_return"> ${returndate}</b></span><br>
                                  <span style="font-size: 13px;" class="check_dep">Departure: <b>${selectedRowData.departureTime}</b></span>
                                  <span style="font-size: 13px;" class="check_arr">Arrival: <b>${selectedRowData.arrivalTime}</b></span>
                                  <div class="sum-hotel">
                                  <span class="tic_price">Price: <span class="check_v_price">${busticket.toFixed(2)} </span>৳</span>
                                  <span style="font-size: 13px; margin-top:8px; font-weight:bold;" class="v_date">Total: ${quantity*2} Tickets</span>
                                  </div>
                                </div>
                                <div class="close-butt"><i class='bx bx-x'></i></div>
                              </div>
                            </div>
    `;
    
    const selectedRowContainer = document.getElementById("selected-bus-details");
    selectedRowContainer.innerHTML = '';
    selectedRowContainer.appendChild(selectedRowDiv);
    totalAmount += busticket;
    updateTotalAmount();

    const closeIcon = selectedRowDiv.querySelector(".close-butt");
    closeIcon.addEventListener("click", function () {
      selectedRowContainer.removeChild(selectedRowDiv);
      totalAmount-=busticket;
      updateTotalAmount();
    });

  }

  document.querySelectorAll(".btn-success.btn-rounded").forEach((button) => {
    button.addEventListener("click", function () {
      handleSelectButtonClick(this.closest("tr"));
    });
  });

  document.getElementById("ticketQuantity").addEventListener("input", updateTotalPrice);
  document.getElementById("returnDate").addEventListener("input", getReturnDateValue);
  document.querySelector(".cofirmatins").addEventListener("click", handleConfirmButtonClick);


function handleBuyButtonClick(card) {

    const title = card.querySelector(".act-card-title").textContent;
    const description = card.querySelector(".act-card-text").textContent;
    const ticketPrice = card.querySelector(".amen .te span").textContent;
    const imageUrl = card.querySelector(".act-img img").src;
    const actPrice= parseFloat(ticketPrice);

    const cardInfoDiv = document.createElement("div");
    cardInfoDiv.classList.add("selected-card");

    var i=1;



    cardInfoDiv.innerHTML = `
                
                <div class="summary">
                  <div style="font-size: 16px"></div>
                  <div class="summary-flex">
                    <div class="sum-image">
                      <img src="${imageUrl}" alt="summary-image">
                    </div>
                    <div class="sum-info">
                      <p class="check_act"> ${title}</p>
                      <span style="font-size: 13px;" class="check_des">${description}</span>
                      <span class="tic_price">Price: <span>${ticketPrice} </span>৳</span>
                    </div>
                    <div class="close-butt"><i class='bx bx-x'></i></div>
                  </div>
                </div>
    `;
    const selectedCardContainer = document.getElementById("selectedCardContainer");
    selectedCardContainer.appendChild(cardInfoDiv);
    totalAmount += actPrice;
    updateTotalAmount();
    i++;
    const closeIcon = cardInfoDiv.querySelector(".close-butt");
    closeIcon.addEventListener("click", function () {
      selectedCardContainer.removeChild(cardInfoDiv);
      totalAmount-=actPrice;
      updateTotalAmount();
      i--;
    });
  }

  document.querySelectorAll(".act-card button").forEach((button) => {
    button.addEventListener("click", function () {
      handleBuyButtonClick(this.closest(".act-card"));
    });
  });


function populateCardFormFields() {
  document.getElementById("hotelNameInput").value = document.querySelector(".check_name").textContent;
  document.getElementById("hotelPriceInput").value = document.querySelector(".check_hot_price").textContent;
  document.getElementById("hotelGuestInput").value = document.querySelector(".check_guest").textContent;

  document.getElementById("veNameInput").value = document.querySelector(".check_v_no").textContent;
  document.getElementById("ve_date").value = document.querySelector(".check_return").textContent;
  document.getElementById("v_price").value = document.querySelector(".check_v_price").textContent;
  document.getElementById("total_am").value = document.querySelector(".total-amounts").textContent;


  const cardContainers = document.querySelectorAll(".selected-card");

  console.log(cardContainers);

  const cardData = [];

  cardContainers.forEach((container) => {
    const cardName = container.querySelector(".check_act").textContent;
    const cardPrice = container.querySelector(".tic_price span").textContent;

    const cardInfo = {
      name: cardName,
      price: cardPrice,
    };

    cardData.push(cardInfo);
});
    const cardDataJson = JSON.stringify(cardData);
    console.log(cardDataJson);

  const cardDataInput = document.getElementById("cardDataInput");
  cardDataInput.value = cardDataJson;
}


document.getElementById("sendDataButton").addEventListener("click", function (event) {
  event.preventDefault();
  populateCardFormFields();
  document.getElementById("dataForm").submit();
});


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
  }
  
  var checkOutDateInput = document.querySelector('input[name="pack-out"]');
  checkOutDateInput.addEventListener('change', calculateAccommodationCost);


