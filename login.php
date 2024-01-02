<?php 
include('header.php'); 
session_start();
include('db.php');

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];


    $sql = "SELECT * FROM user WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    $stmt->close();

    if ($user && $user['password']===$password) {
        $_SESSION['user_id'] = $user['ID'];
        $_SESSION['user_name'] = $user['full_name'];
        header("Location: dashboard.php");
        exit();
    } else {
        echo '<script>alert("Invalid email or password. Please try again.");</script>';
    }
}
?>

  <div class="container">
    <div class="form-container">
      <div class="side-img">
        <img src="img/login.jpg" alt="login demo img">
      </div>
      <div class="form-section">
        <img src="img/brand-logo.svg" alt="logo">
        <h3>Sign In</h3>
        <p class="p-title">Enter your email & paswword</p>
        <form action="" method="post">
          <input type="email" name="email" placeholder="Email" class="styled-input"><br>
          <input type="password" name="password" placeholder="Password" class="styled-input"><br>
          <input type="submit" name="submit" value="Sign In" class="styled-submit">

        </form>
        <p style="font-size: 14px; color: #6a6a6a; margin: 30px 0px; ">Dont have an account? <a href="signup.php">Create new!</a></p>
        <p style="font-size: 14px; color: #6a6a6a;">Or, login as <a href="#">Admin</a>  </p>
      </div>
    </div>
  </div>

<?php include('footer.php'); ?>