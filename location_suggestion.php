<!DOCTYPE html>
<html>
<head>
	<title>Welcome|Tripper</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
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

<section class="suggestion">
	<div class="container">
		<div class="sug_box">
			<h3 style="text-align: center;margin: 30px 0px;">Here are some popular locations that matches best for you</h3>
			<div class="loc_container">
				<?php
				if (isset($_POST['get_suggestion'])) {
						$selectedClimate = $_POST['climate'];
					    $selectedActivity = $_POST['activity'];
					    $selectedBudget = $_POST['budget'];
					    $selectedType = $_POST['type'];

					    $sql = "SELECT * FROM locations WHERE (climate = '$selectedClimate' OR type = '$selectedType') AND budget = '$selectedBudget'";
					    $result = mysqli_query($conn, $sql); 
				if ($result) {
        		while ($row = mysqli_fetch_assoc($result)) {
				?>
				<div class="loc_card">
					<div class="loc_img">
						<img src="<?php echo $row['location_img'] ;?>" alt="sajek">
					</div>
					<div class="loc_body">
						<h5><?php echo $row['location_name'] ;?></h5>
						<p>Budget: <span><?php echo $row['budget'] ;?></span></p>
						<p>Climate: <span><?php echo $row['climate'] ;?></span></p>
						<p>Type: <span><?php echo $row['type'] ;?></span></p>
						<p>Activities: <span><?php echo $row['activities'] ;?></span></p>
						<form method="post" action="dashboard.php">
							<input type="hidden" name="destination" value="<?php echo $row['location_name'] ;?>">
							<input type="hidden" name="guest_no" value="2">
							<input type="hidden" name="start-date" value="<?php echo date("Y/m/d"); ?>">
							<input type="submit" name="search" value="Get Packages" class="card__btn">
						</form>
					</div>
				</div>
				<?php 
			}
				    } else {
				        echo "Error: " . mysqli_error($your_db_connection);
				    }
				}
				?>
			</div>

		</div>
	</div>
</section>



<?php include('footer.php');  ?>