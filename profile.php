

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

<div class="d-block mb-5">
	<img src="img/wallpaper_english.svg" height="auto" width="100%">
</div>

<?php 

$user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM user WHERE ID = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
$stmt->close();


$defaultImageSource = "https://images.unsplash.com/photo-1610216705422-caa3fcb6d158?ixid=MnwxMjA3fDB8MHxzZWFyY2h8NDB8fGZhY2V8ZW58MHwyfDB8fA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60";

if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];

    $sql = "UPDATE user SET name = ?, email = ?, address = ?, phone = ?, password = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssi", $name, $email, $address, $phone, $password, $user_id);

    if ($stmt->execute()) {
        echo '<script>alert("Profile updated successfully.");</script>';
    } else {
        echo '<script>alert("Profile update failed. Please try again.");</script>';
    }

    $stmt->close();
}

?>

<div class="container mb-5">
	<div class="user-profile">
		<div class="user-card">
			<div class="card">
	    <div class="img">
	      <img src="<?php echo $user['img'] ?? $defaultImageSource; ?>">
	    </div>
	    <div class="infos" style="width: 100%;">
	      <div class="name">
	        <h2><?php echo $user['full_name'] ?? ''; ?></h2>
	        <h4>@userName</h4>
	      </div>
	      <p class="text">
	        <i class='bx bx-envelope'></i> <?php echo $user['email'] ?? ''; ?>
	      </p>
	      <p class="text">
	        <i class='bx bx-phone' ></i> <?php echo $user['phone'] ?? ''; ?>
	      </p>
	      <ul class="stats" style="padding: 0;">
	        <li>
	          <h3><?php echo $user['joined_at'] ?? ''; ?></h3>
	          <h4>Joined</h4>
	        </li>
	        <li>
	          <h3 style="text-align: center;">8200৳</h3>
	          <h4>Amount Spend</h4>
	        </li>
	      </ul>
	      <div class="links" style="
	    justify-content: space-around;
	    display: flex;">
	        <button class="view" id="logoutButton">Logout</button>
	        <form action="process.php" method="post" id="deleteForm">
			    <button class="follow" type="button" onclick="confirmDelete()">Delete profile</button>
			    <input type="hidden" name="delete" value="1">
			</form>
	      </div>
	    </div>
	  </div>
		</div>
		<div class="user-windows">
			<div class="button-box">
					<button id="b1" onclick="openHistory()">History</button>
					<button id="b2" onclick="editProfile()">Edit Profile</button>
				</div>
			<div class="tab-box">
				
				<div class="content" id="content1">
					<div class="history-item" style="height: 700px; overflow-y: auto;">
						<table class="table align-middle mb-0 bg-white" >
							  <thead class="bg-light">
							    <tr>
							       <th>Booking ID</th>
									<th>Journe Start</th>
									<th>Journe Ends</th>
									<th>Travel Cost</th>
									<th>Action</th>
							    </tr>
							  </thead>
							  <tbody>
							  	<?php 
							  	$sqls = "SELECT * FROM bookings WHERE user_id= $user_id";
								$results = $conn->query($sqls);
								if ($results->num_rows > 0) {
							    	while ($rows = $results->fetch_assoc()) {
							    		?>

								<tr>
							    	<td class="test">
							    		<p class="fw-bold mb-1"><?php echo $rows['booking_id']; ?></p>
							         </td>
							      <td>
							        <div class="d-flex">
							          
							          <div class="">
							            <p class="fw-bold mb-1"><?php echo $rows['journey_start']; ?></p>
							          </div>
							        </div>
							      </td>
							      <td>
							        <p class="fw-bold mb-1"><?php echo $rows['journey_end']; ?></p>
							      </td>
							      <td>
							        <span class="badge badge-primary rounded-pill d-inline"><?php echo $rows['total_amount']; ?> BDT</span>
							      </td>
							      <td>
							        <form method="post" action="invoice.php">
							        	<input type="hidden" name="booking_id" value="<?php echo $rows['booking_id']; ?>">
							        	<button type="submit" class="btn btn-success btn-rounded fw-bold" name="invoice">
							          Ticket
							        </button>
							        </form>
							      </td>
							    </tr>


							    <?php
								}
								} 
								else {
								    echo "No history Avaliable.";
									}
								  
							?>
							</tbody>
						</table>
					</div>
					

				</div>
				<div class="content" id="content2">
					<form class="contact-form row" method="post" action="process.php" enctype="multipart/form-data">
						<div class="mb-5">
						    <div class="d-flex justify-content-center mb-4">
						        <img src="<?php echo $user['img'] ?? $defaultImageSource; ?>"
						        class="rounded-circle" alt="example placeholder" style="width: 100px;" />
						    </div>
						    <div class="d-flex justify-content-center">
						        <div class="btn btn-primary btn-rounded btn-sm">
						            <label class="form-label text-white m-1" for="customFile2">Choose file</label>
						            <input type="file" class="form-control d-none" id="customFile2" name="profile_image" />
						        </div>
						    </div>
						</div>
				      <div class="form-field col-lg-6 mb-3">
				      	<label class="form-label" for="name">Name</label>
				         <input id="name" name="name" class="form-control form-control-sm" type="text" value="<?php echo $user['full_name']; ?>" >
				      </div>
				      <div class="form-field col-lg-6 mb-3">
				      	<label class="form-label" for="email">E-mail</label>
				         <input id="email" name="email" class="form-control form-control-sm" type="email" value="<?php echo $user['email']; ?>">
				      </div>
				      <div class="form-field col-lg-6 mb-3">
				      	<label class="form-label" for="company">Address</label>
				         <input id="company" name="address" class="form-control form-control-sm" type="text" value="<?php echo $user['address']; ?>">
				      </div>
				       <div class="form-field col-lg-6 mb-3">
				       	<label class="form-label" for="phone">Phone</label>
				         <input id="phone" name="phone" class="form-control form-control-sm" type="text" value="<?php echo $user['phone']; ?>">
				      </div>
				      <div class="form-field col-lg-6 mb-5">
				      	<label class="form-label" for="message">Password</label>
				         <input id="message" name="password" class="form-control form-control-sm" type="text" value="<?php echo $user['password']; ?>">
				      </div>
				      <div class="d-flex justify-content-center ">
				         <input class="btn btn-success btn-rounded btn-lg" type="submit" value="Submit" name="update">
				      </div>
				   </form>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="js/script.js"></script>
<script>
	var content1 = document.getElementById("content1");
	var content2 = document.getElementById("content2");

	var b1 = document.getElementById("b1");
	var b2 = document.getElementById("b2");


	function openHistory(){
		content1.style.transform = "translateX(0)";
		content2.style.transform = "translateX(100%)";
		b1.style.color = "white";
		b1.style.background = "#80a1f8";
		b2.style.color = "black";
		b2.style.background = "white";
	}
	function editProfile(){
		content2.style.transform = "translateX(0)";
		content1.style.transform = "translateX(100%)";
		b2.style.color = "white";
		b2.style.background = "#80a1f8";
		b1.style.color = "black";
		b1.style.background = "white";
	}
	function confirmDelete() {
	    if (confirm("Are you sure you want to delete your account? This action is irreversible.")) {
	        document.getElementById("deleteForm").submit();
	    }
	}

	document.addEventListener("DOMContentLoaded", function () {
    var logoutButton = document.getElementById("logoutButton");
    logoutButton.addEventListener("click", function () {
        window.location.href = "logout.php";
    });
});
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



</script>
<?php include('footer.php'); ?>