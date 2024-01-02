<?php
session_start();
include('db.php');

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

if (isset($_POST['delete'])) {
    $sql = "DELETE FROM user WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_id);
    
    if ($stmt->execute()) {
        session_destroy();
        header("Location: index.php");
        exit();
    } else {
        echo '<script>alert("Account deletion failed. Please try again.");</script>';
    }

    $stmt->close();
}

if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];

    if (isset($_FILES['profile_image']) && $_FILES['profile_image']['error'] === UPLOAD_ERR_OK) {
        $file_tmp = $_FILES['profile_image']['tmp_name'];
        $file_name = $_FILES['profile_image']['name'];
        $file_extension = pathinfo($file_name, PATHINFO_EXTENSION);
        $new_file_name = 'profile_' . $user_id . '.' . $file_extension;
        $upload_dir = 'img/user_uploads/';

        if (move_uploaded_file($file_tmp, $upload_dir . $new_file_name)) {
            $img_source = $upload_dir . $new_file_name;
            $sql = "UPDATE user SET full_name = ?, email = ?, address = ?, phone = ?, password = ?, img = ? WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssssssi", $name, $email, $address, $phone, $password, $img_source, $user_id);

            if ($stmt->execute()) {
                echo '<script>alert("Profile updated successfully.");</script>';
                header("Location: profile.php");
                exit();
            } else {

                echo '<script>alert("Profile update failed. Please try again.");</script>';
            }
            $stmt->close();
        }
    }
     else {
        $sql = "UPDATE user SET full_name = ?, email = ?, address = ?, phone = ?, password = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssi", $name, $email, $address, $phone, $password, $user_id);

        if ($stmt->execute()) {
            echo '<script>alert("Profile updated successfully.");</script>';
            header("Location: profile.php");
            exit();
        } else {
            echo '<script>alert("Profile update failed. Please try again.");</script>';
        }

        $stmt->close();
    }
}

if (isset($_POST['query'])) {
    $query = $_POST['query'];

    $sql = "SELECT location_name FROM locations WHERE location_name LIKE ? LIMIT 10";
    $stmt = $conn->prepare($sql);
    $query = '%' . $query . '%'; 
    $stmt->bind_param("s", $query);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div class='suggestion'>" . $row['location_name'] . "</div>";
        }
    } else {
        echo "<div class='no-suggestions'>No suggestions found</div>";
    }
}


        if(isset($_POST['paynow']))
        {
            $room_name = trim($_POST['hotelName']);
            $price = $_POST['hotelPrice'];

            echo $room_name;
            echo $price;

            $sql2 = "SELECT room_id FROM hotel_rooms WHERE trim(hotel_name) = '$room_name' AND room_price = $price";
            $result2 = mysqli_query($conn, $sql2);

            if ($result2) {
                if (mysqli_num_rows($result2) > 0) {
                    $row2 = mysqli_fetch_assoc($result2);
                    $room_id = $row2['room_id'];
                    // Do something with $room_id
                } else {
                    echo "No matching room found.";
                }
            } else {
                echo "Query failed: " . mysqli_error($conn);
            }

            $trans_name = $_POST['veNameInput'];
            $user_id = $_POST['user_id'];
            $no_of_user = $_POST['no_of_user'];
            $journey_start = $_POST['journey_start'];
            $journey_end = $_POST['journey_end'];
            $total_amount = $_POST['total_amount'];

            $sql = "INSERT INTO bookings (room_name,room_id, trans_name, user_id, no_of_user, journey_start, journey_end, total_amount) 
                    VALUES (?,?, ?, ?, ?, ?, ?, ?)";

            if ($stmt = mysqli_prepare($conn, $sql)) {
                mysqli_stmt_bind_param($stmt, "sisiissd", $room_name,$room_id, $trans_name, $user_id, $no_of_user, $journey_start, $journey_end, $total_amount);
                if (mysqli_stmt_execute($stmt)) {
                    header("Location: profile.php");
                    exit;
                } else {
                    echo "Error: " . mysqli_error($conn);
                }
                mysqli_stmt_close($stmt);
            } else {
                echo "Error preparing the statement: " . mysqli_error($conn);
            }
        }

?>
