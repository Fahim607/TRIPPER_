<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" type="text/css" href="css/boxicons.min.css">
  <link rel="stylesheet" type="text/css" href="css/checkout.css">
</head>
<body>
<?php
session_start();
include 'db.php';
$user_id = $_SESSION['user_id'];
if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $hotelName = $_POST["hotelName"];
        $hotelPrice = $_POST["hotelPrice"];
        $hotelGuest = $_POST["hotelGuest"];
        $hotelcheckIn = $_POST["hotelcheckin"];


        $veNameInput = $_POST["veNameInput"];
        $ve_date = $_POST["ve_date"];
        $total_am = $_POST["total_am"];



        

              
?>


      <div class="screen flex-center">
  <div class="popup flex p-lg">
    <div class="close-btn pointer flex-center p-sm">
      <i class="ai-cross"></i>
    </div>
    
      <!-- CARD FORM -->
      <div class="flex-fill flex-vertical">
        <div class="header flex-between flex-vertical-center">
          <div class="flex-vertical-center">
            <i class='bx bx-check-shield' ></i>
            <span class="title">
              <strong>SSL</strong><span>Commerz</span>
            </span>
          </div>
        </div>
        <div class="card-data flex-fill flex-vertical">
          
          <!-- Card Number -->
          <div class="flex-between flex-vertical-center">
            <div class="card-property-title">
              <strong>Card No:</strong>
              <span>Enter 16-digit card number on the card</span>
            </div>
            
          </div>
          
          <!-- Card Field -->
          <div class="flex-between">
            <div class="card-number flex-vertical-center flex-fill">
              <div class="card-number-field flex-vertical-center flex-fill">
                
                
              <svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 48 48" width="24px" height="24px"><path fill="#ff9800" d="M32 10A14 14 0 1 0 32 38A14 14 0 1 0 32 10Z"/><path fill="#d50000" d="M16 10A14 14 0 1 0 16 38A14 14 0 1 0 16 10Z"/><path fill="#ff3d00" d="M18,24c0,4.755,2.376,8.95,6,11.48c3.624-2.53,6-6.725,6-11.48s-2.376-8.95-6-11.48 C20.376,15.05,18,19.245,18,24z"/></svg>
                
                
          

                <input class="numbers" type="number" min="1" max="9999" placeholder="0000">-
                <input class="numbers" type="number" placeholder="0000">-
                <input class="numbers" type="number" placeholder="0000">-
                <input class="numbers" type="number" placeholder="0000" data-bound="carddigits_mock" data-def="0000">
              </div>
              <i class="ai-circle-check-fill size-lg f-main-color"></i>
            </div>
          </div>
          
          <!-- Expiry Date -->
          <div class="flex-between">
            <div class="card-property-title">
              <strong>Expiry Date</strong>
              <span>Enter the expiration date of the card</span>
            </div>
            <div class="card-property-value flex-vertical-center">
              <div class="input-container half-width">
                <input class="numbers" data-bound="mm_mock" data-def="00" type="number" min="1" max="12" step="1" placeholder="MM">  
              </div>
              <span class="m-md">/</span>
              <div class="input-container half-width">
                <input class="numbers" data-bound="yy_mock" data-def="01" type="number" min="23" max="99" step="1" placeholder="YY">
              </div>
            </div>
          </div>
          
          <!-- CCV Number -->
          <div class="flex-between">
            <div class="card-property-title">
              <strong>CVC Number</strong>
              <span>Enter card verification code from the back of the card</span>
            </div>
            <div class="card-property-value">
              <div class="input-container">
                <input id="cvc" type="password">
                <i id="cvc_toggler" data-target="cvc" class="ai-eye-open pointer"></i>
              </div>
            </div>
          </div>
          
          <!-- Name -->
          <div class="flex-between">
            <div class="card-property-title">
              <strong>Cardholder Name</strong>
              <span>Enter cardholder's name</span>
            </div>
            <div class="card-property-value">
              <div class="input-container">
                <input id="name" data-bound="name_mock" data-def="Mr. Cardholder" type="text" class="uppercase" placeholder="CARDHOLDER NAME">
                <i class="ai-person"></i>
              </div>
            </div>
          </div>
          
          
        </div>
        <?php

         ?>
        <div class="action flex-center">
          <form method="POST" action="process.php" >
            <input type="hidden" name="hotelName" value="<?php echo $hotelName;?> ">
            <input type="hidden" name="hotelPrice" value="<?php echo $hotelPrice;?> ">
            <input type="hidden" name="veNameInput" value="<?php echo $veNameInput;?>">
            <input type="hidden" name="user_id" value="<?php echo $user_id;?>">
            <input type="hidden" name="no_of_user" value="<?php echo $hotelGuest;?>">
            <input type="hidden" name="journey_start" value="<?php echo $hotelcheckIn;?>">
            <input type="hidden" name="journey_end" value="<?php echo $ve_date;?>">
            <input type="hidden" name="total_amount" value="<?php echo $total_am;?>">
            <button type="submit" class="b-main-color pointer" name="paynow" value="Pay Now">Pay Now</button>
          </form>
        </div>

      </div>
    
      <!-- SIDEBAR -->
      <div class="sidebar flex-vertical">
        <div>
        
        </div>
        <div class="purchase-section flex-fill flex-vertical">
          <div class="check-img">
            <img src="img/brand-logo.svg">
          </div>
          
          <ul class="purchase-props">
            <li class="flex-between">
              <span>Company</span>
              <strong>Tripper</strong>
            </li>
            <li class="flex-between">
              <span>Package</span>
              <strong>Custom</strong>
            </li>
            <li class="flex-between">
              <span>VAT (15%)</span>
            </li>
          </ul>
        </div>
        <div class="separation-line"></div>
        <div class="total-section flex-between flex-vertical-center">
          <div class="flex-fill flex-vertical">
            <div class="total-label f-secondary-color">You have to Pay</div>
            <div>
              <strong><?php echo $total_am; ?></strong>
              <small>.00 <span class="f-secondary-color">BDT</span></small>
            </div>
          </div>
          <i class="ai-coin size-lg"></i>
        </div>
      </div>
  </d>
</div>
<?php 
}
?>

<script type="text/javascript">
  
/*const bounds = document.querySelectorAll('[data-bound]');

for(let i = 0; i < bounds.length; i++) {
  const targetId = bounds[i].getAttribute('data-bound');
  const defValue = bounds[i].getAttribute('data-def');
  const targetEl = document.getElementById(targetId);
  bounds[i].addEventListener('keyup', () => targetEl.innerText = bounds[i].value || defValue );
}

const cvc_toggler = document.getElementById('cvc_toggler');

cvc_toggler.addEventListener('click', () => {
  const target = cvc_toggler.getAttribute('data-target');
  const el = document.getElementById(target);
  el.setAttribute('type', el.type === 'text' ? 'password' : 'text');
});*/


</script>
</body>
</html>
