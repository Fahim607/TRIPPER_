<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.5.3/css/bootstrap.min.css" integrity="sha512-oc9+XSs1H243/FRN9Rw62Fn8EtxjEYWHXRvjS43YtueEewbS6ObfXcJNyohjHqVKFPoXXUxwc+q1K7Dee6vv9g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" type="text/css" href="css/invoice.css">
	<title></title>
</head>
<body>

    <?php
    include 'db.php';

    if(isset($_POST['invoice'])) {
        $booking_id = $_POST['booking_id'];

        $sql = "SELECT b.*, u.*, r.*, t.* 
                FROM bookings AS b
                INNER JOIN user AS u ON b.user_id = u.ID
                LEFT JOIN hotel_rooms AS r ON b.room_id = r.room_id
                LEFT JOIN transport_info AS t ON b.trans_name = t.vehicle_no
                WHERE b.booking_id = $booking_id";

        $result = mysqli_query($conn, $sql);

        if ($result) {
            $row = mysqli_fetch_assoc($result);
        } else {
            echo "Query failed: " . mysqli_error($conn);
        }
        $dateString1 = $row['journey_start'];
        $dateString2 = $row['journey_end'];

        $date1 = new DateTime($dateString1);
        $date2 = new DateTime($dateString2);

        $diff = $date1->diff($date2); 
        $days = $diff->d;   
    ?>
		<div class="container">
    <div class="card">
        <div class="card-body">
            <div id="invoice">
                <div class="toolbar hidden-print">
                    <div class="text-end">
                        <button type="button" class="btn btn-dark"><i class="fa fa-print"></i> Print</button>
                        <button type="button" class="btn btn-danger" id="exportPdfButton"><i class="fa fa-file-pdf-o"></i> Export as PDF</button>
                    </div>
                    <hr>
                </div>
                <div class="invoice overflow-auto">
                    <div style="min-width: 600px">
                        <header>
                            <div class="row">
                                <div class="col">
                                    <a href="javascript:;">
    												<img src="assets/images/logo-icon.png" width="80" alt="">
												</a>
                                </div>
                                <div class="col company-details">
                                    <h2 class="name">
									<img src="img/brand-logo.svg" height="80" width="120">
                                    </h2>
                                    <div>Sayednagar, Vatara, Dhaka-1212, BD</div>
                                    <div>+880187108150</div>
                                    <div>tripper@example.com</div>
                                </div>
                            </div>
                        </header>
                        <main>
                            <div class="row contacts">
                                <div class="col invoice-to">
                                    <div class="text-gray-light">INVOICE TO:</div>
                                    <h2 class="to"><?php echo $row['full_name'];?></h2>
                                    <div class="address"><?php echo $row['address'];?></div>
                                    <div class="email"><?php echo $row['phone'];?>
                                    </div>
                                </div>
                                <div class="col invoice-details">
                                    <h1 class="invoice-id">INVOICE 3-2-1</h1>
                                    <div class="date">Date of Invoice: <?php echo date("Y-m-d");?></div>
                                    
                                </div>
                            </div>
                            <table>
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th class="text-left">DESCRIPTION</th>
                                        <th class="text-right">PRICE</th>
                                        <th class="text-right">Quantity</th>
                                        <th class="text-right">TOTAL</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="no">01</td>
                                        <td class="text-left">
                                            <h3><?php echo $row['room_name'];?></h3>
                                        Check In Date: <b><?php echo $row['journey_start'];?> </b>Checkout date: <b><?php echo $row['journey_end'];?></b></td>
                                        <td class="unit"><?php echo $row['room_price'];?></td>
                                        <td class="qty"><?php echo $row['no_of_user'];?></td>
                                        <td class="total"><?php echo floatval($row['room_price'])*$days;?></td>
                                    </tr>
                                    <tr>
                                        <td class="no">02</td>
                                        <td class="text-left">
                                            <h3><?php echo $row['trans_name'];?></h3>Journey Start Date & Time: <?php echo $row['journey_start'];?> <?php echo $row['deperture'];?><br>
                                            Return Date At: <?php echo $row['journey_end'];?> <?php echo $row['arrival'];?></td>
                                        <td class="unit"><?php echo $row['ticket_price'];?></td>
                                        <td class="qty"><?php echo intval($row['no_of_user'])*2;?></td>
                                        <td class="total"><?php echo floatval($row['ticket_price'])*(intval($row['no_of_user'])*2);?></td>
                                    </tr>
                                    <?php 
                                        $location = $conn->real_escape_string(trim($row['destination']));

                                        $sql2 = "SELECT * FROM activities WHERE TRIM(location) = '$location'";
                                        $result2 = mysqli_query($conn, $sql2);
                                        $i=3;
                                        if ($result2->num_rows > 0) {
                                            while ($row2 = $result2->fetch_assoc()) {
                                    ?>
                                    <tr>
                                        <td class="no"><?php echo $i; ?></td>
                                        <td class="text-left">
                                            <h3><?php echo $row2['activity_name']; ?></h3><?php echo $row2['activity_description']; ?></td>
                                        <td class="unit"><?php echo $row2['activity_price']; ?></td>
                                        <td class="qty"><?php echo intval($row['no_of_user']);?></td>
                                        <td class="total">$<?php echo intval($row2['activity_price'])* intval($row['no_of_user']); ?></td>
                                    </tr>
                                    <?php
                                }
                            }
                            $i+=1;
                            ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="2"></td>
                                        <td colspan="2">SUBTOTAL</td>
                                        <td>$<?php echo $row['total_amount'];?></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"></td>
                                        <td colspan="2">GRAND TOTAL</td>
                                        <td>$<?php echo $row['total_amount'];?></td>
                                    </tr>
                                </tfoot>
                            </table>
                            <div class="thanks">Thank you!</div>
                            <div class="notices">
                                <div>NOTICE:</div>
                                <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
                            </div>
                        </main>
                        <footer>Invoice was created on a computer and is valid without the signature and seal.</footer>
                    </div>
                    <div></div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
}
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.5.3/js/bootstrap.min.js" integrity="sha512-8qmis31OQi6hIRgvkht0s6mCOittjMa9GMqtK9hes5iEQBQE/Ca6yGE5FsW36vyipGoWQswBj/QBm2JR086Rkw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
document.getElementById('exportPdfButton').addEventListener('click', function() {
    window.print();
});
</script>
</body>
</html>