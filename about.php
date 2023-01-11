<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>nsaw.u</title>
   
   <link rel="stylesheet" href="css/swiper.min.css" />
   
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="css/fontawesome/css/all.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="css/boxstyle.css">
   

</head>

<body style="background-color: #fff;">
   
<?php include 'components/index_header.php'; ?>

   <div class="info">
		<!-- <div class="heading"></div>
		<div class="desc"></div> -->
   </div>

<?php include 'components/footer.php'; ?>

<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

<script src="js/script.js"></script>


</body>
</html>