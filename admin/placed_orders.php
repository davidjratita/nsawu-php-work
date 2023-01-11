<?php

include '../components/connect.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:admin_login.php');
}

if(isset($_POST['update_payment'])){
   $order_id = $_POST['order_id'];
   $payment_status = $_POST['payment_status'];
   $payment_status = filter_var($payment_status, FILTER_SANITIZE_STRING);
   $update_payment = $conn->prepare("UPDATE `orders` SET payment_status = ? WHERE id = ?");
   $update_payment->execute([$payment_status, $order_id]);
   $message[] = 'Payment status updated!';
}

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   $delete_order = $conn->prepare("DELETE FROM `orders` WHERE id = ?");
   $delete_order->execute([$delete_id]);
   header('location:placed_orders.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>nsaw.u - Dashboard</title>
   
   <link rel="stylesheet" href="../css/swiper.min.css" />
   
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="../css/fontawesome/css/all.css">

   <link rel="stylesheet" href="../css/admin_style.css">


</head>

<body>

<?php include '../components/admin_header.php'; ?>

<section class="orders">

<h1 class="heading">All orders</h1>

<div class="box-container">

   <?php
      $select_orders = $conn->prepare("SELECT * FROM `orders`");
      $select_orders->execute();
      if($select_orders->rowCount() > 0){
         while($fetch_orders = $select_orders->fetch(PDO::FETCH_ASSOC)){
   ?>
   <div class="box">
      <p> Placed on : <span style="background-color:#1db954;padding:5px 10px;color:#fff;border-radius:30px"><?= $fetch_orders['placed_on']; ?></span> </p>
      <p> Name : <span><?= $fetch_orders['name']; ?></span> </p>
      <p> Number : <span><?= $fetch_orders['number']; ?></span> </p>
      <p style="height:50px;margin-bottom:20px"> Address : <span><?= $fetch_orders['address']; ?></span> </p>
      <p style="height:50px;margin-bottom:20px"> Total Products : <span><?= $fetch_orders['total_products']; ?></span> </p>
      <p> Total Price : <span>$ <?= $fetch_orders['total_price']; ?></span> </p>
      <p> Payment Method : <span><?= $fetch_orders['method']; ?></span> </p>
      <form action="" method="post">
         <input type="hidden" name="order_id" value="<?= $fetch_orders['id']; ?>">
         
         <select name="payment_status" class="select" style="color:<?php if($fetch_orders['payment_status'] == 'pending'){ echo 'red'; }else{ echo 'green'; }; ?>">
            <option selected ><?= $fetch_orders['payment_status']; ?></option>
            <option value="pending" >pending</option>
            <option value="completed" >completed</option>
         </select>
        <div class="flex-btn">
         <input type="submit" value="update" class="option1" name="update_payment">
         <a href="placed_orders.php?delete=<?= $fetch_orders['id']; ?>" class="option1" onclick="return confirm('delete this order?');">delete</a>
        </div>
      </form>
   </div>
   <?php
         }
      }else{
         echo '<p class="empty">No Orders Placed Yet!</p>';
      }
   ?>

</div>

</section>

</section>












<script src="../js/admin_script.js"></script>
   
</body>
</html>