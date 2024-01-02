<?php 
include('header.php'); 
include('db.php'); 

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $phone = $_POST['number'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "INSERT INTO user (full_name, address, email, password, phone) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $name, $address, $email, $password, $phone);

    if ($stmt->execute()) {
        $stmt->close();
        header("Location: login.php"); 
        exit();
    } else {

        echo '<script>alert("Registration unsuccessful!");</script>';
    }

    $stmt->close();
}

?>


  <div class="container">
    <div class="form-container">
      
      <div class="form-section">
        <img src="img/brand-logo.svg" alt="logo">
        <h3>Sign Up</h3>
        <p class="p-title">Enter your email & paswword</p>
        <form action="" method="post">
          <input type="text" name="name" placeholder="Full Name" class="styled-input" required><br>
          <input type="text" name="address" placeholder="Address" class="styled-input" required><br>
          <input type="text" name="number" placeholder="Phone No." class="styled-input" required><br>
          <input type="email" name="email" placeholder="Email" class="styled-input" required><br>
          <input type="password" name="password" placeholder="Paswword" class="styled-input" required><br>
          <input type="submit" name="submit" value="Sign Up" class="styled-submit">
        </form>
        <p style="font-size: 14px; color: #6a6a6a; margin: 30px 0px; ">Already have an account? <a href="login.php">Login</a></p>
        <p style="font-size: 14px; color: #6a6a6a;">Or, login as <a href="#">Admin</a>  </p>
      </div>
      <div class="side-img">
        <img src="img/kerala.jpg" alt="login demo img">
      </div>
    </div>
  </div>

<?php include('footer.php'); ?>