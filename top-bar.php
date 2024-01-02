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

?>

<div class="top-bar">
		<div class="brand-logo">
			<a href="index.php"><img src="img/brand-logo.svg"></a>
		</div>
		<div class="searchbar">
			<i class='bx bx-search'></i>
			<form method="post" action="dashboard.php">
				<div class="suggestion">
					<input type="text" name="destination" id="destination" placeholder="Search location" class="dest" required>
					<div id="suggestion-box"></div>
				</div>
				<div class="date-div">
					<div class="date-icon"><i class='bx bx-calendar' ></i></div>
					<div class="date-content">
						<p>Start Date</p>
						<input type="text" onfocus="(this.type='date')" name="start-date" min="<?php echo date("Y-m-d"); ?>" required>
					</div>
				</div>
				<div class="guest-div">
					<div class="date-icon"><i class='bx bx-user-plus' ></i></div>
					<div class="guest-content">
						<p>Guest No.</p>
						<input type="number" name="guest_no" required>
					</div>
				</div>
				<div class="budget-div">
					<div class="date-icon"><i class='bx bx-dollar-circle' ></i></div>
					<div class="budget-content">
						<p>Your Budget</p>
						<input type="number" name="budget" required>
					</div>
				</div>
				<div>
					<input type="submit" name="search" value="Search">
				</div>
			</form>
		</div>

		<div class="circular-image" onclick="toggleDropdown(this)">
            <img src="<?php echo $user['img'] ?? $defaultImageSource;  ?>" alt="Circular Image">
            <span><?php echo $_SESSION['user_name'] ?></span>
        </div>
        <div class="dropdown">
            <div class="dropdown-item"><a href="dashboard.php"><i class='bx bxs-dashboard'></i> Dashboard</a></div>
            <div class="dropdown-item"><a href="suggestion.php"><i class='bx bx-receipt'></i>Recommender</a></div>
            <div class="dropdown-item"><a href="profile.php"><i class='bx bx-universal-access' ></i> My Profile</a> </div>
            <div class="dropdown-item"><a href="logout.php"><i class='bx bx-log-out-circle' ></i>Logout</a></div>
        </div>
	</div>

<?php	?>